<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Table;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TableRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tables = Table::where('user_id', Auth::user()->id)->paginate(6);

        return view('table.index', compact('tables'))
            ->with('i', ($request->input('page', 1) - 1) * $tables->perPage());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $table = new Table();

        return view('table.create', compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request): RedirectResponse
    {
        try {
            Table::create($request->validated(), $request->messages());
    
            return Redirect::route('tables.index')
                ->with('success', 'Tabla creada con éxito.');

        } catch (\Exception $e) {
            Log::error('Error al crear la tabla: ' . $e->getMessage());

            return Redirect::route('tables.index')
                ->with('error', 'Error al crear la tabla.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Request $request): View
    {
        $table = Table::find($id);

        if (!$table) {
            $tables = Table::where('user_id', Auth::user()->id)->paginate(6);
            return view('table.index', compact('tables'))
                ->with('error', 'Tabla no encontrada.');
        }

        if($request->get('type')){
            $expenses = $table->expenses()->where('table_id', $id)->where('type', $request->get('type'))->paginate(10);
        } else if ($request->get('price')) {
            $expenses = $table->expenses()->where('table_id', $id)->orderBy('price', $request->get('price'))->paginate(10);
        } else {
            $expenses = $table->expenses()->where('table_id', $id)->paginate(10);
        }

        return view('table.show', compact('table', 'expenses'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $table = Table::find($id);

        if (!$table) {
            $tables = Table::where('user_id', Auth::user()->id)->paginate(5);
            return view('table.index', compact('tables'))
                ->with('error', 'Tabla no encontrada.');
        }

        return view('table.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, Table $table): RedirectResponse
    {
        $table->update($request->validated(), $request->messages());

        return Redirect::route('tables.index')
            ->with('success', 'Tabla actualizada con éxito.');
    }

    public function destroy($id): RedirectResponse
    {
        if (!Table::find($id)) return Redirect::route('tables.index')->with('error', 'Tabla no encontrada.');

        Table::find($id)->delete();

        return Redirect::route('tables.index')
            ->with('success', 'Tabla eliminada con éxito.');
    }

    public function pdfData($id, Request $request)
    {
        if (!Table::find($id)) return Redirect::route('tables.index')->with('error', 'Tabla no encontrada.');

        $table = Table::find($id);
        $expenses = [];

        if($request->get('type')){
            $expenses = $table->expenses()->where('table_id', $id)->where('type', $request->get('type'))->get();
        } else if ($request->get('price')) {
            $expenses = $table->expenses()->where('table_id', $id)->orderBy('price', $request->get('price'))->get();
        } else {
            $expenses = $table->expenses()->where('table_id', $id)->get();
        }

        return $this->pdfGenerator($id, $expenses);

    }

    public function pdfGenerator($id, $expenses)
    {
        if (!Table::find($id)) return Redirect::route('tables.index')->with('error', 'Tabla no encontrada.');

        $table = Table::find($id);

        $data = [
            'title' => $table->Name,
            'description' => $table->Description,
            'date' => date('d/m/Y'),
            'time' => date('H:i:s'),
            'expenses' => $expenses
        ];

        $pdf = PDF::loadView('table.pdfGenerator', $data);

        date_default_timezone_set('Europe/Madrid');
        return $pdf->download($table->Name . '-' . date('d-m-Y-H:i') . '.pdf');

    }
}

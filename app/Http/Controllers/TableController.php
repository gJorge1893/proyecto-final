<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Table;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TableRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tables = Table::where('user_id', Auth::user()->id)->paginate(5);

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
        Table::create($request->validated());

        return Redirect::route('tables.index')
            ->with('success', 'Tabla creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $table = Table::find($id);

        $expenses = $table->expenses()->paginate(2);

        return view('table.show', compact('table', 'expenses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $table = Table::find($id);

        return view('table.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableRequest $request, Table $table): RedirectResponse
    {
        $table->update($request->validated());

        return Redirect::route('tables.index')
            ->with('success', 'Tabla actualizada con éxito.');
    }

    public function destroy($id): RedirectResponse
    {
        Table::find($id)->delete();

        return Redirect::route('tables.index')
            ->with('success', 'Tabla eliminada con éxito.');
    }
}

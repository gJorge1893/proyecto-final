<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenseRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $expenses = Expense::paginate(20);
        
        return view('expense.index', compact('expenses'))
            ->with('i', ($request->input('page', 1) - 1) * $expenses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $expense = new Expense();

        $id = $request->query('id');

        return view('expense.create', compact('expense', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request): RedirectResponse
    {
        Expense::create($request->validated(), $request->messages());

        return Redirect::route('tables.show', $request->table_id)
            ->with('success', 'Registro añadido con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $expense = Expense::find($id);

        if(!$expense) return Redirect::route('tables.index')->with('error', 'Registro no encontrado.');

        return view('expense.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $expense = Expense::find($id);

        if(!$expense) return Redirect::route('tables.index')->with('error', 'Registro no encontrado.');

        return view('expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Expense $expense): RedirectResponse
    {
        $expense->update($request->validated(), $request->messages());

        return Redirect::route('tables.show', $request->table_id)
            ->with('success', 'Registro actualizado con éxito.');
    }

    public function destroy(Expense $expense): RedirectResponse
    {
        if(!Expense::find($expense->id)) return Redirect::route('tables.index')->with('error', 'Registro no encontrado.');

        Expense::find($expense->id)->delete();

        return Redirect::route('tables.show', $expense->table_id)
            ->with('success', 'Registro eliminado con éxito.');
    }
}

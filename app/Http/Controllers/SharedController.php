<?php

namespace App\Http\Controllers;

use App\Models\Shared;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SharedRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SharedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $shareds = Shared::paginate();

        return view('shared.index', compact('shareds'))
            ->with('i', ($request->input('page', 1) - 1) * $shareds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $shared = new Shared();

        return view('shared.create', compact('shared'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SharedRequest $request): RedirectResponse
    {
        Shared::create($request->validated());

        return Redirect::route('shareds.index')
            ->with('success', 'Shared created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $shared = Shared::find($id);

        return view('shared.show', compact('shared'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $shared = Shared::find($id);

        return view('shared.edit', compact('shared'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SharedRequest $request, Shared $shared): RedirectResponse
    {
        $shared->update($request->validated());

        return Redirect::route('shareds.index')
            ->with('success', 'Shared updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Shared::find($id)->delete();

        return Redirect::route('shareds.index')
            ->with('success', 'Shared deleted successfully');
    }
}

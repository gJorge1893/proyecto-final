<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Shared;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SharedRequest;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SharedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $shareds = Shared::where('user_id', Auth::user()->id)->paginate(5);

        // dd($shareds);

        return view('shared.index', compact('shareds'))
            ->with('i', ($request->input('page', 1) - 1) * $shareds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        // dd($request);
        $shared = new Shared();

        $users = User::where('id', '!=', Auth::user()->id)->get();

        $permissions = Permission::all();

        $id = $request->query('id');

        return view('shared.create', compact('shared', 'id', 'users', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SharedRequest $request): RedirectResponse
    {
        Shared::create($request->validated());
        return Redirect::route('tables.show', $request->table_id)
            ->with('success', 'Tabla compartida con ' . User::find($request->user_id)->name . '.');
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
    public function edit($id, Request $request): View
    {
        $shared = Shared::find($id);

        $users = User::all();

        $permissions = Permission::all();

        return view('shared.edit', compact('shared', 'users', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SharedRequest $request, Shared $shared): RedirectResponse
    {
        $shared->update($request->validated());

        return Redirect::route('tables.show', $shared->table_id)
            ->with('success', 'Permisos actualizados con éxito.');
    }

    public function destroy($id): RedirectResponse
    {
        Shared::find($id)->delete();

        return Redirect::route('shared.index')
            ->with('success', 'Shared deleted successfully');
    }
}

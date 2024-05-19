<?php

namespace App\Http\Controllers;

use App\Models\Shared;
use Illuminate\Support\Facades\Auth;
use App\Models\Table;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
public function index()
{
    $ownedTables = Table::where('user_id', Auth::user()->id)->get();
    $sharedTables = Shared::where('user_id', Auth::user()->id)->get();

    $tableNames = [];
    $tableIDs = [];
    $tableTotalExpenses = [];
    $tableTotalIncomes = [];

    $sharedTableNames = [];
    $sharedTableIDs = [];
    $sharedTableTotalExpenses = [];
    $sharedTableTotalIncomes = [];

    foreach ($ownedTables as $table) {
        $tableNames[] = $table->Name;
        $tableIDs[] = $table->id;
        $tableTotalExpenses[] = $table->expenses->where('type', 'gasto')->sum(function($expense) {
            return $expense->quantity * $expense->price;
        });
        $tableTotalIncomes[] = $table->expenses->where('type', 'ingreso')->sum(function($expense) {
            return $expense->quantity * $expense->price;
        });
    }

    foreach ($sharedTables as $sharedTable) {
        $sharedTableNames[] = $sharedTable->table->Name;
        $sharedTableIDs[] = $sharedTable->table_id;
        $sharedTableTotalExpenses[] = $sharedTable->table->expenses->where('type', 'gasto')->sum(function($expense) {
            return $expense->quantity * $expense->price;
        });
        $sharedTableTotalIncomes[] = $sharedTable->table->expenses->where('type', 'ingreso')->sum(function($expense) {
            return $expense->quantity * $expense->price;
        });
    }

    return view('home', [
        'tableNames' => $tableNames, 
        'tableIDs' => $tableIDs, 
        'tableTotalExpenses' => $tableTotalExpenses, 
        'tableTotalIncomes' => $tableTotalIncomes,
        'sharedTableNames' => $sharedTableNames,
        'sharedTableIDs' => $sharedTableIDs,
        'sharedTableTotalExpenses' => $sharedTableTotalExpenses,
        'sharedTableTotalIncomes' => $sharedTableTotalIncomes
        ]);
    }
}

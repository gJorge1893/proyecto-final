@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vista general') }}</div>

                <div class="card-body d-flex flex-column align-items-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Mis tablas</h4>
                    <canvas id="myChart"></canvas>
                    <hr />
                    <h4>Compartidas conmigo</h4>
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let ctx = document.getElementById('myChart').getContext('2d');
    let ctx2 = document.getElementById('myChart2').getContext('2d');

    let ownedTables = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($tableNames) !!}, 
            datasets: [{
                label: 'Total de gastos (€).',
                data: {!! json_encode($tableTotalExpenses) !!}, 
                backgroundColor: 'rgba(255, 50, 0, .75)', 
                borderColor: 'rgba(255, 0, 0, 1)',
                borderWidth: 1
            },
            {
                label: 'Total de ingresos (€).',
                data: {!! json_encode($tableTotalIncomes) !!}, 
                backgroundColor: 'rgba(0, 255, 146, .75)', 
                borderColor: 'rgba(0, 255, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    let sharedTables = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: {!! json_encode($sharedTableNames) !!}, 
        datasets: [{
            label: 'Total de gastos (€).',
            data: {!! json_encode($sharedTableTotalExpenses) !!}, 
            backgroundColor: 'rgba(255, 50, 0, .75)', 
            borderColor: 'rgba(255, 0, 0, 1)',
            borderWidth: 1
            },
            {
                label: 'Total de ingresos (€).',
                data: {!! json_encode($sharedTableTotalIncomes) !!}, 
                backgroundColor: 'rgba(0, 255, 146, .75)', 
                borderColor: 'rgba(0, 255, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
@endsection

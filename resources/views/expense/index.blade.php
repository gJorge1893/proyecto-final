<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
            <th >{{ _( 'Nombre' ) }}</th>
            <th >{{ _( 'Descripción' ) }}</th>
            <th >{{ _( 'Fecha' ) }}</th>
            {{-- <th >{{ _( 'Cantidad' ) }}</th>
            <th >{{ _( 'Precio (unidad)' ) }}</th>
            <th >{{ _( 'Precio (total)' ) }}</th>
            <th >{{ _( 'Establecimiento' ) }}</th>
            <th >{{ _( 'Categoría' ) }}</th> --}}
            <th >{{ _( 'Tipo' ) }}</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $expense)
                <tr>
                    
                <td >{{ $expense->item }}</td>
                <td >{{ $expense->description }}</td>
                <td >{{ $expense->date }}</td>
                {{-- <td >{{ $expense->quantity }}</td>
                <td >{{ $expense->price . _( ' €' ) }}</td>
                <td >{{ $expense->quantity * $expense->price . _( ' €' ) }}</td>
                <td >{{ $expense->establishment }}</td>
                <td >{{ $expense->category }}</td> --}}
                <td >{{ $expense->type }}</td>

                    <td>
                        <form action="{{ route('expenses.destroy', $expense) }}" method="POST">
                            <a class="btn btn-sm btn-primary " href="{{ route('expenses.show', $expense->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                            <a class="btn btn-sm btn-success" href="{{ route('expenses.edit', $expense->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="">
    {{ $expenses->links('pagination::bootstrap-5') }}
</div>

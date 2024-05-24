@php
    $counter = 0;
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    @page {
      header: page-header;
      footer: page-footer;
    }
  </style>
</head>
<body>
  <htmlpageheader name="page-header">
    <span style="font-size: xx-small;">{{ __('PDF generado el día ') . $date . __(' a las ') . $time . __(' horas.') }}</span>
  </htmlpageheader>
  <div>
    <h1>{{ $title }}</h1>
    <p style=" font-size: x-small;">{{ $description }}</p>
    <div style="border: .25px solid black; margin: 0px;"></div>
  </div>

  <h6 style=" margin-top: 10px; text-align: center;">Contenido de la tabla</h6>

  <div class="table-responsive">
      <table class="table table-striped table-hover" style="border: 2px solid black;">
          <thead class="thead">
              <tr>
                <th style="border: 1px double black; padding: 5px; text-align: center; background-color: rgb(190, 240, 255);">{{ __( 'Nombre' ) }}</th>
                <th style="border: 1px double black; padding: 5px; text-align: center; background-color: rgb(190, 240, 255);">{{ __( 'Fecha' ) }}</th>
                <th style="border: 1px double black; padding: 5px; text-align: center; background-color: rgb(190, 240, 255);">{{ __( 'Cantidad' ) }}</th>
                <th style="border: 1px double black; padding: 5px; text-align: center; background-color: rgb(190, 240, 255);">{{ __( 'Precio (unidad)' ) }}</th>
                <th style="border: 1px double black; padding: 5px; text-align: center; background-color: rgb(190, 240, 255);">{{ __( 'Precio (total)' ) }}</th>
                <th style="border: 1px double black; padding: 5px; text-align: center; background-color: rgb(190, 240, 255);">{{ __( 'Establecimiento' ) }}</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($expenses as $expense)
                  @php
                    $counter++;
                  @endphp
                  <tr style="{{ $counter % 2 == 0 ? 'background-color: rgb(237, 251, 255);' : '' }}">  
                    <td style="border: 1px double black; padding: 5px;">{{ $expense->item }}</td>
                    <td style="border: 1px double black; padding: 5px;">{{ \Carbon\Carbon::parse($expense->date)->format('d/m/Y') }}</td>
                    <td style="border: 1px double black; padding: 5px;">{{ $expense->quantity }}</td>
                    <td style="border: 1px double black; padding: 5px;">{{ number_format($expense->price, 2, ',', '.') . __('€') }}</td>
                    <td style="border: 1px double black; padding: 5px;">{{ number_format($expense->quantity * $expense->price, 2, ',', '.') . __('€') }}</td>
                    <td style="border: 1px double black; padding: 5px;">{{ $expense->establishment }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
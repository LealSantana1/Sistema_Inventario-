<!doctype html>
<html lang="en">
<head>
    <title>Reporte de Cotizaciones</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; 
            color: #212529; 
        }

        .header {
            background-color: #007bff; 
            color: white;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 100%; 
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px; 
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: white;
            text-align: center; 
        }

        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Reporte de Cotizaciones</h2>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proveedor</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio Total</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cotizaciones as $cotizacion)
                    <tr>
                        <td>{{ $cotizacion->id }}</td>
                        <td>{{ $cotizacion->proveedor->nombre }}</td>
                        <td>{{ $cotizacion->producto }}</td>
                        <td>{{ $cotizacion->descripcion }}</td>
                        <td>{{ $cotizacion->precio_total }}</td>
                        <td>{{ $cotizacion->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Popper and Bootstrap JavaScript (optional for web preview, not PDF) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <title>Reporte de categorias</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
    <!-- Custom Styles -->
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; 
            color: #212529; 
        }

        .cabeceras {
            background-color: #007bff; 
            color: white;
        }

        .btn-primary {
            background-color: #007bff; 
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3; 
            border-color: #0056b3;
        }

        table {
            width: 100%; 
            margin-top: 20px;
        }

        th, td {
            padding: 10px; 
        }

        th {
            text-align: center; 
        }

        
        @media (max-width: 768px) {
            .container {
                padding: 0 15px; 
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">CATEGORIAS</h1>
        <br />
        <table class="table table-bordered table-striped text-center">
            <thead class="cabeceras">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->marca }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>





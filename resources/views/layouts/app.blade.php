<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <title>Laravel Todo App</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>

        body {
            background-color: #f4f6f9;
        }

        .card {
            border-radius: 12px;
        }

        .navbar {
            background: linear-gradient(90deg, #0d6efd, #0dcaf0);
        }

        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }

    </style>

</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg mb-4">

    <div class="container">

        <a class="navbar-brand" href="/">
            Laravel Dashboard
        </a>

        <div>

            <a href="/sensor" class="btn btn-light btn-sm me-2">
                Sensor
            </a>

            <a href="/todos" class="btn btn-light btn-sm">
                Todo
            </a>

        </div>

    </div>

</nav>



{{-- CONTENT --}}
<div class="container">

    @yield('content')

</div>



{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Other head elements -->
    <!-- incarcam codul de css din link ul de mai jos  -->
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('partials.menu')
    <div class="container">
        @yield('content')
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- cod optinal -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    -->
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icon/favicon.ico') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="@yield('styles')">
    <script src="https://kit.fontawesome.com/15bc5276a1.js" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
</head>
<body>
    <div class="nav">
        <div class="row">
            <div class="col-2 nav-return">
                <a @yield('href')>
                    <i class="fa-solid fa-circle-left" style="color: white"></i>
                </a>
            </div>
            <div class="col-10 nav-title">@yield('title')</div>
        </div>
    </div>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                confirmButtonColor: "#0062a3",
                title: "Ok!",
                text: "{{ session('success') }}",
                icon: "success"
            });       
        </script>
    @endif
</body>
</html>
<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css" />


    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('pagistrap/pagistrap_assets/css/style.css')}}">
    <title>Dashboard 2</title>
    <meta name="description"
        content="Pada halaman ini sudah dilengkapi dengan berbagai macam contoh penggunaan library populer seperti apexcharts dan datatables">
        <style>
            a{
                text-decoration: none;
            }
        </style>
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    @include('layouts.dashboard.partial.sidebar')

    <div class="te-out-sidenav te-active">
        <!-- start main content -->
        @include('layouts.dashboard.partial.navbar')


        <div class="container-xxl mt-4 mb-5">
            <!-- start playground -->
            <div class="card shadow">
                <div class="card-header">
                    @yield('pageTitle')
                </div>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">@yield('pageButton')</div>
                <div class="card-body">
                    @yield('content')
                </div>
            </div>

            <!-- end playground -->
        </div>

        <!-- end main content -->
    </div>

    <!-- start footer -->
    @include('layouts.dashboard.partial.footer')
    <!-- end footer -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>

    <script src="{{asset('pagistrap/pagistrap_assets/js/script.js')}}"></script>
    @include('layouts.scripts.master_js')
    @include('layouts.scripts.sweetalert')
    <script>
                function clearInput(formId, label = "", action = "") {
            document.getElementById(formId).reset();
            $(".file").val("");
            $(`#labelModal`).text(label);
            $(`#btn-submit`).text('Simpan');
            document.getElementById(formId).action =
                `{{ url('${action}') }}`;
            $("#update").empty();
            $('.image-preview').empty();
            $(".kapilih").removeAttr('selected');
        }

    </script>
    @stack('js')
</body>

</html>

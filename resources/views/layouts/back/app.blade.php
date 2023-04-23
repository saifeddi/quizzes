<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="{{asset('dist/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    @include('layouts.back.inc.nav')
    <div id="layoutSidenav">
             @include('layouts.back.inc._sidebar')
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid">
                       
                       @yield('content')
                       
                       
                    </div>
                </main>
                @include('layouts.back.inc.footer')


            </div>
    </div>
    @include('layouts.back.inc.js')


    </body>
</html>
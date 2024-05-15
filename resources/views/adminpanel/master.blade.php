<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('adminpanel.nav')

    @include('adminpanel.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('adminpanel.header')

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    @include('adminpanel.footer')

</div>
<!-- ./wrapper -->
<script>
    @if(session('success'))
    Swal.fire(
        {
            icon: 'success',
            title:"<h1>Muvaffaqiyatli</h1>",
            text:'{{session('success')}}',
            showConfirmButton:true,
            timer:3000
        }
    )
    @endif
    @if(session('error'))
    Swal.fire(
        {
            icon: 'error',
            title:"<h1>Muvaffaqiyatli</h1>",
            text:'{{session('error')}}',
            showConfirmButton:true,
            timer:3000
        }
    )
    @endif
</script>
<script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- REQUIRED SCRIPTS -->
<script src href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- SweetAlert2 -->
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('custom/sweetalert.min.js')}}"></script>

@yield('custom-scripts')
<script>
    let errors = @json($errors->all());
    @if($errors->any())
    let msg = '';
    for (let i = 0; i < errors.length; i++) {
        msg += (i + 1) + '-xatolik ' + errors[i] + '\n';
    }
    toastr.error(msg);
    @endif
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Haqiqatan ham bu yozuvni oʻchirib tashlamoqchimisiz?`,
            text: "Agar siz buni o'chirib tashlasangiz, u abadiy yo'qoladi.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            buttons: ['Yo`q', 'Ha']
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
</body>
</html>


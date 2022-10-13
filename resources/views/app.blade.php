<!doctype html>
<html lang="en-SG">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="">


    <!-- Google Fonts -->
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    </noscript>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Vendor CSS Files -->
    <link rel="preload" href="/assets/vendor/icofont/icofont.min.css?v=<?php echo date('YmdHis'); ?>" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="/assets/vendor/icofont/icofont.min.css?v=<?php echo date('YmdHis'); ?>">
    </noscript>

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="/css/app.css?v=<?php echo date('YmdHis'); ?>">


    <!---------------------------------------------Admin css----------------------------------------------------------------------->
    <link href="/vendor/fontawesome-free/css/all.min.css?v=<?php echo date('YmdHis'); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">



</head>

<body>

    <main id="app">
        <div>
            <router-view></router-view>
        </div>
    </main>
    <script src="/js/app.js?v=<?php echo date('YmdHis'); ?>" defer></script>
    {{-- <a href="#" class="back-to-top"><i class="icofont-rounded-up"></i></a> --}}

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/jquery/jquery.min.js?v=<?php echo date('YmdHis'); ?>">
    </script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js?v=<?php echo date('YmdHis'); ?>" defer>
    </script>
    <script src="/assets/vendor/jquery.easing/jquery.easing.min.js?v=<?php echo date('YmdHis'); ?>">
    </script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main-min.js?v=<?php echo date('YmdHis'); ?>">
    </script>

    <!---------------------------------------------------Admin js -------------------------------------------------->


    <!-- Custom scripts for all pages-->
    <!-- <script src="/js/sb-admin-2.min.js?v=<?php echo date('YmdHis'); ?>"></script> -->

    <!-- Page level plugins -->
    <!-- <script src="/vendor/datatables/jquery.dataTables.min.js?v=<?php echo date('YmdHis'); ?>"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js?v=<?php echo date('YmdHis'); ?>"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="/js/demo/datatables-demo.js?v=<?php echo date('YmdHis'); ?>"></script> -->

    <!--Datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.min.js">
    </script>


    <!---------------------------------------------------End of Admin js -------------------------------------------------->

    <div id="load"></div>

</body>

</html>

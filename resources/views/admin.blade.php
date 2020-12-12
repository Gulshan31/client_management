<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Client Management | Biorev</title>
      <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
      <link href="{{ asset('cms/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">  
      <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('cms/css/bootstrap.min.css') }}">
      <link href="{{ asset('cms/css/sb-admin-2.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/vendors/material-vendors.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/material.css') }}">
    
      <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/bootstrap-extended.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/material-extended.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/material-colors.css') }}">

      <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/material-vertical-menu-modern.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('cms/fonts/simple-line-icons/style.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/vendors/datatables.min.css') }}">
      
      <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/components.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('cms/css/core/style.css') }}">
      <link href="{{ asset('cms/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
      <link href="{{ asset('cms/css/custom2.css') }}" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   </head>
   <body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns fixed-navbar pace-done menu-expanded" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

      @include('elements.admin.sidemenu')
   
      <div class="app-content content">
         <div class="content-wrapper" id="cus_qu">
            <div class="content-body">
               @yield('content')
            </div>
         </div>
      </div>
      @include('elements.admin.footer')
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
      <script src="{{ asset('admin/vendors/js/vendors.min.js') }}"></script>
      <script src="{{ asset('admin/js/core/libraries/jquery_ui/jquery-ui.min.js') }}"></script>
      
      <script src="{{ asset('admin/js/custom.js') }}"></script>
   
      <script src="{{ asset('admin/js/core/app-menu.js') }}"></script>
      <script src="{{ asset('admin/js/core/app.js') }}"></script>
      <script src="{{ asset('admin/js/scripts/ui/jquery-ui/navigations.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.0.11/dist/js/select2.min.js"></script>
      <script src="{{ asset('admin/datatables/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('admin/datatables/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('admin/datatables/datatables-demo.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      @stack('scripts')
   </body>
</html>

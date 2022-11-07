<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

         <!-- Vendors styles-->
        <link rel="stylesheet" href="{!! asset('theme/vendors/simplebar/css/simplebar.css') !!}">
        <link rel="stylesheet" href="{!! asset('theme/css/vendors/simplebar.css') !!}">
        <!-- Main styles for this application-->
        <link href="{!! asset('theme/css/stylePro.css') !!}" rel="stylesheet"> <!-- USING PRO-->
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>
            .nav-link {
              /* padding: 10px !important; */
              font-size: 14px;
            }
        </style>

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body>
      @inertia

      <script src="{!! asset('theme/js/coreui.bundle.min.js') !!}"></script> <!-- USING PRO-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <!-- CoreUI and necessary plugins-->
      {{-- <script src="{!! asset('theme/vendors/@coreui/coreui/js/coreui.bundle.min.js') !!}"></script> --}}
      <script src="{!! asset('theme/vendors/simplebar/js/simplebar.min.js') !!}"></script>
      <!-- Plugins and scripts required by this view-->
      {{-- <script src="{!! asset('theme/js/multi-select.js') !!}"></script> --}}
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>

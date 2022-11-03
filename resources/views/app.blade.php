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
        <link href="{!! asset('theme/css/style.css') !!}" rel="stylesheet">
        <!-- We use those styles to show code examples, you should remove them in your application.-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
        <link href="{!! asset('theme/css/examples.css') !!}" rel="stylesheet">

        <link href="{!! asset('theme/vendors/@coreui/chartjs/css/coreui-chartjs.css') !!}" rel="stylesheet">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body>
        @inertia

        <!-- CoreUI and necessary plugins-->
        <script src="{!! asset('theme/vendors/@coreui/coreui/js/coreui.bundle.min.js') !!}"></script>
        <script src="{!! asset('theme/vendors/simplebar/js/simplebar.min.js') !!}"></script>
        <!-- Plugins and scripts required by this view-->
        <script src="{!! asset('theme/vendors/chart.js/js/chart.min.js') !!}"></script>
        <script src="{!! asset('theme/vendors/@coreui/chartjs/js/coreui-chartjs.js') !!}"></script>
        <script src="{!! asset('theme/vendors/@coreui/utils/js/coreui-utils.js') !!}"></script>
        <script src="{!! asset('theme/js/main.js') !!}"></script>
    </body>
</html>

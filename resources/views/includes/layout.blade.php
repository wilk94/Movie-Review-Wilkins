<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

         <!-- Include Bootstrap CSS from CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        @yield('scripts')

        <title>VectorSurv Movie Review</title>
    </head>
    <style>
        body {
            background-color: #f0f8ff; /* Light blue */
        }
    </style>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>

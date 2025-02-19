<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pichturest</title>
    {{--  <script src="https://cdn.tailwindcss.com"></script>  --}}
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @stack('link')
</head>

<body class="pt-45 bg-white">
@include('pages.layouts.navbar')
@yield('content')

@stack('script')
</body>

</html>

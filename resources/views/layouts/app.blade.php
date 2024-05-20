<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>@yield('title') - EspecializaTi</title>
    <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}" type="image/png">
    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
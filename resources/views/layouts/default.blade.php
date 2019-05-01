<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('/css/app.css') }}">   
    <title>My App Title Here</title>
</head>


<body>
    @include('layouts._navbar')


    <div class="container">
        @yield('content')   
    </div>

    
   
        <!-- {{date('Y-m-d H:i:s')}} --> 

    <footer>
        By @jjworapol
    </footer>

    <script src="{{ url('js/app.js') }}"></script>
    @yield('script','')

</body>
</html>
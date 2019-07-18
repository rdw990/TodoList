<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todos App</title>

  <style>
    * {
      padding: 0;
      list-style-type: none;
      text-decoration: none;
      font-size: 1.1rem;
      font-family:sans-serif;
    }
  </style>
</head>
<body>

    @if(Session::has('success'))
    <strong>{{ Session::get('success') }}</strong>
    @endif
  
  
    @if (count($errors) > 0)
      <strong>Error:</strong>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    @endif

    
    @include('layouts.nav')
    @yield('content')
   
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ larave</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container py-2">
        <div class="row">
          @include('client.block.header')
            
        </div>
        <div class="row">
            {{-- <div class="col-4 py-4">
                <div class="sidebar">
                            @include('client.block.sidebar')
                </div>
            </div> --}}
            <div class="col-12 py-4">
                @yield('content')
            </div>   
        </div>
    </div>
</body>
</html>
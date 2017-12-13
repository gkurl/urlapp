<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL Shortner</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="icon" type="image/png" href=""/>
</head>
<body>


<div id="container">
    <div id="wrapper">

    <h2>Shrink your URL</h2>
    @if($errors->any())
        <div id="error" class="collapsed">
            <span class="closealert">&times;</span>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
            </ul>
            @endforeach
        </div>
        @endif

            <div class="form-group">
    <form action="{{route('store')}}" method="post">
        <input class ="form-control" type="text" name="url" placeholder="Enter URL" value="{{old('url')}}"><br>&nbsp;
                <input class="btn btn-primary" type="submit" name="submit" onclick="">
    </form>
            </div>
        </div>
    </div>

<script type="text/javascript" src="{{asset('js/transition.js')}}"></script>
</body>
</html>
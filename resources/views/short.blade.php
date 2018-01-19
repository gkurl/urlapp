<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>URL Shortner</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="icon" type="image/png" href=""/>
</head>
<body>

{{--@if(Session::has('original_url'))
    {{redirect('original_url')}}
@endif--}}

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
        {{--@if(\Illuminate\Support\Facades\Session::has('url'))
        <div class="btn-group">
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Your URL
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">{{\URL::current()}}/{{\Illuminate\Support\Facades\Session::get('url')}}</a>
            </div>
        </div>
        @endif--}}
@if(\Illuminate\Support\Facades\Session::has('url'))
    <h2 class="animated fadeIn">Your shortened URL is here!</h2>
        <form class="animated fadeIn">
            <div class="input-group">
                <input type="text" class="form-control"
                       value="{{\URL::current()}}/{{Session::get('url')}}" placeholder="URL" id="copy-input">
                <span class="input-group-btn">
      <button class="btn btn-default" type="button" id="copy-button"
              data-toggle="tooltip" data-placement="button"
              title="Copy to Clipboard">
        Copy
      </button>
    </span>
            </div>
        </form>
@endif


    </div>
</div>



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/transition.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('js/copyfunc.js')}}"></script>






</body>
</html>
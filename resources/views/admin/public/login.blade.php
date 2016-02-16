<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>laravel</title>
</head>
<body>
@if(count($errors) > 0)
    <ul class="alert alert-error">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form method="post">
    <input type="email" name="email" value="{{old('email')}}" placeholder="your email" /><br>
    <input type="password" name="password" placeholder="your password" /><br>
    {{csrf_field()}}
    <button>submit</button>
</form>
</body>
</html>
@extends ('layout')

@section('content')

<link rel = "stylesheet" href = "/css/login.css">

<form method = "POST", action = "/login", accept-charset = "UTF-8">
    <fieldset class = "loginFieldset">
        <legend>Login</legend>
        <div class = "loginDiv">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            Username: <input type="username" name = "username", required></input>
            <br>
            Password: <input type="password" name = "password", required></input>
            <br>
            <input class = "send" type = "submit" style = "display:inline;" value = "Login">
            <button class = "send" style = "display:inline;"><a class = "send" href = "/register">Register</a></button>
            
            @if(isset($response))
                @if($response != 'null')
                    <p>{!!$response!!}</p>
                @else
                    <p id = "information">
                    </p>
                @endif
            @endif
        </div>
    </fieldset>
</form>

<script src = "/js/account.js"></script>
@stop
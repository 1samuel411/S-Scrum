@extends ('layout')

@section('content')

<link rel = "stylesheet" href = "/css/login.css">

<form name = "accountFormRegister" method = "POST", action = "/register", onsubmit="return validateInfo()" accept-charset = "UTF-8">
    <fieldset class = "loginFieldset">
        <legend>Register</legend>
        <div class = "loginDiv">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            Full-Name: <input type="name" name = "name", required></input>
            <br>            
            Email: <input type="email" name = "email", required></input>
            <br>            
            <br>            
            Username: <input type="username" name = "username", required></input>
            <br>
            <br>
            Password: <input type="password" name = "password", required></input>
            <br>
            Confirm Password: <input type="password" name = "confirm_password", required></input>
            <br>
            <button class = "send" style = "display:inline;"><a class = "send" href = "/login">Login</a></button>
            <input class = "send" type = "submit" style = "display:inline;" value = "Register">
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
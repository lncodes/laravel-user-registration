<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div><br>')) !!}
        @endif
        <form action="{{route('register.submit')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" value="{{old('name')}}"><br><br>
            <input type="email" name="email" placeholder="Email" value="{{old('email')}}"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="password" name="password_confirmation" placeholder="Password Confirmation"><br><br>
            <button type="submit">Register</button><br><br> 
        </form>
    </body>
</html>
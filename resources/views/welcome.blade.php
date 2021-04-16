<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        @if(session('status'))
            <p>{{session('status')}}</p>
        @endif
    </body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Thank you for signing up</h1>

<p>we just need you to <a href="{{ url('register/confirm/{$user->token}') }}" confirm your email address.</p>
</body>
</html>
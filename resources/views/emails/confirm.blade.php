<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Confirmation</title>
</head>
<body>
<h1>Thanks for siging up</h1>
<p> we just want you to <a href="{{ url('register/confirm/{$user->token}') }}">confirm your email address</a></p>
</body>
</html>
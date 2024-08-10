<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <h2>Hi {{ $data['username'] }}, We from Resto ID Family glad you're register as Resto ID Customer!</h2>
    <h3>Following are your account details: </h3>
    <h3>Email: </h3><p>{{ $data['email'] }}</p>
    <h3>Username: </h3><p>{{ $data['username'] }}</p>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test app</title>
</head>
<body>
    @foreach($users as $u)
    <p>
        {{ $u->usuarioAlias }}
    </p>
 
    @endforeach
</body>
</html>
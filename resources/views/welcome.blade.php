<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add list</title>
</head>
<body>
    <form action="/todo/1/1" method="post">
        @csrf
        @method('PUT')
        content:<input type="text" name="content">
        <input type="submit" value="create_todo">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('create') }}" method="post">
        @csrf
        <input type="text" name="idUser" id="">
        <input type="text" name="idLevel" id="">
        <input type="text" name="isActive" id="">
        <input type="text" name="username" id="">
        <input type="password" name="password" id="">
        <button type="submit">simpan</button>
    </form>
</body>

</html>

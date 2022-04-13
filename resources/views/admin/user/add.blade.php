<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('post.admin.add') }}" method="POST">
        @csrf
        <div>
            <input type="text" name="name"
                placeholder="name" value="">
        </div>
        <div>
            <input type="email" name="email"
                placeholder="email">
        </div>
        <div>
            <input type="password" name="password"
                placeholder="password">
        </div>
        <div>
            <input type="submit" value="Submit">
            <a href="{{ route('get.admin.index') }}" class="buttons">Back</a>
        </div>
    </form>
</body>
</html>

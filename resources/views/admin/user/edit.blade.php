<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('update-user/' . $admin['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="name"
                placeholder="name" value="{{ $admin['name'] }}">
        </div>
        <div>
            <input type="email" name="email"
                placeholder="email" value="{{ $admin['email'] }}">
        </div>
        <div>
            <input type="password" name="password"
                placeholder="password" value="{{ $admin['password'] }}">
        </div>
        <div>
            <input type="submit" value="Edit">
            <a href="{{ route('get.admin.index') }}" class="buttons">Back</a>
        </div>
    </form>
</body>
</html>

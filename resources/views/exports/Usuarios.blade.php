<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>
<body> 
    <table>
        <thead>
            <tr>
                <td style="font-weight: bold">id</td>
                <td style="font-weight: bold">name</td>
                <td style="font-weight: bold">email</td>
                <td style="font-weight: bold">ciudad_id</td>
                <td style="font-weight: bold">rol_id</td>
                <td style="font-weight: bold">estado_id</td>
                <td style="font-weight: bold">created_at</td>
                <td style="font-weight: bold">updated_at</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->ciudad_id }}</td>
                <td>{{ $user->rol_id }}</td>
                <td>{{ $user->estado_id }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 
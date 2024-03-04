<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User View</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }

        form {
            width: 95%;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 98%;
            border-collapse: collapse;
            margin-top: 15px;
            height: 150px
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            padding: 6px 12px;
            margin-right: 5px;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            background-color: #5cb85c;
        }

        a:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    <form action="{{ route('user.view', ['user' => $user->id]) }}" method="post">
        @csrf
        <div>
            <h1>User Details</h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><a href="{{ route('user.edit', ['user' => $user->id]) }}">Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</body>
</html>

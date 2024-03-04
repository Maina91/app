<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            /* justify-content: center; */
            /* align-items: center; */
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 98%;
            border-collapse: collapse;
            margin-top: 15px;
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
        }

        a.view {
            background-color: #5cb85c;
        }

        a.edit {
            background-color: #5bc0de;
        }

        .delete-form {
            display: inline-block;
            padding: 6px 12px;
            text-decoration: none;
            margin-right: 5px;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;

        }

        input[type="submit"] {
            background-color: #d9534f;
            color: #fff;
            padding: 6px 12px;
            margin-right: 5px;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
        <div>
            <h1>User Dashboard</h1>

            <table border="1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <a class="view" href="{{ route('user.view', ['user' => $user->id]) }}">View</a>
                            <a class="edit" href="{{ route('user.edit', ['user' => $user->id]) }}">Edit</a>
                            <form class="delete-form" action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: #ff0000;
            font-size: 12px;
            margin-top: -10px;
        }
      

    </style>
</head>
<body>
    
    <form action="{{ route('user.save') }}" method="post">
        @csrf
        <h2>User Registration</h2>
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Enter your name">
        @if($errors->has('name'))
        <div class="error">{{ $errors->first('name') }}</div>
    @endif

        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Enter your email">
        @if($errors->has('email'))
    <div class="error">{{ $errors->first('email') }}</div>
@endif

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password">
        @if($errors->has('password'))
        <div class="error">{{ $errors->first('password') }}</div>
    @endif

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm your password">

        <label for="gender">Gender</label>
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <input type="submit" value="Register">
        <a href="{{ route('user.login') }}">Login</a>
    </form>
</body>
</html>

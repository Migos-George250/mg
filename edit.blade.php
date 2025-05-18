<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .form-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        h1 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<center>
    <h1>FORM</h1>
    <form action="{{route('user.update',['user'=>$User])}}" method="post">
        @csrf 
        @method('PUT')
        Username<br>
<input type="text" name="name" placeholder="Enter Name" value="{{$User->name}}"><br><br>
        Email<br>
<input type="text" name="email" placeholder="Enter Email" value="{{$User->email}}"><br><br>
Password<br>
<input type="password" name="password" placeholder="Enter Password" value="{{$User->password}}"><br><br>
<input type="submit" value="Update" name="Update">

    </form>
</center>
</body>
</html>
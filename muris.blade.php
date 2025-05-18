<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f4f7f9;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
  margin: 0;
}

h1 {
  color: #333;
  margin-bottom: 20px;
}

form {
  background: #fff;
  padding: 30px 40px;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  width: 300px;
}

form input[type="text"],
form input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

form input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
  margin-top: 15px;
  cursor: pointer;
  font-weight: bold;
}

form input[type="submit"]:hover {
  background-color: #0056b3;
}
</style>
</head>
<body>
<center>
    <h1>Registering FORM</h1>
    <form action="{{route('george.send')}}" method="post">
      @csrf 
      @method('post')
        Username<br>
<input type="text" name="name" placeholder="Enter Name"><br><br>
        Email<br>
<input type="text" name="email" placeholder="Enter Email"><br><br>
Password<br>
<input type="password" name="password" placeholder="Enter Password"><br><br>
<input type="submit" value="Register" name="Register">

    </form>
</center>
</body>
</html>
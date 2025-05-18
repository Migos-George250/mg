<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f6fa;
      padding: 40px;
    }

    h2 {
      text-align: center;
      color: #2f3640;
    }

    table {
      width: 60%;
      margin: 20px auto;
      border-collapse: collapse;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
    }

    th, td {
      padding: 12px 20px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    tr:first-child {
      background-color: #273c75;
      color: white;
      font-weight: bold;
    }
  </style>
</head>
<body>
    <center>
     <h2>User Table</h2>   
        <table border="2">
<tr>
    <td>name</td>
    <td>email</td>
    <td>password</td>
    <td>Action</td>
</tr>
@foreach($user as $user)
<tr>
    <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
         <td><a href="{{route('george.edit',['user'=>$user])}}">update</a></td>
         <td>
            <form action="{{route('george.delete',['user'=>$user])}}" method="post">
                @csrf 
                @method('Delete')
<input type="submit" value="delete" name="delete">
            </form>
         </td>

</tr>
@endforeach
        </table>
        <form action="{{route('user.logout')}}" method="post">
                    @csrf
                   <input type="submit" name="logout" value="LOGOUT">
                </form>
    </center>
</body>
</html>
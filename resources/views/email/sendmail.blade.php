<!DOCTYPE html>
<html>
<head>
    <title>{{$details['name']}}</title>
</head>
<body>
    <div style="background-color: #f3f3f3; color: #111; padding: 15px 10px;">

    <h2>{{$details['name']}}</h2>
    <p>Email: {{$details['email']}}</p>
    <p>Password: {{$details['password']}}</p>
    <p>Your Account Has Been Created, kindly change your password at: <a href={{ asset('admin/change-password') }}>Change Password Here</a></p>
    </div>
</body>
</html>

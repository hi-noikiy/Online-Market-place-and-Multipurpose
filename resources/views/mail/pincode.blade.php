<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card">
        Dear user,
        <p>You are getting this email because we got a request to open an acoount in {{url('/')}} by the 
           email {{$user->email}} . If it is not you please inform us.
        </p>
        <br>
        <p>
            You have to use PINCODE: {{$num}} to access your all types of account..
        </p>
        <br>
        <h3>Thank YOu</h3>
    </div>
</body>
</html>
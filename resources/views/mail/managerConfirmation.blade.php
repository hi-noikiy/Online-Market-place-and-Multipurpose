<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager</title>
</head>
<body>
    <div class="card">
        Dear,
        <p>You are getting this email because Owner of {{url('/')}} select 
           you as a manager of this site.
        </p>
        <br>
        <p>
            You have to use PINCODE: {{$token}} <br> This is autometically generated your identical identity code..
        </p>
        <br>
        <h3>Thank YOu</h3>
    </div>
    
</body>
</html>
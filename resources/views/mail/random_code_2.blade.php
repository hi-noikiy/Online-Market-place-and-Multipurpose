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
        <p>You are getting this email because we got a request for login as super admin in {{url('/')}} where
           secondary email {{$super_admin->secondary_email}} . If it is not you please inform us.
        </p>
        <br>
        <p>
            You have to use <strong>Confirm Code 2: </strong> {{$random_code_2}}  
        </p>
        <br>
        <h3>Thank You</h3>
    </div>
</body>
</html>
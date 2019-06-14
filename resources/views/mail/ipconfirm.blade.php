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
        <p>You are getting this email because <h3 class="text-danger"> <strong> we got a request for login as super admin in {{url('/')}} from a 
            different IP address than you previously used!!</strong> </h3>
        <h1><strong>If it is not you, Immidiate action must be taken</strong>.</h1><h5> We temporary lock down your account for security..</h5>
        </p>
        <br>
        <p>
            @php
                $id=base64_encode($admin->id);
            @endphp
            <form action="{{route('ipmatch')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$token}}" name="token">
                <input type="hidden" value="{{$id}}" name="id">
                 And if this is you then, You need to  re-login by  <strong>clicking  </strong> <input type="submit" value="Here">
            </form>
           
        </p>
        <br>
        <h3>Thank You</h3>
    </div>
</body>
</html>
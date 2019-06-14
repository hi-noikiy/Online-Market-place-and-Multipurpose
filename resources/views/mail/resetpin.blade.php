<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resset PIN</title>
</head>
<body>
    <div class="card">
        <table class="table">
            <tr>
                <p>Dear {{$user->name}},</p>
               
            </tr>
            <tr>
                <p>we received pincode reset request from you. If this is really you then you can 
                    change your pin from <a href="{{url('resetconfirm/'.$data)}}">Clicking here</a>
                </p>
            </tr>
            <tr>
                Thankyou
            </tr>
        </table>

    </div>
</body>
</html>
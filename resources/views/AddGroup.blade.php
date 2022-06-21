<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <title>Document</title>
</head>
<body>
    <div class='form-wrapper'>
        <form action="/AddGroup" method='POST'>
            @csrf
            <input type='text' placeholder='name' name='name'/>
            <input type='email' placeholder='email' name='email'/>
            <input type='text' placeholder='contact' name='contact'/>
            <input type='submit' value='Add'/>
        </form>
    </div>
</body>
</html>
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
        <form>
            @csrf
            <input type='text' placeholder='name' name='name'/>
            <input type='text' placeholder='age' name='age'/>
            <input type='text' placeholder='class' name='class'/>
            <input type='text' placeholder='subject' name='subject'/>
            <input type='file' />
            <input type='submit' href="{{url('add-students')}}" value='Add'/>
        </form>
    </div>
</body>
</html>
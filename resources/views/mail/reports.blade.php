<!DOCTYPE html>
<html>

<head>
    <title>todo.abdulrahimmnf.online</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="card text-center container shadow">
        <div class="card-header">
            your activity on our site
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $mailData['title'] }}</h5>
            <p class="card-text">{{ $mailData['body'] }}</p>
            <a href="{{$mailData['link']}}" download class="btn btn-primary">Download</a>
        </div>
        <div class="card-footer text-muted">
            {{now()}}
        </div>
    </div>
</body>

</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body id="demo">
    <input type="button" id="btn-submit" value="load data">

    <div id="data"></div>
    <script>
        $('#btn-submit').click(function () {
            $.ajax({
                url:'http://localhost:8000/Yummy',
                method:'GET',
                success:function (response) {
                    $('#data').text(response);
                },
                error:function () {
                    alert('error')
                }
            });
        });
    </script>

</body>
</html>
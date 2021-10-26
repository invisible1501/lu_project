<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
    <script>
        $(document).ready(function() {
            jQuery("#btn").click(function() {
                var data_test = 'This is first demo';
                $.ajax({
                    url: 'api/cookie.php',
                    type: 'POST',
                    data: 'string=' + data_test,
                    success: function(data) {
                        setTimeout(function() {
                            $('#demo-ajax').html(data);
                        }, 3000);
                    },
                    error: function(e) {
                        console.log(e.message);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div id="demo-ajax"></div>
    <button id="btn">View more</button>
</body>

</html>
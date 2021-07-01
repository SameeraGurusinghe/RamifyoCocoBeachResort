<html>
<head>
    <style type="text/css">
        .timehandle{
            font-size: 14px;
            color: #b2beb5;
        }
    </style>

</head>

<body>

<span id="timeNow" class="timehandle">
    <script>
        var d = new Date(<?php date_default_timezone_set('asia/colombo'); echo strtotime('now')*1000 ?>);
        (function foo(){
            d.setTime(d.getTime()+1000);
            var clientTime = d.getHours() + ":"  + d.getMinutes() + ":" + d.getSeconds() + " " + (d.getHours() >= 12 ? 'PM' : 'AM');
            //alert(clientTime);
            document.getElementById("timeNow").innerHTML = clientTime;
            setTimeout(foo, 1000); // refresh time every 1 second
        })();
    </script>

</body>
</html>
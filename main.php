<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
    <style>
        .div1{
            background-color: green;
            height: 100%;
            width: 30%;
            float: left;

        }
        .div2{
            background-color: red;
            height: 100%;
            width: 70%;
            float: right;
            
        }
    </style>
</head>
<body>
    <div class="div1">
        <?php
        include("user.php");
        ?>
    </div>
    <div class="div2">
        DIV 2
    </div>
</body>
</html>
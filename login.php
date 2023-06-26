<?php
$login = false;
$showError = false;
// include('connection.php');

$rand = rand(9999, 1000);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include_once 'config.php';
    $username = $_POST["username"];   
    $password = $_POST["password"];
    $captcha = $_POST['captcha'];
    $captcharandom = $_POST['captcha-random']; 
    /*
    if($captcha!=$captcharandom){
        echo "<script>alert('Enter the capcha correctly')</script>";
        echo"$captcha";
        echo"$captcharandom";
    }
    */
    // else{
        $sql = "Select * from data where name='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0){
            $row = mysqli_fetch_assoc($result);
            $login = true;
            session_start();
            $status = "Active now";
            $sql2 = mysqli_query($conn, "UPDATE data SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2){
            $_SESSION['unique_id'] = $row['unique_id'];
            header("location: user.php");
            }else{
                echo "Something went wrong. Please try again!";
            }

        } 
        else{
            $showError = "Invalid Credentials";
        }
    // }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <style>
        .captcha{
            width:20%;
            background:yellow;
            text-align:center;
            font-size:24px;
            font-weight:700;
        }
    </style>
    <?php require 'partials/_nav.php' ?>
    
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
     <h1 class="text-center">Login to proceed</h1>
     <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="col-md-6 form-group">
            <label for="captcha">captcha</label>
            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Enter captcha" required data-parsley-trigger="keyup">
            <input type="hidden" name="captcha-rand" value="<?php echo $rand;?>">
        </div>
        <div class="form-group"> 
            <label for="captcha-code">captcha Code</label>
            <div class="captcha"><?php echo $rand; ?></div>
        </div>
       
         
        <button type="submit" class="btn btn-primary">Login</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
  
</body>
</html>

<?php
     session_start();
     if(!isset($_SESSION['unique_id'])){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <section class="user">
            <header>
                <?php
                    include_once "config.php";
     //////////////////////////////// // this is if we require unique id as string//////////////////////////////////////////////
                    // $unique_id = $_SESSION['unique_id'];
                    // $row = null;
                    //     if (!empty($_GET['unique_id'])){
                        
                    //         $stmt = $conn->prepare("SELECT * FROM data WHERE unique_id =?");
                    //         $stmt->bind_param("s", $unique_id);
                    //         $stmt->execute();
                    //         $result = $stmt->get_result();
                    //     if($result->num_rows > 0){
                    //         $row = $result->fetch_assoc();
                    //     }
                    // }
                 ////////////////////////////////////////////////////////////
                    
                    $sql = mysqli_query($conn, "SELECT * FROM data WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <div class="content">
                    <ion-icon name="person-outline" id="img"></ion-icon>
                    <div class="details">
                        <span><?php echo $row['name']?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </div>
                <a href="logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">logout</a>
            </header>
            <div class="search">
                <span class="text">select</span>
                <input type="text" placeholder="enter name">
                <button><ion-icon name="search-outline"></ion-icon></button>
            </div>
            <div class="user-list">
                
                
            </div>
            
        </section>
        
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="javascript\users.js"></script>

</body>
</html>
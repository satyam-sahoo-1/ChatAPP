<?php
     session_start();
     include_once "config.php";
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
        <section class="chat-area">
            <header>
            <?php
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    $sql = mysqli_query($conn, "SELECT * FROM data WHERE unique_id = {$user_id}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }

                                                                                                // if (!empty($_GET['user_id'])){  
                                                                                                //         $stmt = $conn->prepare("SELECT * FROM data WHERE unique_id =?");
                                                                                                //         $stmt->bind_param("s", $user_id);
                                                                                                //         $stmt->execute();
                                                                                                //         $result = $stmt->get_result();
                                                                                                //         // 
                                                                                                //     if($result->num_rows > 0){
                                                                                                //         $row = mysqli_fetch_assoc($result);
                                                                                                //     }
                                                                                                // }
                ?>
                
                    <a href="user.php">
                        <ion-icon name="arrow-back" class="back"></ion-icon>
                    </a>
                    <ion-icon name="person-outline" id="img"></ion-icon>
                    <div class="details">
                        <span><?php echo $row['name']?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                
            </header>
            <div class="chat-box">
                
                </div>
            
            <form action="#" class="typing">
                
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id;?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message...">
                <button><ion-icon name="send"></ion-icon></button>
            </form>
            
        </section>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="javascript/chat.js"></script>
</body>
</html>
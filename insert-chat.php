<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }
///////////////////////////////////// when we want unique_id a string////////////////////////////////
    // if (isset($_SESSION['unique_id'])) {
    //     include_once "config.php";
    //     $outgoing_id = $_SESSION['unique_id'];
    //     $incoming_id = $_POST['incoming_id'];
    //     $message = $_POST['message'];
        
    //     if (!empty($message)) {
    //         $stmt = $conn->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
    //                                 VALUES (?, ?, ?)");
    //         $stmt->bind_param("sss", $incoming_id, $outgoing_id, $message);
    //         $stmt->execute();
    
    //         if ($stmt->affected_rows > 0) {
    //             // Insertion successful
    //             echo '<script>console.log("yes"); </script>';
    //         } else {
    //             // Insertion failed
    //             echo ' <script>console.log("no"); </script>';
    //         }
    
    //         $stmt->close();
    //     }
    // } else {
    //     header("location: ../login.php");
    // }
 ///////////////////////////////////////////////////////////////////////////////////   
?>
    

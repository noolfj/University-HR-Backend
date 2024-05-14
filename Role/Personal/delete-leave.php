<?php 

    // database connection
    require_once "conn.php";
    $leave_id = $_GET["leave_id"];

    $sql = "DELETE FROM employee_leave WHERE leave_id = '$leave_id' ";
    $result= mysqli_query($conn , $sql);
    if($result){
        header("Location: status-leave.php?delete-success-id=" .$leave_id);
    }
?>
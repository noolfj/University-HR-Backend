<?php 
    
   echo $leave_id = $_GET["leave_id"];

   require_once "../conn.php";
   $sql = "UPDATE employee_leave SET status = 'На рассмотрении директора' WHERE leave_id = '$leave_id' ";
   $result = mysqli_query($conn , $sql);
   if($result){
       header("Location: leave.php?accept-successfuly");
   }

?>


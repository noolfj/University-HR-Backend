<?php 

$leave_id = $_GET["leave_id"];

require_once "../conn.php";

$sql = "UPDATE employee_leave SET status = 'Отклонено' WHERE leave_id = '$leave_id' ";
$result = mysqli_query($conn , $sql);
if($result){
    header("Location: leave.php?cancel-successfuly");
}

?>

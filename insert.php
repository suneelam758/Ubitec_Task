<?php
include('conn.php');
$cename = $_POST['ename'];
$cdate = $_POST['date'];

$checkemail = "SELECT * FROM timesheet WHERE empid = '$cename' and TimesheetDate = '$cdate'";
$remail = mysqli_query($conn,$checkemail);

if(mysqli_num_rows($remail)){
     echo('you can not fill for same date');
     echo '<br><a href = "form.php">Register Again</a>';
}
else{

include('conn.php');
$em =$_POST['project'];
$co = $_POST['milestone'];
$ad = $_POST['task'];
$cou = $_POST['date']; 
$pwd = $_POST['time'];
$des = $_POST['description'];
$eid = $_POST['ename'];
$query = "INSERT INTO timesheet(ProjectId,MilestoneId,TaskName, LoggedHours, TimesheetDate, Description,empid) VALUES ('$em','$co','$ad','$cou','$pwd', '$des','$eid')";

if(mysqli_query($conn, $query)){
    header('location: done.php');

} else{
    echo "There is some problem";
}
}
// Close connection
mysqli_close($conn);  
?>

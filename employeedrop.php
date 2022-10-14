<?php
    include('conn.php');
//for employee name
    $sql="select * from employeemaster";
    $result1=mysqli_query($conn,$sql) or die("error!!!!");

    
    ?>
<?php
include('conn.php');
//for project
if($_POST['type'] == ""){
    $sql = "SELECT * FROM project";

    $query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

    $str = "";
    while($row = mysqli_fetch_assoc($query)){
      $str .= "<option value='{$row['Id']}'>{$row['Name']}</option>";
    }
}else if($_POST['type'] == "stateData"){

    $sql = "SELECT * FROM milestone WHERE ProjectId = {$_POST['id']}";

    $query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

    $str = "";
    while($row = mysqli_fetch_assoc($query)){
      $str .= "<option value='{$row['Id']}'>{$row['Name']}</option>";
    }
}

echo $str;
?>
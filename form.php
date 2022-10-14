<?php
include 'conn.php';
include 'employeedrop.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timesheet</title>
    <style>
        * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
} 

body {
    background: rgb(182,34,195);
background: linear-gradient(0deg, rgba(182,34,195,1) 0%, rgba(174,45,253,1) 100%);
  font-family: 'helvetica neue', helvetica, arial, sans-serif;
  color: #222;
}

#form {
  max-width: 700px;
  padding: 2rem;
  box-sizing: border-box;
}

.form-field {
  display: flex;
  margin: 0 0 1rem 0;
}
label, input {
  width: 70%;
  padding: 0.5rem;
  box-sizing: border-box;
  justify-content: space-between;
  font-size: 1.1rem;
}
label {
  text-align: right;
  width: 30%;
}
input {
  border: 2px solid #aaa;
  border-radius: 2px;
}

    </style>
</head>
<body>
<form method="POST" action="insert.php" id="form">
  <div class="form-field">
    <label for="employee-name">Employee Name</label>
    <select name="ename">
    <option>Select Employee</option>
   <?php for($i=1;$i<=mysqli_num_rows($result1);$i++){
    $arr = mysqli_fetch_assoc($result1);
    
    echo "<option value = $arr[Id]>$arr[FirstName] $arr[LastName]</options>";
   }?>
    </select></div>

    <div id="main">
		
		<div id="content">
		
        <label> Project </label>
        <select id="project">
        	<option value="">Select Project</option>
        </select>
				<br><br>
        <label>Milestone : </label>
        <select id="milestone">
        	<option value="">Select Milestone</option>
        </select>
   <div class="form-field">
<label for="Task" >Task</label>
<input type="text"  name="task" id="f1" placeholder="Your Task..">

   </div>
   <div class="form-field">
<label for="Date" >Date</label>
<input type="date"  name="date" id="f2">
   </div>
   <div class="form-field">
<label for="Time" >Time</label>
<input type="time"  name="time" id="f3">
   </div>
   <div class="form-field">
<label for="Description" >Status</label>
<input type="text"  name="description" id="f4" placeholder="Describe" style="height: 100px;">
   </div>
   <div class="form-field">
<input type="submit" value="Submit ">
   </div>
   <div class="form-field">
    <input type="reset" value="Reset">
   </div>
</form>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "dummydrop.php",
  			type : "POST",
  			data: {type : type, id : category_id},
  			success : function(data){
  				if(type == "stateData"){
  					$("#milestone").html(data);
  				}else{
  					$("#project").append(data);
  				}
  				
  			}
  		});
  	}
  });
  	loadData();

  	$("#project").on("change",function(){
  		var project = $("#project").val();

  		if(project != ""){
  			loadData("stateData", project);
  		}else{
  			$("#milestone").html("");
  		}

  		
  	})

</script>


</body>
</html>
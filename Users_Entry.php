<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr']; 

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
//--------------add data-----------------   	
if(isset($_POST['btn_sub'])){
	$username=$_POST['usertxt'];
	$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysqli_query($dbhandle, "INSERT INTO users_tbl 
						VALUES(
							NULL,
							'$username',
							'$pwd' ,
							'$type',
							'$note'
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$username=$_POST['usertxt']; 
	$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	$note=$_POST['notetxt'];
	
	$sql_update=mysqli_query($dbhandle, "UPDATE users_tbl SET 
								username='$username' ,
								password='$pwd' , 
								type='$note' ,
								note='$note'
							WHERE
								u_id=$id
							");
	if($sql_update==true)
		echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
		. "<span class='p_font'>"
		. "Record Updated Successfully... !"
		. "</span>"
		. "</div>";
	else
		$msg="Update Failed...!";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Entry</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>
<?php
if($opr=="upd")
{
	$sql_upd=mysqli_query($dbhandle, "SELECT * FROM users_tbl WHERE u_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-hdd"></span> General Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update the general's detail to record into database.</p>
			</div>




<div class="container_form">
    <form method="post">
        <div class='faculty_pos'>
        
		<input type="text" class="form-control" name="usertxt" id="textbox" value="<?php echo $rs_upd['username'];?>" /><br>
        <input type="text" class="form-control" name="pwdtxt" id="textbox" value="<?php  echo $rs_upd['password'];?>" /><br>
		<input type="text" class="form-control" name="typetxt" id="textbox"  value="<?php echo $rs_upd['type'];?>"/><br>

        <textarea name="notetxt" class="form-control" cols="23" rows="5"><?php echo $rs_upd['note'];?></textarea><br>
            <input type="submit" name="btn_upd" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
	    <input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
        </div>
    </form>
</div>

<?php	
}
else
{
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-hdd"></span> General Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add new general's detail to record into database.</p>
			</div>


<div class="container_form">
    <form method="post">
        <div class='faculty_pos'>
        
			<input type="text" class="form-control" name="usertxt" id="textbox" placeholder="General name" /><br>

			<input type="text" class="form-control" name="pwdtxt" placeholder="Password" id="textbox" /><br>
			<input type="text" class="form-control" name="typetxt" placeholder="Rank" id="textbox" /><br>
			<textarea name="notetxt" class="form-control" cols="23" placeholder="Breif overview" rows="5"></textarea><br>
    
        
            <input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
	    <input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
        </div>
    </form>
</div><!-- end of style_informatios -->


<?php
}
?>
</body>
</html>
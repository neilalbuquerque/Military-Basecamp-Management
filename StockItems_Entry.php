<?php

$id=" ";
$opr=" ";

if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	
if(isset($_POST['btn_sub'])){
	$si_name=$_POST['locationtxt'];
	$quantity=$_POST['descriptxt'];
	$cost	=$_POST['notetxt'];
	

$sql_ins=mysqli_query($dbhandle, "INSERT INTO si_tb 
						VALUES(
							NULL,
							'$si_name',
							'$quantity' ,
							'$cost'
							)
					");
if($sql_ins==true)
	echo "";
	else
		$msg="Update Failed...!";
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$si_name=$_POST['locationtxt'];
	$quantity=$_POST['descriptxt'];
	$cost=$_POST['notetxt'];
	
	$sql_update=mysqli_query($dbhandle, "UPDATE si_tb SET	
							si_name='$si_name' ,
							quantity='$quantity' ,
							cost='$cost'
						WHERE si_id=$id

					");
					
if($sql_update==true){
echo "<div style='background-color: white;padding: 20px;border: 1px solid black;margin-bottom: 25px;''>"
                . "<span class='p_font'>"
                . "Record Updated Successfully... !"
                . "</span>"
                . "</div>";
}
else
	$msg="Update Fail!...";	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php

if($opr=="upd")
{
	$sql_upd=mysqli_query($dbhandle, "SELECT * FROM si_tb WHERE si_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
	
?>
    <div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-globe"></span> Stock Items Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your Stock Items's records into database.</p>
			</div>
                  <form method="post">    
    
                      <div class="teacher_note_pos">
                        <input type="text" class="form-control" name="locationtxt" id="textbox" value="<?php echo $rs_upd['si_name'];?>" />
                      </div><br>
                
                      <div class="text_box_pos">
                        <textarea name="descriptxt" class="form-control" cols="23" rows="4"><?php echo $rs_upd['quantity'];?></textarea>
                      </div><br>
                
                      <div class="text_box_pos">
                        <textarea name="notetxt" class="form-control" cols="23" rows="4"><?php echo $rs_upd['cost'];?></textarea>
                      </div><br><br>                
                
                      <div>
                        <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                      </div>    
       </div>
    
        </form>
    
    </div><!-- end of style_informatios -->
    
    <?php
}
else
{
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-globe"></span> Stock Items Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add your Stock Item's records into database.</p>
			</div>
                  <form method="post">    
                      
                      <div class="teacher_note_pos">
                        <input class="form-control" type="text" name="locationtxt" id="textbox" placeholder='Stock Item name' />
                      </div><br>
                      
                      <div class="text_box_pos">
                        <textarea name="descriptxt" class="form-control" cols="23" rows="4" placeholder='Quantity'></textarea>
                      </div><br>
                      
                      <div class="text_box_pos">
                        <textarea name="notetxt" class="form-control" cols="23" rows="4" placeholder='Cost'></textarea>
                      </div><br><br>                
                
                      <div>
                        <input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                        <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>
                      </div>
    
                  </form>
                      </div>
    </div><!-- end of style_informatios -->
    
<?php
}
?>
</body>
</html>
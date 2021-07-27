<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$sup_name=$_POST['factxt'];
	$sol_name=$_POST['techtxt'];
	$req_name=$_POST['subtxt'];
	

$sql_ins=mysqli_query($dbhandle, "INSERT INTO req_tbl  
						VALUES(
							NULL,
							'$sup_name',
							'$sol_name' ,
							'$req_name' 
							)
					");
	
if($sql_ins==true)
	$msg="1 Row Inserted";
else
	$msg="Insert Error:".mysqli_error();
	
}

//------------------update data----------
if(isset($_POST['btn_upd'])){
	$sup_id=$_POST['factxt'];
	$sol_id=$_POST['techtxt'];
	$req_name=$_POST['subtxt'];
	
	
	$sql_update=mysqli_query($dbhandle, "UPDATE req_tbl SET
							sup_id='$sup_id' ,
							sol_id='$sol_id' ,
							req_name='$req_name' , 
						WHERE req_id=$id

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
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>


<?php

if($opr=="upd")
{
	$sql_upd=mysqli_query($dbhandle, "SELECT * FROM req_tbl WHERE req_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
	
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Requisition Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your Requisition records into database.</p>
			</div>
                  <form method="post">    
                    <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="factxt" style="width: 200px;">
                                            <option>Supplier's name</option>
                            <?php
                               $sup_name=mysqli_query($dbhandle, "SELECT * FROM sup_tbl");
							   while($row=mysqli_fetch_array($sup_name)){
								   if($row['sup_id']==$rs_upd['sup_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                        		<option value="<?php echo $row['sup_id'];?>" <?php echo $iselect;?> > <?php echo $row['sup_name'];?> </option>
                                <?php 
							   }
							
                            ?>
                                        </select>
                                        </div>
                    </div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="techtxt" style="width: 200px">
                                            <option>Soldier's name</option>
                            <?php
                                $sol_name=mysqli_query($dbhandle, "SELECT * FROM sol_tbl");
								while($row=mysqli_fetch_array($sol_name)){
									if($row['sol_id']==$rs_upd['sol_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option value="<?php echo $row['sol_id'];?>" <?php echo $iselect?> > <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                                        </select>
                                        </div>
            </div><br><br>
            
                            <div class="teacher_note_pos">
                                <input type="text" class="form-control" name="subtxt"  id="textbox" value="<?php echo $rs_upd['req_name'];?>" />
                            </div><br>
            
                            <div>
                                <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in"  />
                                <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in"/>                                
                            </div>
                  </form>            
    	</div>
    </form>
</div>
<?php
}
else
{
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-th-list"></span> Requisition Entry Form</h1></div>
  			<div class="panel-body">
                        <form method="post">    
			<div class="container">
				<p style="text-align:center;">Here, you'll add new Requisition detail to record into database.</p>
			</div>


<div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
    					<select name="factxt" style="width: 200px;">
                                            <option>Supplier's name</option>
                            <?php
                               $sup_name=mysqli_query($dbhandle, "SELECT * FROM sup_tbl");
							   while($row=mysqli_fetch_array($sup_name)){
								?>
                        		<option value="<?php echo $row['sup_id'];?>"> <?php echo $row['sup_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                                        </div>
</div><br><br>
            
            <div class="teacher_bday_box" style="margin-left: 0px;">
					<div class="select_style">
                                            <select name="techtxt" style="width: 200px">
                                            <option>Soldier's name</option>
                            <?php
                                $sol_name=mysqli_query($dbhandle, "SELECT * FROM sol_tbl");
								while($row=mysqli_fetch_array($sol_name)){
								?>
                                <option value="<?php echo $row['sol_id'];?>"> <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                    </select>
                                        </div>
            </div><br><br>
            
                <div class="teacher_note_pos">
                	<input type="text" class="form-control" name="subtxt"  id="textbox" placeholder="Stock Item name" />
                </div><br>
            
                <div>
                	<input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in"  />
                        <input type="reset" class="btn btn-primary btn-large" style="margin-left: 9px;" value="Cancel" id="button-in"/>
                </div>
           </form>
    	</div>
    </form>
</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>
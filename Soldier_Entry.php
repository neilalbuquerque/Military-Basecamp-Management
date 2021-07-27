<?php

	$msg="";
	$opr="";
	$id="";
	
	if(isset($_GET['opr'])){
	$opr=$_GET['opr'];}
	
if(isset($_GET['rs_id'])){
	$id=$_GET['rs_id'];}
	
//--------------add data-----------------
if(isset($_POST['btn_sub'])){
	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['genderrdo'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$pob=$_POST['pobtxt'];
	$addr=$_POST['addrtxt'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	$note=$_POST['notetxt'];	
	
$sql_ins=mysqli_query($dbhandle, "INSERT INTO sol_tbl 
						VALUES(
							NULL,
							'$f_name',
							'$l_name' ,
							'$gender',
							'$dob',
							'$pob',
							'$addr',
							'$phone',
							'$mail',
							'$note'
							)
					");
if($sql_ins==true)
	$msg="1 Row Inserted";	
	
else
	$msg="Insert Error:".mysqli_error();
	}
//------------------update data----------
if(isset($_POST['btn_upd'])){
$f_name=$_POST['fnametxt'];
$l_name=$_POST['lnametxt'];
$gender=$_POST['genderrdo'];
$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
$pob=$_POST['pobtxt'];
$addr=$_POST['addrtxt'];
$phone=$_POST['phonetxt'];
$mail=$_POST['emailtxt'];
$note=$_POST['notetxt'];


$sql_update=mysqli_query($dbhandle, "UPDATE sol_tbl SET
                        f_name='$f_name' ,
                        l_name='$l_name' ,
                        gender='$gender' ,
                        dob='$dob' ,
                        pob='$pob' ,
                        address='$addr' ,
                        phone='$phone' ,
                        email='$mail' ,
                        note='$note'
                    WHERE sol_id=$id

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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Welcome to Military Database</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php
if($opr=="upd")
{
	$sql_upd=mysqli_query($dbhandle, "SELECT * FROM sol_tbl WHERE sol_id=$id");
	$rs_upd=mysqli_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Soldier Update Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll update your Soldier's records into database.</p>
			</div>


<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" value="<?php echo $rs_upd['f_name'];?>" />
					<input type="text" name="lnametxt" class="form-control" value="<?php echo $rs_upd['l_name'];?>" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="genderrdo" value="Male"<?php if($rs_upd['gender']=="Male") echo "checked";?> /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="genderrdo" value="Female"<?php if($rs_upd['gender']=="Female") echo "checked";?> /> <span class="p_font">&nbsp;Female</span>
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Birthday: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							$sel="";
							for($i=1985;$i<=2015;$i++){	
								if($i==$y){
									$sel="selected='selected'";}
								else
								$sel="";
							echo"<option value='$i' $sel>$i </option>";
							}
							
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="mm">
       						<option>Month</option>
       						<?php
							$sel="";
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
									if($i==$m){
										$sel=$sel="selected='selected'";}
									else
										$sel="";
                                echo"<option value='$i' $sel> $mon</option>";		
                            }
                        ?>                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd">
       						<option>Date</option>
       						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d)
							$sel="selected='selected'";
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel ;?> >
                        <?php
                        if($i<10)
                            echo"0"."$i" ;
                        else
                            echo"$i";	
							  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div><br><br>
		     	
				<div class="teacher_bdayPlace_pos">
					<input type="text" name="pobtxt" class="form-control" value=" <?php echo $rs_upd['pob']; ?>" />
				</div><br>
				
				<div class="teacher_address_pos">
					<input type="text" name="addrtxt" class="form-control" value=" <?php echo $rs_upd['address'];?>" />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phonetxt" class="form-control" value="<?php echo $rs_upd['phone'];?>" />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="emailtxt" class="form-control" value="<?php echo $rs_upd['email'];?>" />
				</div><br>
				
				<div class="teacher_note_pos">
					<input type="text" name="notetxt" class="form-control" value="<?php echo $rs_upd['note'];?>" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_upd" class="btn btn-primary btn-large" value="Update" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                                    </form>
			</div>
		</div>
	</div>
<?php	
}
else
{
?>
<div class="panel panel-default">
  		<div class="panel-heading"><h1><span class="glyphicon glyphicon-user"></span> Soldier Entry Form</h1></div>
  			<div class="panel-body">
			<div class="container">
				<p style="text-align:center;">Here, you'll add new Soldier's details to record into database.</p>
			</div>

<div class="container_form">
    <form method="post">
				<div class="teacher_name_pos">
					<input type="text" name="fnametxt" class="form-control" placeholder="First name" />
					<input type="text" name="lnametxt" class="form-control" placeholder="Last name" />
				</div><br>
				
				<div class="teacher_radio_pos">
					<input type="radio" name="genderrdo" value="Male" /> <span class="p_font">&nbsp;Male</span>
					<input type="radio" name="genderrdo" value="Female" /> <span class="p_font">&nbsp;Female</span>
				</div><br>
				
				<div class="teacher_bday_box">
					<span class="p_font">Birthday: </span>&nbsp;&nbsp;&nbsp;
					<div class="select_style">
    					<select name="yy">
       						<option>Year</option>
       						<?php
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
						</select>
					</div>
					
					<div class="select_style">
    					<select name="mm">
       						<option>Month</option>
       						<?php
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
                                echo"<option value='$i'> $mon</option>";		
                            }
                        ?>
                        </select>
					</div>
					
					<div class="select_style">
    					<select name="dd">
       						<option>Date</option>
       						<?php
                        for($i=1;$i<=31;$i++){
                        ?>
                        <option value="<?php echo $i; ?>">
                        <?php
                        if($i<10)
                            echo"0".$i;
                        else
                            echo"$i";	  
						?>
						</option>	
						<?php 
						}?>
						</select>
					</div>
					
		     	</div><br><br>
		     	
				<div class="teacher_bdayPlace_pos">
					<input type="text" name="pobtxt" class="form-control" placeholder="Place of birth" />
				</div><br>
				
				<div class="teacher_address_pos">
					<input type="text" name="addrtxt" class="form-control" placeholder="Address" />
				</div><br>
				
				<div class="teacher_mobile_pos">
					<input type="text" name="phonetxt" class="form-control" placeholder="Mobile no." />
				</div><br>
				
				<div class="teacher_mail_pos">
					<input type="text" name="emailtxt" class="form-control" placeholder="Email address" />
				</div><br>
				
				<div class="teacher_note_pos">
					<input type="text" name="notetxt" class="form-control" placeholder="Responsibilities" />
				</div><br>
				
				<div class="teacher_btn_pos">
					<input type="submit" name="btn_sub" href="#" class="btn btn-primary btn-large" value="Register" />&nbsp;&nbsp;&nbsp;
					<input type="reset"  href="#" class="btn btn-primary btn-large" value="Cancel" />
				</div>
                </form>
			</div>
		</div>
	</div>
<?php
}
?>
</body>
</html>
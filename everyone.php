<?php
	session_start(); 
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Welcome to Military Basecamp Management</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery-1.11.0.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
</head>

<body>
    
    <div class="logout_btn">
        <a href="index.php" class="btn btn-primary btn-large"> Logout <i class="icon-white icon-check"></i></a>
    </div>
    
    <div class="img_home_pos">
        <a href="everyone.php"><img src="images/military.png" height="90" alt="Military Basecamp" /></a><span class="header_pos">Military Database</span>
    </div><br>
                        
                        <div class="dropdownmenu_container">
                            <?php        
                            include './drop_down_menu.php';
                            ?>
                        </div>
		
		<div class="container_middle">		
			
			<div class="container_show_post">
				<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
                        elseif($tag=="recruit_entry")
                            include("Recruit_Entry.php");
                        elseif($tag=="soldier_entry")
                            include("Soldier_Entry.php");
                        elseif($tag=="requisition_entry")
                            include("Requisition_Entry.php");
                        elseif($tag=="supplier_entry")
                            include("Supplier_Entry.php");
                        elseif($tag=="susers_entry")
                            include("Users_Entry.php");	
                        elseif($tag=="view_recruits")
                            include("View_Recruits.php");
						elseif($tag=="view_soldiers")
							include("View_Soldiers.php");
						elseif($tag=="view_requisitions")
							include("View_Requisitions.php");
						elseif($tag=="view_users")
							include("View_Users.php");
						elseif($tag=="view_suppliers")
							include("View_Suppliers.php");
						elseif($tag=="stockitems_entry")
							include("StockItems_Entry.php");
						elseif($tag=="view_stockitems")
							include("View_StockItems.php");	
                        ?>
                    </div>
		</div>                
	</div>
        
        <div class="bottom_pos">
            <a href="AboutManagement.php" style="text-decoration: none;">About Management</a>
        </div>
</body>
</html>
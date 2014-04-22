<?php
	require_once('conex.php');
	$link=Conectarse(); 	
	$nombre=$_POST['nombre'];
	$email=$_POST['email'];
	$nacimiento=$_POST['nacimiento'];
	
        	//Create query
	$qry="SELECT * FROM users WHERE login='$email'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['nombre'];
			$_SESSION['SESS_LAST_NAME'] = $member['email'];                       
			session_write_close();
			header("location: index.php");
			exit();
		}else {
                    mysql_query("INSERT INTO users(nombre, email, nacimiento) VALUES('$nombre','$email','$nacimiento')",$link); 
		}
	}else {
		die("Query failed");
	}
        	
	   /*header("Location: index.php");*/
  
?>
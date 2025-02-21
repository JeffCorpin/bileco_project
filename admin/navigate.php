<?php
include '../function.php';
include_once '../session.php';
Session::init();

$function = new Functions();

//---ADDING SECTION---//

	//Add User
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btn-add-user'])){
		
		$flag = $function->addUser($_POST);
			if($flag==1){
			    Session::set("msg", "<div style='background-color: #9fdf9f; color:black; border: solid #9fdf9f 1px; border-radius: 5px; padding: 10px;'><center><i class='fa fa-check'></i> A new User has been added! </center> </div><br>");
			}
			else{
			    Session::set("msg", "<div style='background-color: #ED4337; color:white; border: solid #ED4337  color:white;1px; border-radius: 5px; padding: 10px;'><center><i class='fa fa-warning'></i>Something went wrong! </center> </div><br>");
			}
		
		header("Location: Add-user.php");
	}


	//Edit User
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btn-edit-user'])){		
		$user_id = $_GET['user_id'];
		
			$flag = $function->UpdateUser($_POST, $user_id);
			if($flag==1){
			    Session::set("msg", "<div style='background-color: #9fdf9f; color:black; border: solid #9fdf9f 1px; border-radius: 5px; padding: 10px;'><center><i class='fa fa-check'></i>User has been changed! </center> </div><br>");
			}
			else{
			    Session::set("msg", "<div style='background-color: #ED4337; color:white; border: solid #ED4337  color:white;1px; border-radius: 5px; padding: 10px;'><center><i class='fa fa-warning'></i>Something went wrong! </center> </div><br>");
			}
		header("Location: Edit-user.php?user_id=".$user_id);
	}

	//Delete User
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btn-delete-user'])){		
	
		if (isset($_POST['id'])) {
	        $user_id = $_POST['id'];
	        $flag = $function->DeleteUser($user_id);
	        if ($flag == 1) {
	            $_SESSION["msg"] = "<div style='background-color: #9fdf9f; color:black; border: solid #9fdf9f 1px; border-radius: 5px; padding: 10px;'><center><i class='fa fa-check'></i>User has been deleted! </center> </div><br>";
	        } else {
	            $_SESSION["msg"] = "<div style='background-color: #ED4337; color:white; border: solid #ED4337 1px; border-radius: 5px; padding: 10px;'><center><i class='fa fa-warning'></i>Something went wrong! </center> </div><br>";
	        }
		    } else {
		        $_SESSION["msg"] = "<div style='background-color: #ED4337; color:white; border: solid #ED4337 1px; border-radius: 5px; padding: 10px;'><center><i class='fa fa-warning'></i>Invalid request! </center> </div><br>";
		    }
		header("Location: users.php");
	}

	

?>
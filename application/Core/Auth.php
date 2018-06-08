<?php 

namespace Mini\Core;


/**
* 
*/
class Auth 
{
	
	public static function checkAuth($role, $redirect = true){

		$acceso = ["Alumno" => 1 , "Profesor" => 2, "Administrador" => 3];

		Session::init();

		if (!isset($_SESSION["user_role"])) {
			
			Session::destroy();

			if ($redirect) {
				
				header("Location: /login");
				
			}
			return false;
			exit();


		} 

		if ($acceso[Session::get("user_role")] >= $acceso[$role]) {

			return true;
			
		}

		if ($redirect) {

			header("Location: /error");

		}

		return false;


	}


	
}




 ?>
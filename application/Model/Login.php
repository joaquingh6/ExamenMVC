<?php 


	namespace Mini\Model;
	use Mini\Core\Model;
	use Mini\Core\Session;

	class Login extends Model
	{
		public function doLogin($datos)
		{
			 if (!$datos) {

			 	Session::add('feedback_negative' , 'datos no encontrados');
			 }

			 if (empty($datos['password'])) {

			 	Session::add('feedback_negative' , 'clave no recibida');
			 }
			 				 
	
			$datos['email'] = trim($datos['email']);

			if (!filter_var($datos['email'] , FILTER_VALIDATE_EMAIL)) {
			
				Session::add('feedback_negative' , 'email no valido');
			}

			if (strlen($datos['password']) < 4) {
			
				Session::add('feedback_negative' , 'la clave tiene que tener mas de 4 caracteres');
			}

			if (Session::get('feedback_negative')) {

				//return false;
			
			}

			$sql = 'SELECT u.name , u.id , password , r.name as role from users as u 
				inner join role_user as ru on u.id = ru.user_id
				inner join roles as r on ru.role_id = r.id
				where email = :email';

			$query = $this->db->prepare($sql);

			$query->bindValue(':email' , $datos['email']);

			$query->execute();

			$number = $query->rowCount();

			if($number != 1){

				Session::add('feedback_negative' , 'email no registrado');
				return false;
			}

			$usuario = $query->fetch();

			if ($usuario->password != md5($datos['password'])) {
				
				Session::add('feedback_negative' , 'La clave no coincide');

				return false;

			}

			Session::set('user_id' , $usuario->id);

			Session::set('user_name' , $usuario->name);

			Session::set('user_email' , $datos['email']);

			Session::set('user_role' , $usuario->role);

			return true;

		}





	}

 ?>
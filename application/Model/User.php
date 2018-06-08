<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;

class User extends Model
{
	public function getUsers()
	{
		$sql = "SELECT u.* , r.name as rolerole_user 
		FROM users as u , roles as r , role_user as ru 
		where u.id = ru.user_id and ru.role_id = r.id and r.name = 'Alumno'";

		$query = $this->db->prepare($sql);

		$query->execute();

		return $query->fetchAll();
	}

	public function getUser($id)
	{
		$sql = "SELECT * FROM users where id = $id";

		$query = $this->db->prepare($sql);

		$query->execute();

		return $query->fetch();
	}

	
}
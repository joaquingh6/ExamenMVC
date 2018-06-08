<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;


class Message extends Model
{
	//Funcion para contar mensajes no leidos
	public function unread($id)
	{

		$sql = "SELECT mu.id 
				FROM message_user as mu , messages as m
				WHERE m.id = mu.message_id and mu.user_id = $id and status = 'UNREADED'";

		$query = $this->db->prepare($sql);

        $query->execute();

        return $query->rowCount();

	}

	public function create($params)
	{

		$date = date("Y-m-d h:i:s");

		$sql = "INSERT INTO messages (subject , body , updated_at , created_at) VALUES ('$params[subject]' , '$params[body]' , '$date' , '$date')";

		$query = $this->db->prepare($sql);

        $query->execute();

        return $this->db->LastInsertId();
    }

	public function messageUser($id , $params)
	{

		foreach ($params as $user) {
			
			$sql = "INSERT INTO message_user (user_id , message_id) VALUES ($user , $id)";


			$query = $this->db->prepare($sql);
		
       		$query->execute();
		}

		return;
    }


	
}
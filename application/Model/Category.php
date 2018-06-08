<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;

class Category extends Model
{
	public function getCategories()
	{
		$sql = "SELECT * FROM categories";

		$query = $this->db->prepare($sql);

		$query->execute();

		return $query->fetchAll();
	}

	public function getCategory($slug)
	{


        $sql = "SELECT * FROM categories WHERE slug = '$slug'";

        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetch();
    
	}

	public function create($params){

		$date = date("Y-m-d h:i:s");

		$sql = "INSERT INTO categories (name , slug , body ,created_at , updated_at) VALUES ('$params[name]' , '$params[slug]' , '$params[body]' , '$date' , '$date')";

		$query = $this->db->prepare($sql);

        $query->execute();

        return true;
	}

	public function update($params){

		$date = date("Y-m-d h:i:s");

	

		$sql = "UPDATE categories  SET name = '$params[name]' , slug = '$params[slug]' , body = '$params[body]'	, updated_at = '$date' WHERE id = '$params[id]'";


		$query = $this->db->prepare($sql);

        $query->execute();

        return true;
	}

	public function delete($id){


		$sql = "DELETE FROM categories WHERE id = $id";


		$query = $this->db->prepare($sql);

        $query->execute();

        return true;

	}
}
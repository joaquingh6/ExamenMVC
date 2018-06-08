<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;

class Tag extends Model
{
	public function getTags()
	{
		$sql = "SELECT * FROM tags";

		$query = $this->db->prepare($sql);

		$query->execute();

		return $query->fetchAll();
	}

	public function getTag($slug)
	{


        $sql = "SELECT * FROM tags WHERE slug = '$slug'";

        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetch();
    
	}



	public function create($params){

		$sql = "INSERT INTO tags (name , slug) VALUES ('$params[name]' , '$params[slug]' )";

		$query = $this->db->prepare($sql);

        $query->execute();

        return true;
	}

	public function getTagbyId($id)
	{


        $sql = "SELECT * FROM tags WHERE id = '$id'";

        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetch();
    
	}




	public function update($params){

		$date = date("Y-m-d h:i:s");

		$sql = "UPDATE tags  SET name = '$params[name]' , slug = '$params[slug]' WHERE id = '$params[id]' , updated_at = '$date'";


		$query = $this->db->prepare($sql);

        $query->execute();

        return true;
	}

	public function delete($id){


		$sql = "DELETE FROM tags WHERE id = $id";


		$query = $this->db->prepare($sql);

        $query->execute();

        return true;

	}

	public function getIdTag($id)
	{

		$sql = "SELECT tag_id FROM post_tag WHERE post_id = $id";

		$query = $this->db->prepare($sql);

        $query->execute();

        return true;
	
	}

}
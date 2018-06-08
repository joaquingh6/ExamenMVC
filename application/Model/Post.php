<?php 

namespace Mini\Model;
use Mini\Core\Model;
use Mini\Core\Session;

class Post extends Model
{
	public function getPosts()
	{
		$sql = "SELECT p.* , group_concat(t.name) as tags , c.name as category
		from posts as p , tags as t , post_tag as pt , categories as c 
		where c.id = category_id and p.id = post_id and pt.tag_id = t.id group by p.id ORDER BY updated_at DESC;";

		$query = $this->db->prepare($sql);

		$query->execute();

		return $query->fetchAll();
	}

	public function getPost($slug)
	{

        $sql = "SELECT p.* , group_concat(t.name) as tags ,group_concat(t.id) as tags_id , c.name as category
        from posts as p , tags as t , post_tag as pt , categories as c 
        where p.slug = '$slug' and c.id = category_id and p.id = post_id and pt.tag_id = t.id group by p.id";

        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetch();
    
	}

	public function create($params){

		$date = date("Y-m-d h:i:m");

		$sql = "INSERT INTO posts (name , user_id, slug , excerpt , body , status , category_id, created_at , updated_at) VALUES ('$params[name]' , $_SESSION[user_id], '$params[slug]' , '$params[excerpt]' , '$params[body]' , '$params[status]' , $params[category] , '$date' , '$date' )";

		$query = $this->db->prepare($sql);
		
        $query->execute();

        return $this->db->LastInsertId();
	}

	public function postTag($id , $params){

			

		foreach ($params as $tag) {
			
			$sql = "INSERT INTO post_tag (post_id , tag_id) VALUES ($id , $tag)";


			$query = $this->db->prepare($sql);
		
       		$query->execute();
		}

		return;
    }

    public function deletePostTag($id)
    {
    	$sql = "DELETE FROM post_tag  WHERE post_id = $id";

			$query = $this->db->prepare($sql);
		
       		$query->execute();

       		return;
    }

    public function update($id ,$params){

    	$date = date("Y-m-d h:i:m");

    	$sql = "UPDATE posts  SET name = '$params[name]' , slug = '$params[slug]' , excerpt = '$params[excerpt]' , body = '$params[body]' , category_id = '$params[category]' , status = '$params[status]' , updated_at = '$date' WHERE id = '$id'";


		$query = $this->db->prepare($sql);

        $query->execute();

        return true;
    }

    public function img($destino , $id)
    {
    	$sql = "UPDATE posts SET file = '$destino' WHERE id = $id";

    	$query = $this->db->prepare($sql);

        $query->execute();

        return true;
    }


    

    public function delete($id){


		$sql = "DELETE FROM posts WHERE id = $id ";


		$query = $this->db->prepare($sql);

        $query->execute();

        return true;

	}
}
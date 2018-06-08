<?php 

namespace Mini\Controller;
use Mini\Core\Session;
use Mini\Core\TemplatesFactory;
use Mini\Model\Message;


class Controller
{
	public function __construct()
	{
		Session::init();
		$this->view=TemplatesFactory::templates();

		$messages = 0;
		
		if (isset($_SESSION['user_id'])) {

			$messages = new Message();
			$messages = $messages->unread($_SESSION['user_id']);

		}
		


		$this->view->addData(["messages"=> $messages]);

	}

	
}

 ?>
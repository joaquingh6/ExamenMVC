<?php 

namespace Mini\Core;

use League\Plates\Engine;

/**
* 
*/
class TemplatesFactory 
{
	
	private static $templates;

	public static function templates()
	{
		if (!TemplatesFactory::$templates) {
			
			TemplatesFactory::$templates= new Engine(APP."view");

			TemplatesFactory::$templates->addData(["titulo" => "academia"]);

			TemplatesFactory::$templates->registerFunction("borrar_feedback" , function(){

				Session::set("feedback_negative" , null);

				Session::set("feedback_positive" , null);

			});

		}
		return TemplatesFactory::$templates;
	}
}


 ?>
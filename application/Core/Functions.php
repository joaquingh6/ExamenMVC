<?php 

	namespace Mini\Core;


	class Functions
	{

		public static function slug($string){

			$slug = str_replace(" ", "-", strtolower($string));

			return $slug;

		}


	}




?>
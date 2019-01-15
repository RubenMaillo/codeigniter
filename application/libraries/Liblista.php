<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Liblista{
		public function __construct(){

		}

		function construirLinks($tipo){
			

			
			$res_prod = "<nav><ul>";
			
			for($i=1;$i<101;$i++){
				$res_prod .="<li><a href='recogerdatos/".$tipo."/".$i."'>".$tipo.$i."</a></li>";
			}
			
			
		$res_prod .="</ul></nav>";
	
		
		
		return $res_prod;
}
}
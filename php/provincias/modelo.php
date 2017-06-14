<?php
    require_once("php/modeloAbstractoDB.php");
	
    class Provincias extends ModeloAbstractoDB {
		public $id;
		public $slug;
		public $provincia;
		public $comunidad_id;
		public $capital_id;
		
		function __construct() {
			//$this->db_name = '';
		}
		 
		public function lista($provincia='') {
			if($provincia !=''):
				$this->query = "
				SELECT provincia as label, id as value FROM provincias
				WHERE provincia  LIKE '$provincia%'";
				$this->obtener_resultados_query();
				return $this->rows;
			endif;
		}
		
		/*public function lista() {
			$this->query = "
			SELECT * FROM provincias";
			$this->obtener_resultados_query();
			return $this->rows;
		}*/
		
		
		
		function __destruct() {
			unset($this);
		}
	}
?>
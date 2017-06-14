<?php
    require_once("php/modeloAbstractoDB.php");
	
    class Municipios extends ModeloAbstractoDB {
		public $id;
		public $slug;
		public $provincia_id;
		public $municipio;
		public $latitud;
		public $longitud;
		
		function __construct() {
			//$this->db_name = '';
		}
		 
		public function lista($provincia_id='') {
			if($provincia_id !=''):
				$this->query = "
				SELECT municipio, latitud, longitud FROM municipios
				WHERE provincia_id  = '$provincia_id'";
				$this->obtener_resultados_query();
				foreach ($this->rows as $row) {
					$arreglo[]=array($row['municipio'],$row['latitud'],$row['longitud']);
				}
				return $arreglo;
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
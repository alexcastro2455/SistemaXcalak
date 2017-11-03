<?php  

	/*class connection{

		private $conn;

		public function _construct(){
			$this->conn = new mysqli('localhost', 'root', '', 'bd_sistema_hotelero');
		}

		public function get_conection(){
			return $this->conn;
		}
	}*/
	$myConnection = mysqli_connect('localhost','root','','bd_sistema_hotelero') or die('Error al conectar'.mysqli_error($conn));

?>
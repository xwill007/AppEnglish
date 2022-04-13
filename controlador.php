<?php
//configuracion
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DBNAME", "db_app_english");
define("PORT", 3306);

class DB extends mysqli{
	protected static $instance;

	public function __construct($host,$user,$pass,$dbname,$port) {
        mysqli_report(MYSQLI_REPORT_OFF);
        @parent::__construct($host,$user,$pass,$dbname,$port);
        if( mysqli_connect_errno() ) {
            throw new exception(mysqli_connect_error(), mysqli_connect_errno()); 
        }
    }

	public static function getDBConnection(){
		if( !self::$instance ) {
            self::$instance = new self(HOST,USER,PASS,DBNAME,PORT);
            $consulta = "SET CHARACTER SET UTF8";
			self::$instance->query($consulta);
        }
        return self::$instance;		
	}

	function getUser($user,$pass){
		$consulta = "SELECT * FROM users WHERE email='".$user."' AND password='".$pass."'";
		//print($consulta."<br>");
		return $this->query($consulta);
	}
	
	function getUsuarios(){
		$consulta = "SELECT * FROM users LIMIT 50";
		return $this->query($consulta);
	}

	function getName($user){
		$consulta = "SELECT name FROM users WHERE email='".$user."'";
		return $this->query($consulta);
	}

	function getSongs(){
		$consulta = "SELECT * FROM songs LIMIT 50";
		return $this->query($consulta);
	}
	
	function getTitleSong($id){
		$consulta = "SELECT title FROM songs WHERE id='".$id."'";
		return $this->query($consulta);
	}

	function getLinkSong($id){
		$consulta = "SELECT link FROM songs WHERE id='".$id."'";
		return $this->query($consulta);
	}

	

	function createCard($cardName,$desc,$precio,$imagen){
		$consulta = "INSERT INTO productos (nombre,descripcion,precio,imagen) VALUE("
			."'".$cardName."', "
			."'".$desc."', "
			.$precio.", "
			."'".$imagen."')";
		print($consulta."<br>");
		return $this->query($consulta);
	}

	function deleteUser($id){
		$consulta = "DELETE FROM users WHERE id='".$id."'";
		print($consulta."<br>");
		return $this->query($consulta);
	}

	function updateCard($cardName, $newCardName,$desc,$precio,$imagen = ""){
		if($imagen!=""){
			$consulta = "UPDATE productos SET "
			."nombre='".$newCardName."',"
			."descripcion='".$desc."', "
			."precio=".$precio.", "
			."imagen='".$imagen."' "
			."WHERE nombre='".$cardName."'";
		} else {
			$consulta = "UPDATE productos SET "
			."nombre='".$newCardName."',"
			."descripcion='".$desc."', "
			."precio=".$precio." "
			."WHERE nombre='".$cardName."'";
		}
		print($consulta."<br>");
		return $this->query($consulta);
	}

	
}
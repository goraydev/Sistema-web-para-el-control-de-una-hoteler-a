<?php
class ContactoData {
	public static $tablename = "contacto";


	public function ContactoData(){
		$this->documento = ""; 
		$this->nombre = "";
		$this->telefono = "";
		$this->email = "";
	} 

	public function add(){
		$sql = "insert into contacto (documento,nombre,telefono,email,id_persona) ";
		$sql .= "value (\"$this->documento\",\"$this->nombre\",\"$this->telefono\",\"$this->email\",$this->id_persona)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ContactoData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set documento=\"$this->documento\",nombre=\"$this->nombre\",telefono=\"$this->telefono\",email=\"$this->email\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ContactoData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ContactoData());
	}

	
	public static function getAllCliente($q){
		$sql = "select * from ".self::$tablename." where id_persona=$q";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ContactoData());

	}


}

?>
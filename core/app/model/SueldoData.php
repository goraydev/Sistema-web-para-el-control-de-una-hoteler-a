<?php
class SueldoData {
	public static $tablename = "sueldo";

	public function SueldoData(){
		$this->fecha_pago = "";
	}

	public function getUsuario(){ return UserData::getById($this->id_usuario);}

	public function add(){
		$sql = "insert into sueldo (id_usuario,monto,dia_pago,fecha_comienzo) ";
		$sql .= "value ($this->id_usuario,\"$this->monto\",\"$this->dia_pago\",\"$this->fecha_comienzo\")";
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

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set estado=2 where id=$this->id";
		Executor::doit($sql);
	}

	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SueldoData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where estado=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SueldoData());
	}





	


}

?>
<?php
class ClienteProcesoData {
	public static $tablename = "cliente_proceso";

	public function ClienteProcesoData(){
	
	}

	public function getCliente(){ return PersonaData::getById($this->id_cliente);}
	public function getProceso(){ return ProcesoData::getById($this->id_proceso);}

	public function add(){ 
		$sql = "insert into cliente_proceso (id_cliente,id_proceso,sesion) ";
		$sql .= "value ($this->id_cliente,$this->id_proceso,\"$this->sesion\")";
		return Executor::doit($sql);
	}

	public function addPro(){ 
		$sql = "insert into cliente_proceso (id_cliente,sesion) ";
		$sql .= "value ($this->id_cliente,\"$this->sesion\")";
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
		$sql = "update ".self::$tablename." set id_cliente=$this->id_cliente,id_proceso=$this->id_proceso where id=$this->id";
		Executor::doit($sql);
	}

	public function updateProceso(){
		$sql = "update ".self::$tablename." set id_proceso=$this->id_proceso where id=$this->id";
		Executor::doit($sql);
	}



	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ClienteProcesoData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where estado=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClienteProcesoData());
	}

	public static function getAllTemporal($id_session){
		$sql = "select * from ".self::$tablename." where sesion=\"$id_session\" and id_proceso is null order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClienteProcesoData());
	}

	public static function getAllTemporal1($id_session){
		$sql = "select * from ".self::$tablename." where sesion=\"$id_session\" and id_proceso is null order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClienteProcesoData());
	}

	public static function getAllProceso($id_proceso){
		$sql = "select * from ".self::$tablename." where id_proceso=$id_proceso  order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ClienteProcesoData());
	}

	

	


}

?>
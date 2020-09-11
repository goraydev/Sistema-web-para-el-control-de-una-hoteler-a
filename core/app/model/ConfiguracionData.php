<?php
class ConfiguracionData {
	public static $tablename = "configuracion";

	public function ConfiguracionData(){
		$this->nombre = "";
		$this->direccion = "";
		$this->estado = "";
		$this->telefono = "";
		$this->fax = "";
		$this->rnc = "";
	
	}

	
	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,direccion,estado,telefono,fax,rnc,registro_empresarial,ciudad) ";
		$sql .= "value (\"$this->nombre\",\"$this->direccion\",\"$this->estado\",\"$this->telefono\",\"$this->fax\",\"$this->rnc\",\"$this->registro_empresarial\",\"$this->ciudad\")";
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

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",direccion=\"$this->direccion\",estado=\"$this->estado\",telefono=\"$this->telefono\",fax=\"$this->fax\",rnc=\"$this->rnc\",registro_empresarial=\"$this->registro_empresarial\",ciudad=\"$this->ciudad\" where id=$this->id";
		Executor::doit($sql);
	}


	public function update_logo(){
		$sql = "update ".self::$tablename." set logo=\"$this->logo\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ConfiguracionData());

	}

	public static function getAllConfiguracion(){
		$sql = "select * from ".self::$tablename." limit 1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ConfiguracionData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConfiguracionData());
	}







}

?>
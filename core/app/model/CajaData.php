<?php
class CajaData {
	public static $tablename = "caja";

	public function CajaData(){

	
        $this->fecha_apertura = "";
        $this->fecha_cierre = "";
        $this->monto_apertura = "";
        $this->monto_cierre = "";
		$this->fecha_creada = "NOW()"; 
	} 

	public function getUsuario(){ return UserData::getById($this->id_usuario);}

	public function add(){
		$sql = "insert into ".self::$tablename." (fecha_apertura,monto_apertura,estado,id_usuario,fecha_creada) ";
		$sql .= "value (\"$this->fecha_apertura\",\"$this->monto_apertura\",1,$this->id_usuario,NOW())";
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
	public function cerrarcaja(){
		$sql = "update ".self::$tablename." set fecha_cierre=\"$this->fecha_cierre\",monto_cierre=\"$this->monto_cierre\",estado=\"$this->estado\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set tipo=\"$this->tipo\",id_vehiculo=$this->id_vehiculo,fecha=\"$this->fecha\",hora=\"$this->hora\" where id=$this->id";
		Executor::doit($sql);
	}



	
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CajaData());

	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by fecha_apertura desc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CajaData());
	}

	public static function getCierreCaja(){
		$sql = "select * from ".self::$tablename." where estado=1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CajaData());
	}

	public static function getAllAbierto(){
		$sql = "select * from ".self::$tablename." where estado=1";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CajaData());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where id like '%$p%'  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CajaData());
	}

	




}

?>
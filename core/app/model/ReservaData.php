<?php
class ReservaData {
	public static $tablename = "reservations";



	public function ReservaData(){
		$this->name = ""; 
		$this->start = "";
		$this->end = "";
		$this->status = "";
		$this->paid = "";
	} 

	public function getHabitacion(){ return HabitacionData::getById($this->room_id);}

	public function add(){
		$sql = "insert into reservations (name,start,end,room_id,status,paid) ";
		$sql .= "value (\"$this->name\",\"$this->start\",\"$this->end\",$this->room_id,\"$this->status\",$this->paid)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto HabitacionData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",descripcion=\"$this->descripcion\",id_categoria=$this->id_categoria where id=$this->id";
		Executor::doit($sql);
	}

	public function updateEstado(){
		$sql = "update ".self::$tablename." set estado=\"$this->estado\" where id=$this->id";
		Executor::doit($sql);
	}

	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new HabitacionData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new HabitacionData());
	}

	public static function getAllNivel($nivel){
		$sql = "select * from ".self::$tablename." where id_nivel=$nivel; ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HabitacionData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HabitacionData());

	}

	public static function getOcupados(){
		$sql = "select * from ".self::$tablename." where estado=2 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HabitacionData());

	}


}

?>
<?php
class HabitacionData {
	public static $tablename = "habitacion";



	public function HabitacionData(){
		$this->nombre = ""; 
		$this->descripcion = "";
		$this->fecha_creada = "NOW()";
	} 

	public function getCategoria(){ return CategoriaData::getById($this->id_categoria);}

	public function add(){
		$sql = "insert into habitacion (nombre,descripcion,precio,id_categoria,estado,fecha_creada) ";
		$sql .= "value (\"$this->nombre\",\"$this->descripcion\",\"$this->precio\",$this->id_categoria,\"$this->estado\",$this->fecha_creada)";
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

	public function updateRoom(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",descripcion=\"$this->descripcion\",precio=\"$this->precio\",id_categoria=$this->id_categoria where id=$this->id";
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

	public static function getLibres(){
		$sql = "select * from ".self::$tablename." where estado=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new HabitacionData());

	}


}

?>
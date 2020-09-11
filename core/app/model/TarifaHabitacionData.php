 <?php
class TarifaHabitacionData {
	public static $tablename = "tarifa_habitacion";


	public function TarifaHabitacionData(){
		
	} 
 
	public function getTarifa(){ return TarifaData::getById($this->id_tarifa);}
	public function getHabitacion(){ return HabitacionData::getById($this->id_habitacion);}

	public function add(){
		$sql = "insert into tarifa_habitacion (id_tarifa,id_habitacion,precio) ";
		$sql .= "value ($this->id_tarifa,$this->id_habitacion,\"$this->precio\")";
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

// partiendo de que ya tenemos creado un objecto PersonaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set id_tarifa=$this->id_tarifa,id_habitacion=$this->id_habitacion,precio=\"$this->precio\" where id=$this->id";
		Executor::doit($sql);
	}

	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TarifaHabitacionData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new TarifaHabitacionData());
	}

	public static function getAllHabitacion($id){
		$sql = "select * from ".self::$tablename." where id_habitacion=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TarifaHabitacionData());
	}


	

}

?>
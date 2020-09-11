<?php
class TmpData {
	public static $tablename = "tmp";



	public function TmpData(){
		$this->cantidad_tmp = "";
		$this->precio_tmp = "";
		
	}
	public function getProduct(){ return ProductoData::getById($this->id_producto);}
	
	public function add(){
		$sql = "insert into tmp (id_producto,cantidad_tmp,precio_tmp) ";
		$sql .= "value (\"$this->id_producto\",\"$this->cantidad_tmp\",\"$this->precio_tmp\")";
		Executor::doit($sql);
	}

	public function addTmp(){
		$sql = "insert into tmp (id_producto,cantidad_tmp,precio_tmp,sessionn_id,tipo_operacion) ";
		$sql .= "value (\"$this->id_producto\",\"$this->cantidad_tmp\",\"$this->precio_tmp\",\"$this->sessionn_id\",$this->tipo_operacion)";
		Executor::doit($sql);
	}



	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_tmp=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_tmp=$this->id_tmp";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto



 	public function updateCantidad(){
		$sql = "update ".self::$tablename." set cantidad_tmp=\"$this->cantidad_tmp\" where id_tmp=$this->id_tmp";
		Executor::doit($sql);
	}
 
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_tmp=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TmpData());

	}

	public static function getByIdProducto($id){
		$sql = "select * from ".self::$tablename." where id_producto=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TmpData());

	}

	
	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new TmpData());
	}
	
	public static function getAllTemporal($id_session){
		$sql = "select * from ".self::$tablename." where sessionn_id=\"$id_session\" and tipo_operacion=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TmpData());
	}

	public static function getAllTemporalStock($id_session){
		$sql = "select * from ".self::$tablename." where sessionn_id=\"$id_session\" and tipo_operacion=1 group by id_producto ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TmpData());
	}

	public static function getAllTemporalCompra($id_session){
		$sql = "select * from ".self::$tablename." where sessionn_id=\"$id_session\" and tipo_operacion=2 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TmpData());
	}
	


}

?>
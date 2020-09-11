<?php
class ProcesoSueldoData {
	public static $tablename = "proceso_sueldo";

	public function ProcesoSueldoData(){ 
		$this->fecha = "";
		$this->fecha_creada = "NOW()";
	}

	public function getSueldo(){ return SueldoData::getById($this->id_sueldo);}

	public function add(){
		$sql = "insert into proceso_sueldo (id_sueldo,monto,fecha,id_caja,tipo,fecha_creada) ";
		$sql .= "value ($this->id_sueldo,\"$this->monto\",\"$this->fecha\",$this->id_caja,$this->tipo,$this->fecha_creada)";
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
	public function updateAnular(){
		$sql = "update ".self::$tablename." set estado=0 where id=$this->id";
		Executor::doit($sql);
	}

	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProcesoSueldoData());

	} 

	public static function getAll(){ 
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoSueldoData());
	}

	public static function getAllSueldos($id,$start,$end){
		$sql = "select * from ".self::$tablename." where id_sueldo=$id and date(fecha) > \"$start\" and date(fecha) <= \"$end\" ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoSueldoData());
	}

	public static function getSueldoCaja($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja  and ( tipo=2 or tipo = 1) and tipo=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoSueldoData());
	}

	public static function getIngresoRangoFechas($start,$end){
		$sql = "select * from ".self::$tablename." where date(fecha_creada) >= \"$start\" and date(fecha_creada) <= \"$end\"  and ( tipo=2 or tipo = 1) and tipo=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoSueldoData());
	}

	public static function getIngresoGraficoFechas($anio,$mes){
		$sql = "select * from ".self::$tablename." where year(fecha_creada) = $anio  and month(fecha_creada) = $mes  and ( tipo=2 or tipo = 1) and tipo=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoSueldoData());
	}

	public static function getAllAcumulado($id,$start,$end){ 
		$sql = "select * from ".self::$tablename." where id_sueldo=$id and date(fecha) > \"$start\" and date(fecha) <= \"$end\"  and tipo=1 and  estado=1 ";
		$query = Executor::doit($sql); 
		return Model::many($query[0],new ProcesoSueldoData());
	} 

	public static function getAllAumento($id,$start,$end){
		$sql = "select * from ".self::$tablename." where id_sueldo=$id and date(fecha) > \"$start\" and date(fecha) <= \"$end\"  and tipo=2 and  estado=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoSueldoData());
	}

	public static function getAllDescuento($id,$start,$end){
		$sql = "select * from ".self::$tablename." where id_sueldo=$id and date(fecha) > \"$start\" and date(fecha) <= \"$end\"  and tipo=3 and  estado=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoSueldoData());
	}

	public static function getReporteMensual11($dia,$mes){
		$sql = "select * from ".self::$tablename." where day(fecha_creada) = \"$dia\"  and month(fecha_creada) = \"$mes\" and estado=1 and ( tipo=2 or tipo = 1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoSueldoData());

	}





	


}

?>
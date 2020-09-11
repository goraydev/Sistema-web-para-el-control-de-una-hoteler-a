<?php
class ProcesoVentaData {
	public static $tablename = "proceso_venta";


	public function ProcesoVentaData(){
		$this->cantidad = ""; 
		$this->precio = "";
		
		$this->fecha_creada = "NOW()";
	}  

	public function getProducto(){ return ProductoData::getById($this->id_producto);}
	public function getProceso(){ return ProcesoData::getById($this->id_operacion);}


	public function add(){ 
		$sql = "insert into proceso_venta (id_producto,id_operacion,id_venta,cantidad,precio,fecha_creada,id_caja,id_usuario) ";
		$sql .= "value ($this->id_producto,$this->id_operacion,$this->id_venta,$this->cantidad,\"$this->precio\",$this->fecha_creada,$this->id_caja,$this->id_usuario)";
		return Executor::doit($sql);
	} 

	public function addCompra(){  
		$sql = "insert into proceso_venta (id_producto,id_venta,cantidad,precio,tipo_operacion,fecha_creada,id_caja,id_usuario) ";
		$sql .= "value ($this->id_producto,$this->id_venta,$this->cantidad,\"$this->precio\",2,$this->fecha_creada,$this->id_caja,$this->id_usuario)";
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
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",descripcion=\"$this->descripcion\",id_categoria=$this->id_categoria where id=$this->id";
		Executor::doit($sql);
	}

	public function updateFecha(){
		$sql = "update ".self::$tablename." set fecha_creada=\"$this->fecha_creada\" where id=$this->id";
		Executor::doit($sql);
	}

	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProcesoVentaData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}

	public static function getProcesoProductoo($id_producto){
		$sql = "select * from ".self::$tablename." where id_producto=$id_producto";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());

	} 


	public static function getAllSalidas($id_producto){
		$sql = "select * from ".self::$tablename." where tipo_operacion=1 and id_producto=$id_producto ";;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}

	public static function getAllSalidasMes($id_producto,$mes,$anio){
		$sql = "select * from ".self::$tablename." where tipo_operacion=1 and id_producto=$id_producto and month(fecha_creada) = \"$mes\" and year(fecha_creada) = \"$anio\" "; 
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}


	public static function getAllEntradas($id_producto){
		$sql = "select * from ".self::$tablename." where tipo_operacion=2 and id_producto=$id_producto ";;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}

	public static function getAllEntradasMes($id_producto,$mes,$anio){
		$sql = "select * from ".self::$tablename." where tipo_operacion=2 and id_producto=$id_producto and month(fecha_creada) = \"$mes\" and year(fecha_creada) = \"$anio\" "; 
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}

 
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where id like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());

	}

	public static function getByAll($id){
		$sql = "select * from ".self::$tablename." where id_operacion=$id ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());

	} 


	public static function getByAllCompra($id){
		$sql = "select * from ".self::$tablename." where id_venta=$id ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());

	} 

	public static function getReporteDiario($hoy){
		$sql = "select * from ".self::$tablename." where date(fecha_creada) = \"$hoy\" and tipo_operacion=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());

	}
 
	public static function getReporteDiarioUser($hoy,$user){
		$sql = "select * from ".self::$tablename." where date(fecha_creada) = \"$hoy\"  and id_usuario=$user and tipo_operacion=1  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}

  
	public static function getIngresoCaja($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and date(fecha_creada) != 'NULL' and tipo_operacion=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}

	public static function getIngresoFechaGrafico($anio,$mes){
		$sql = "select * from ".self::$tablename." where year(fecha_creada) = $anio  and month(fecha_creada) = $mes  and date(fecha_creada) != 'NULL' and tipo_operacion=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}

	public static function getFechaGraficoEgreso($anio,$mes){
		$sql = "select * from ".self::$tablename." where year(fecha_creada) = $anio  and month(fecha_creada) = $mes  and date(fecha_creada) != 'NULL' and tipo_operacion=2 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}
 
	public static function getEgresoCaja($id_caja){
		$sql = "select * from ".self::$tablename." where id_caja=$id_caja and date(fecha_creada) != 'NULL' and tipo_operacion=2 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}

	public static function getIngresoRangoFechasEgreso($start,$end){
		$sql = "select * from ".self::$tablename." where date(fecha_creada) >= \"$start\" and date(fecha_creada) <= \"$end\" and date(fecha_creada) != 'NULL' and tipo_operacion=2 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}

	public static function getReporteMensual11($dia,$mes){
		$sql = "select * from ".self::$tablename." where day(fecha_creada) = \"$dia\"  and month(fecha_creada) = \"$mes\" and tipo_operacion=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());

	}

	public static function getReporteMensual11Compra($dia,$mes){
		$sql = "select * from ".self::$tablename." where day(fecha_creada) = \"$dia\"  and month(fecha_creada) = \"$mes\" and tipo_operacion=2 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());

	}


	public static function getFiltroFechas($start,$end){
 		$sql = "select * from ".self::$tablename." where date(fecha_creada) >= \"$start\" and date(fecha_creada) <= \"$end\" and tipo_operacion=1   group by id_ desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProcesoVentaData());
	}


}

?>
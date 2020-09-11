<?php
class VentaData {
	public static $tablename = "venta";


	public function VentaData(){
		$this->nro_comprobante = ""; 
 
		 
		$this->fecha_creada = "NOW()";
	} 

	public function getTipoComprobante(){ return TipoComprobanteData::getById($this->id_tipo_comprobante);}
	public function getUsuario(){ return UserData::getById($this->id_usuario);}
	public function getProveedor(){ return PersonaData::getById($this->id_proveedor);}


	public function addVenta(){
		$sql = "insert into venta (id_tipo_comprobante,id_tipo_pago,tipo_operacion,id_proveedor,total,id_usuario,id_caja,fecha_creada) ";
		$sql .= "value ($this->id_tipo_comprobante,$this->id_tipo_pago,1,$this->id_proveedor,\"$this->total\",$this->id_usuario,$this->id_caja,$this->fecha_creada)";
		return Executor::doit($sql);
	} 

	public function addVentaHuesped(){
		$sql = "insert into venta (id_tipo_comprobante,id_tipo_pago,tipo_operacion,total,id_usuario,id_caja,fecha_creada) ";
		$sql .= "value ($this->id_tipo_comprobante,$this->id_tipo_pago,1,\"$this->total\",$this->id_usuario,$this->id_caja,$this->fecha_creada)";
		return Executor::doit($sql);
	} 

	public function addCompra(){
		$sql = "insert into venta (id_tipo_comprobante,nro_comprobante,id_proveedor,id_tipo_pago,tipo_operacion,total,id_usuario,id_caja,fecha_creada) ";
		$sql .= "value ($this->id_tipo_comprobante,\"$this->nro_comprobante\",$this->id_proveedor,$this->id_tipo_pago,2,\"$this->total\",$this->id_usuario,$this->id_caja,$this->fecha_creada)";
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
		$sql = "update ".self::$tablename." set nro_comprobante=\"$this->nro_comprobante\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new VentaData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new VentaData());
	}

	public static function getFiltroFechas($start,$end){
 		$sql = "select * from ".self::$tablename." where date(fecha_creada) >= \"$start\" and date(fecha_creada) <= \"$end\" and tipo_operacion=2   order by id desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new VentaData());
	}


	
	



} 

?>
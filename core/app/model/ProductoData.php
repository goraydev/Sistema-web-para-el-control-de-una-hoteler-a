<?php
class ProductoData {
	public static $tablename = "producto";


	public function ProductoData(){
		$this->codigo = ""; 
		$this->nombre = "";
		$this->marca = "";
		$this->descripcion = "";
		$this->precio_compra = "";
		$this->precio_venta = "";
		$this->fecha_creada = "NOW()";
	} 

	public function getProveedor(){ return PersonaData::getById($this->id_proveedor);}

	public function add(){
		$sql = "insert into producto (codigo,nombre,marca,presentacion,descripcion,precio_compra,precio_venta,stock,id_proveedor,fecha_creada) ";
		$sql .= "value (\"$this->codigo\",\"$this->nombre\",\"$this->marca\",\"$this->presentacion\",\"$this->descripcion\",\"$this->precio_compra\",\"$this->precio_venta\",\"$this->stock\",\"$this->id_proveedor\",$this->fecha_creada)";
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
		$sql = "update ".self::$tablename." set codigo=\"$this->codigo\",nombre=\"$this->nombre\",marca=\"$this->marca\",presentacion=\"$this->presentacion\",descripcion=\"$this->descripcion\",precio_compra=\"$this->precio_compra\",precio_venta=\"$this->precio_venta\" where id=$this->id";
		Executor::doit($sql);
	}

	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductoData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductoData());

	}


}

?>
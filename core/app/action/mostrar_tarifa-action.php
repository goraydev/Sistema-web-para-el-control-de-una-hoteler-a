              
<?php if(isset($_POST['id_habitacion']) and $_POST['id_habitacion']!=""){ ?>

<?php $tarifas = TarifaHabitacionData::getAllHabitacion($_POST['id_habitacion']); ?>          

	<h4 class="custom-font"><strong>Tarifa</strong> </h4>
    <select class="form-control" onchange="CargarPrecio(this.value);" required name="id_tarifa">
        <option value="">--- Selecciona ---</option>
        <?php foreach($tarifas as $tarifa_ha):?>
        <option value="<?php echo $tarifa_ha->id;?>" ><?php echo $tarifa_ha->getTarifa()->nombre;?></option>
        <?php endforeach;?> 
                                            
    </select> 


<?php }; ?> 
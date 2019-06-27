<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>

		<div class="form-group">
			<?php echo Form::label('Vehicle reg no', 'vehicle_reg_no', array('class'=>'control-label')); ?>

				<?php echo Form::input('vehicle_reg_no', Input::post('vehicle_reg_no', isset($car) ? $car->vehicle_reg_no : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Vehicle reg no')); ?>

		</div>

		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Clear Penalties', array('class' => 'btn btn-primary','onclick' => "return confirm('Are you sure?')")); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>
<h2>Editing Car</h2>
<br>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>

<fieldset>
    <div class="form-group">
        <?php echo Form::label('Owner name', 'owner_name', array('class'=>'control-label')); ?>

        <?php echo Form::input('owner_name', Input::post('owner_name', isset($car) ? $car->owner_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Owner name')); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('Phone no', 'phone_no', array('class'=>'control-label')); ?>

        <?php echo Form::input('phone_no', Input::post('phone_no', isset($car) ? $car->phone_no : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Phone no')); ?>

    </div>
    <div class="form-group">
        <?php echo Form::label('Id number', 'id_number', array('class'=>'control-label')); ?>

        <?php echo Form::input('id_number', Input::post('id_number', isset($car) ? $car->id_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Id number')); ?>

    </div>
    <div class="form-group">


        <?php echo Form::input('vehicle_reg_no', Input::post('vehicle_reg_no', isset($car) ? $car->vehicle_reg_no : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Vehicle reg no','type'=>'hidden')); ?>

    </div>

    <div class="form-group">
        <label class='control-label'>&nbsp;</label>
        <?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
</fieldset>
<?php echo Form::close(); ?>
<p>
	<?php echo Html::anchor('car/view/'.$car->id, 'View'); ?> |
	<?php echo Html::anchor('car', 'Back'); ?></p>

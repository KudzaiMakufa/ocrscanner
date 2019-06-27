<h2>Viewing #<?php echo $car->id; ?></h2>

<p>
	<strong>Owner name:</strong>
	<?php echo $car->owner_name; ?></p>
<p>
	<strong>Phone no:</strong>
	<?php echo $car->phone_no; ?></p>
<p>
	<strong>Id number:</strong>
	<?php echo $car->id_number; ?></p>
<p>
	<strong>Vehicle reg no:</strong>
	<?php echo $car->vehicle_reg_no; ?></p>
<p>
	<strong>Pemalty count:</strong>
	<?php echo $car->penalty_count; ?></p>

<?php echo Html::anchor('car/edit/'.$car->id, 'Edit'); ?> |
<?php echo Html::anchor('car', 'Back'); ?>
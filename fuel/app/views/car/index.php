<h2>Listing Car Owners</h2>
<br>
<?php if ($cars): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Owner name</th>
			<th>Phone no</th>
			<th>Id number</th>
			<th>Vehicle reg no</th>
			<th>Penalty count</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($cars as $item): ?>		<tr>

			<td><?php echo $item->owner_name; ?></td>
			<td><?php echo $item->phone_no; ?></td>
			<td><?php echo $item->id_number; ?></td>
			<td><?php echo $item->vehicle_reg_no; ?></td>
			<td><?php echo $item->penalty_count; ?></td>
			<td>


                <?php echo Html::anchor('car/view/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> View', array('class' => 'btn btn-default btn-sm')); ?> |
                <?php echo Html::anchor('car/edit/'.$item->id, '<i class="glyphicon glyphicon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?> |
                <?php echo Html::anchor('car/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Cars.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('car/create', 'Add new  Car owner', array('class' => 'btn btn-success')); ?>

</p>

<?php
class Model_Car extends Model_Crud
{
	protected static $_table_name = 'cars';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('owner_name', 'Owner Name', 'required|max_length[255]');
		$val->add_field('phone_no', 'Phone No', 'required|max_length[255]');
		$val->add_field('id_number', 'Id Number', 'required|max_length[255]');
		$val->add_field('vehicle_reg_no', 'Vehicle Reg No', 'required|max_length[255]');
		//$val->add_field('penalty_count', 'Pemalty Count', 'required|max_length[255]');

		return $val;
	}

}

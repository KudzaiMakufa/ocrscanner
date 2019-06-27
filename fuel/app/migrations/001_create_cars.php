<?php

namespace Fuel\Migrations;

class Create_cars
{
	public function up()
	{
		\DBUtil::create_table('cars', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'owner_name' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'phone_no' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'id_number' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'vehicle_reg_no' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'penalty_count' => array('constraint' => '255', 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('cars');
	}
}
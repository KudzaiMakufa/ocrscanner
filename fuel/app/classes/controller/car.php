<?php
class Controller_Car extends Controller_Template
{

	public function action_index()
	{
		$data['cars'] = Model_Car::find(array('order_by'=>array('id'=>'desc')));
		$this->template->title = "Cars";
		$this->template->content = View::forge('car/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('car');

		$data['car'] = Model_Car::find_by_pk($id);

		$this->template->title = "Car";
		$this->template->content = View::forge('car/view', $data);

	}
    public function action_check()
    {

        if(Input::method()=='POST'){

            $license =  Str::upper(Input::post('numberplate'));
       //  $license = 	"MH12DE1433" ;

            $cars = Model_Car::find_one_by('vehicle_reg_no' , $license);

            if($cars === null){
                $res = array('status' => 'license number  does not exist in system');
                echo json_encode($res);
            }
            else if ($cars->penalty_count > 0){
                $res = array('status' => 'pay','penalty'=>$cars->penalty_count ,'phone'=>$cars->phone_no);
                echo json_encode($res);

            }
            else{
                $res = array('status' => 'proceed');
                echo json_encode($res);
            }


      }
        return new Response(View::forge('car/test', null));
    }
    public function action_pay()
    {
            $regnum = Input::post('vehicle_reg_no');

            if(Input::method() == 'POST')
            {
                if($regnum == ""){
                    Session::set_flash('error','Fill the required field');
                }

                $cars = Model_Car::find_one_by('vehicle_reg_no', $regnum);
               // Debug::dump($cars->penalty_count    );die;
                if($cars === null){
                    Session::set_flash('error','License not found');
                }
                else if($cars->penalty_count == "0"){
                    Session::set_flash('error','the selected account does not have penalties');
                }
                else {

                    $cars->penalty_count = 0;
                    $cars->save();
                    Response::redirect('car/');
                }
            }

        $this->template->title = "Clear Penalties";
        $this->template->content = View::forge('car/pay');
    }

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Car::validate('create');
			$check = Model_Car::find_one_by('vehicle_reg_no',Input::post('vehicle_reg_no'));


			if ($val->run())
			{
			    if($check != null)
			    {
                    Session::set_flash('error','licence number exist in system');
                }
			    else
                    {
                        $car = Model_Car::forge(array(
                            'owner_name' => Input::post('owner_name'),
                            'phone_no' => Input::post('phone_no'),
                            'id_number' => Input::post('id_number'),
                            'vehicle_reg_no' => Input::post('vehicle_reg_no'),

                        ));

                        if ($car and $car->save()) {
                            Session::set_flash('success', 'Added Car Owner   #' . $car->id . '.');
                            Response::redirect('car');
                        } else {
                            Session::set_flash('error', 'Could not save car.');
                        }
                    }
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Cars";
		$this->template->content = View::forge('car/create');

	}
	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('car');

		$car = Model_Car::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Car::validate('edit');

			if ($val->run())
			{
				$car->owner_name = Input::post('owner_name');
				$car->phone_no = Input::post('phone_no');
				$car->id_number = Input::post('id_number');
				$car->vehicle_reg_no = Input::post('vehicle_reg_no');


				if ($car->save())
				{
					Session::set_flash('success', 'Updated car #'.$id);
					Response::redirect('car');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('car', $car, false);
		$this->template->title = "Cars";
		$this->template->content = View::forge('car/edit');

	}

	public function action_delete($id = null)
	{
		if ($car = Model_Car::find_one_by_id($id))
		{
			$car->delete();

			Session::set_flash('success', 'Deleted car #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete car #'.$id);
		}

		Response::redirect('car');

	}

}

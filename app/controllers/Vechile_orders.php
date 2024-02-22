<?php class Vechile_orders extends Controller
{
    private $vechile_ordersmodel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->vechile_ordersmodel = $this->model('M_vechile_ordersmodel');
    }

    public function details()

    {
        $data = [
            'selectedDates' => '',
            'name' => '',
            'location' => '',
            'number' => '',
            'Message' => '',



            'name_err' => '',
            'location_err' => '',
            'number_err' => '',
            'selectedDates_err' => '',


        ];
        $data1 = $this->vechile_ordersmodel->getdata($_GET['V_Id']);
        $data2 = $this->vechile_ordersmodel->getdate($_GET['V_Id']);
        $owner_id = $data1[0]->Owner_Id;

        $data3 = $this->vechile_ordersmodel->getplandata($owner_id);

        $plan_id = $data3[0]->plan_id;
        $registed_date = $data3[0]->Register_date;
       



        $timestamp = strtotime($registed_date);

        // Add the specified number of months to the timestamp







        $data4 = $this->vechile_ordersmodel->getplandmonth($plan_id);

        $month = $data4[0]->duration;
        $data['month'] = $month;
        $new_date = date('Y-m-d', strtotime("+$month months", $timestamp));
        $data['lastday'] = $new_date;

        $data = array_merge($data1, $data2, $data);
        $this->view('renter/v_vechiledetail', $data);
    }


    public function orders()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'selectedDates' => isset($_POST['selectedDates']) ? trim($_POST['selectedDates']) : '',

                'name' => isset($_POST['name']) ? trim($_POST['name']) : '',
                'location' =>  isset($_POST['location']) ? trim($_POST['location']) : '',
                'number' => isset($_POST['number']) ? trim($_POST['number']) : '',
                'Message' => isset($_POST['Message']) ? trim($_POST['Message']) : '',
                'name_err' => '',
                'location_err' => '',
                'number_err' => '',
                'selectedDates_err' => '',
            ];
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter the name';
            }
            if (empty($data['location'])) {
                $data['location_err'] = 'Please enter the Location';
            }
            if (empty($data['number'])) {
                $data['number_err'] = 'Please enter the number';
            }
            if (empty($data['selectedDates'])) {
                $data['selectedDates_err'] = 'Please enter the date';
            }
            if (empty($data['name_err']) && empty($data['location_err']) && empty($data['number_err']) && empty($data['selectedDates_err'])) {
        
                $data1 = $this->vechile_ordersmodel->getdata($_POST['V_Id']);
         
                foreach ($data1 as $object) {
                    $data2 = (array) $object;
                }

                $data = array_merge($data2, $data);
               
                print_r($data);
                
                if ($this->vechile_ordersmodel->update_data($data)) {
                    


                $data = array_merge($data2, $data);
                $data = array_merge($data1, $data);
             
                ($this->view('renter/v_afterBooking', $data));
                }
            } else {

                $data1 = $this->vechile_ordersmodel->getdata($_POST['V_Id']);

                $data2 = $this->vechile_ordersmodel->getdate($_POST['V_Id']);

                $owner_id = $data1[0]->Owner_Id;
                print_r($data2);

                $data3 = $this->vechile_ordersmodel->getplandata($owner_id);

                $plan_id = $data3[0]->plan_id;
                $registed_date = $data3[0]->Register_date;
                



                $timestamp = strtotime($registed_date);

   



                $data4 = $this->vechile_ordersmodel->getplandmonth($plan_id);

                $month = $data4[0]->duration;
                $data['month'] = $month;
                $new_date = date('Y-m-d', strtotime("+$month months", $timestamp));
                $data['lastday'] = $new_date;


$bookingDates = $this->vechile_ordersmodel->get_booking_date($_POST['V_Id']);


                $data = array_merge($data2, $data);
                $data = array_merge($data1, $data);
                $data = array_merge($bookingDates, $data);
                // print_r($data);
                ($this->view('renter/v_afterBooking', $data));
            }



        }
    }
}
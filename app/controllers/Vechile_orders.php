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
        $data1=$this->vechile_ordersmodel->getdata(91);
        $data2=$this->vechile_ordersmodel->getdatE(91);
       
        $data = array_merge($data1, $data2,$data);
        // $data = $this->sellerModel->get_data($data['seller_ID']);
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
                // print_r($data);
                $data1=$this->vechile_ordersmodel->getdata(91);
                foreach ($data1 as $object) {
                    $data2 = (array) $object;
                }
                
                $data = array_merge($data2,$data);
                if($this->vechile_ordersmodel->update_data($data)){

                }
            } else {

                $data1=$this->vechile_ordersmodel->getdata(91);
                $data2=$this->vechile_ordersmodel->getdatE(91);
               
                $data = array_merge($data1, $data2,$data);
                ($this->view('renter/v_vechiledetail', $data));
            }

            // if ($this->vechile_ordersmodel->update_data($data)){
            //     // $data1=$this->vechile_ordersmodel->update_data($data['seller_ID']);
            // }



        }
    }
}

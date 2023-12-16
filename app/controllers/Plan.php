<?php class Plan extends Controller{
    private $planModel;
    // private static $this;
    public function __construct()
    {
        // self::$this = $this;
        $this->planModel = $this->model('M_plan');
        
    }


    public function get_plan_details(){
        // print_r("d");
        
        $data = $this->planModel->get_dataplan(('59'));
        $data  = get_object_vars($data[0]);
        $originalDate = $data['Date'];

// Create a DateTime object from the original date
        $dateTime = new DateTime($originalDate);

// Add 180 days to the date
        $dateTime->add(new DateInterval('P180D'));

// Get the new date
        $newDate = $dateTime->format('Y-m-d');

// Update the array with the new date
        $data['Date'] = $newDate;
        $this->view('seller/v_plan', $data);
    }
}
<?php

class Calendar extends Controller
{
    private $calendarModel;
    private $v_postModel;

    public function __construct()
    {
        $this->calendarModel = $this->model('M_calendar');
        $this->v_postModel = $this->model('M_vPost');

    }

    public function add_anavailble_Dates()
    {


        // print_r("sssssssss");

        $data = [
        'title' => isset($_POST['title']) ? $_POST['title'] : "",
        'start' => isset($_POST['start']) ? $_POST['start'] : "", 
        'end' => isset($_POST['end']) ? $_POST['end'] : "", 
        
        ];

        //  print_r($data['title']);
        // $this->calendarModel->add_anavailble_Dates($data);
        $this->v_postModel->create_post($data);
        
        }



        public function edit_anavailble_Dates()
        {


            

            $data = [
                'id' => $_POST['id'],
                'title' => $_POST['title'],
                'start' => $_POST['start'], 
                'end' => $_POST['end'], 
            
            ];

            $this->calendarModel->edit_anavailble_Dates($data);
        }





        public function delete_anavailble_Dates()
        {
            // print_r("123");
            
            $data = [
                'id' => $_POST['id'],
       
            ];
            // print_r($data);
            $this->calendarModel->delete_anavailble_Dates($data);
        }


        public function fetch_anavailble_Dates()
        {

            $data = [
                'id' => $_POST['id'],
       
            ];

            $json = array();

            $result = $this->calendarModel->fetch_anavailble_Dates($data);
            

         
            $eventArray = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($eventArray, $row);
            }
            mysqli_free_result($result);

            echo json_encode($eventArray);
        }


}



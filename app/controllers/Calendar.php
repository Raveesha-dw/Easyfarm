<?php

class Calendar extends Controller
{
    private $calendarModel;

    public function __construct()
    {
        $this->calendarModel = $this->model('M_calendar');

    }

    public function add_anavailble_Dates()
    {


        

        $data = [
        'title' => isset($_POST['title']) ? $_POST['title'] : "",
        'start' => isset($_POST['start']) ? $_POST['start'] : "", 
        'end' => isset($_POST['end']) ? $_POST['end'] : "", 
        
        ];

        $this->calendarModel->add_anavailble_Dates($data);
        }

    }

}

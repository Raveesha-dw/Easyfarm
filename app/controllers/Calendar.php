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



        $sqlInsert = "INSERT INTO tbl_events (title,start,end) VALUES ('" . $title . "','" . $start . "','" . $end . "')";

        $result = mysqli_query($conn, $sqlInsert);

        if (!$result) {
            $result = mysqli_error($conn);
        }

    }

}

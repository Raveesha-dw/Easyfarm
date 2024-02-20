<?php 

class Information extends Controller{



    public function __construct()
    {
        
        
    }

    public function Information(){
        $data = [
            'title' => 'Information'
        ];
     
        $this->view('Information/v_Inf_default', $data);
    }


}





?>
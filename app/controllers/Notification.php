<?php class Notification extends Controller{
        private $notificationModel;

        public function __construct(){
                $this->notificationModel=$this->model('M_notification');
        }

        public function get_notification(){
                print_r("dd");
                $data = $this->notificationModel->get_notification();
        }
}


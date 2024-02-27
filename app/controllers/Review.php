<?php
 class Review extends Controller{
    private $itemModel;
    private $orderModel;
    private $reviewModel;
    public function __construct(){
        $this->itemModel=$this->model('M_item');
        $this->orderModel=$this->model('M_orders');
        $this->reviewModel=$this->model('M_review');
    }

    // public function sendItem($itemName){
       
    //     $itemid = $this->itemModel->getItemByName($itemName);
    //     // $item_ID = $itemDetails->$Item_Id;
    //     // echo $item_ID;
    //     // echo($itemDetails);
    //     $data = [
    //         'item_id' => $itemid,
    //         'item_name' => $itemName
    //     ];

    //     $this->view('Buyer/v_buyerItemReview',$data);
    // }

    public function itemReview($item_ID){

        $item = $this->itemModel->getItemDetails($item_ID);
        // print_r($item);

        $data = [
            'item_id' => $item->Item_Id,
             'item_name' => $item->Item_name
        ];

        $this->view('Buyer/v_buyerItemReview',$data);
    }

    public function postReview(){
        
        $data = [
            // 'review_ID' => $_POST['review_ID'],
            'review' => $_POST['review'],
            'rating' => $_POST['rating'],
            'item_ID' => $_POST['item_ID'],
            // 'item_name' => $_POST['item_name'],
            'user_ID' => $_POST['user_ID'],
            'date' => $_POST['review_date'],
            'time' => $_POST['review_time']
        ];

        if($this->orderModel->postReview($data)){
            // $this->view('Buyer/v_dashboardCart');
            header("Location:http://localhost/Easyfarm/Orders/pendingOrdersOfUser");
        }

    }

    public function userReviews(){
        $reviews = $this->reviewModel->getReviews();

        $data = [
            'allreviews' => $reviews
        ];

        $this->view('Buyer/v_dashboardReviews',$data);
    }

    public function updateUserReview($review_ID, $item_ID){
      

        $editReview = $this->reviewModel->getSingleReview($review_ID);
        // print_r($editReview);

        $data = [
            'editReview' => $editReview
        ];

         $this->view('Buyer/v_buyerItemReviewUpdate',$data);

    }

    public function editReview(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $data = [
            'review_ID' => $_POST['review_ID'],
            'review' => $_POST['review'],
            'rating' => $_POST['rating'],
            'item_ID' => $_POST['item_ID'],
            'item_name' => $_POST['item_name'],
            'user_ID' => $_POST['user_ID'],
            'date' => $_POST['review_date'],
            'time' => $_POST['review_time']
            ];
    
        if($this->reviewModel->updateReview($data)){
            // $this->view('Buyer/v_dashboardCart');
            header("Location:http://localhost/Easyfarm/Review/userReviews");
        }
        }
    }

    // public function index(){
        
    // }

    public function deleteReview(){

        // $blah = $_GET['reviewId'];
        // print_r($blah);
        // print_r($review_ID);
        // if($this->reviewModel->deleteReview($_GET)){
        //     header("Location:http://localhost/Easyfarm/Review/userReviews");
        // }
        
        if(isset($_GET['reviewId'])){
            $review_ID = $_GET['reviewId'];
                if($this->reviewModel->deleteReview($review_ID)){
                    header("Location:http://localhost/Easyfarm/Review/userReviews");
                }
        }
        else {
        echo "Review ID not provided.";
        }
    }
}

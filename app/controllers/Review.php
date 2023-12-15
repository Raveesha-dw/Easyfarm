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

    public function sendItem($itemName){
       
        $itemid = $this->itemModel->getItemByName($itemName);
        // $item_ID = $itemDetails->$Item_Id;
        // echo $item_ID;
        // echo($itemDetails);
        $data = [
            'item_id' => $itemid,
            'item_name' => $itemName
        ];

        $this->view('Buyer/v_buyerItemReview',$data);
    }

    public function postReview(){
        // $user_ID = $_POST['user_ID'];
        // $rating = $_POST['rating'];
        // $review = $_POST['review'];
        // $date = $_POST['review_date'];
        // $time = $_POST['review_time'];
        
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
            header("Location:http://localhost/Easyfarm/Orders/placedOrders");
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
        // echo $review_ID;
        // echo $item_ID;
        // $this->view('Buyer/v_buyerItemReview',$data);

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

    public function deleteReview($review_ID){
        // if($_SERVER['REQUEST_METHOD']=='GET'){
        //     if (isset($_GET['review_ID'])) {
        //     if (isset($_GET['confirm_delete']) && $_GET['confirm_delete'] === 'true') {
                // if($this->reviewModel->deleteReview($review_ID)){
                //     header("Location:http://localhost/Easyfarm/Review/userReviews");
                // }
                if($this->reviewModel->deleteReview($review_ID)){
                    header("Location:http://localhost/Easyfarm/Review/userReviews");
                }
                
            }
        }
//         }
//     }
// }
<?php
 class Product extends Controller{
    private $productModel;
    private $reviewModel;
    private $inquiryModel;
    
    public function __construct(){
        $this->productModel=$this->model('M_Product');
        $this->reviewModel=$this->model('M_Review');
        $this->inquiryModel=$this->model('M_inquiry');
    }

    public function productVeg(){
        $allveg = $this->productModel->getAllVegetables();

        $data = [
            'allProduct' => $allveg
        ];
        $this->view('Buyer/v_viewProducts', $data);
    }

    public function productFruit(){
        $allfruit = $this->productModel->getAllFruits();

        $data = [
            'allProduct' => $allfruit
        ];
        $this->view('Buyer/v_viewProducts', $data);
    }

    public function productGrains(){
        $allgrain = $this->productModel->getAllGrains();

        $data = [
            'allProduct' => $allgrain
        ];
        $this->view('Buyer/v_viewProducts', $data);
    }

    public function productPlantsSeeds(){
        $allplantseed = $this->productModel->getAllPlantsSeeds();

        $data = [
            'allProduct' => $allplantseed
        ];
        $this->view('Buyer/v_viewProducts', $data);
    }



    // public function productSeeds(){
    //     $allseed = $this->productModel->getAllSeeds();

    //     $data = [
    //         'allSeeds' => $allseed
    //     ];
    //     $this->view('Buyer/v_viewProduct', $data);
    // }

    public function productFertilizer(){
        $allfert = $this->productModel->getAllFertilizer();

        $data = [
            'allProduct' => $allfert
        ];
        $this->view('Buyer/v_viewProducts', $data);
    }

    public function productInsecticides(){
        $allinsec = $this->productModel->getAllInsecticides();

        $data = [
            'allProduct' => $allinsec
        ];
        $this->view('Buyer/v_viewProducts', $data);
    }

    public function productPage($itemID){
        // echo $itemID;

        $productInfo = $this->productModel->getProductInfo($itemID);
        $seller_ID = $productInfo->seller_ID;
        $sellerInfo = $this->productModel->getSellerInfo($seller_ID);
        $productReviews = $this->reviewModel->getReviewsForItem($itemID);
        $inquiries = $this->inquiryModel->getQuestions($itemID);

        foreach ($inquiries as $inquiry):
            $user_id = $inquiry->user_id;
            $userType = $this->inquiryModel->getUserType($user_id);
            $userName = $this->inquiryModel->getUserName($user_id, $userType);
            $inquiry->userName = $userName;

            // $inquiry->answer = $this->inquiryModel->getAnswer($inquiry->question_id);
        endforeach;

        $data = [
            'productInfo' => $productInfo,
            'sellerInfo' => $sellerInfo,
            'itemReviews' => $productReviews,
            'inquiries' => $inquiries
        ];
        $this->view('Buyer/v_productDetails', $data);
    }



    
 }
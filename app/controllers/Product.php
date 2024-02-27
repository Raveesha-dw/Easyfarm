<?php
 class Product extends Controller{
    private $productModel;
    private $reviewModel;
    
    public function __construct(){
        $this->productModel=$this->model('M_Product');
        $this->reviewModel=$this->model('M_Review');
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
        $productRating = $this->reviewModel->getRatingsForItem($itemID);
        // print_r($productRating);

        $data = [
            'productInfo' => $productInfo,
            'sellerInfo' => $sellerInfo,
            'itemReviews' => $productReviews,
            'itemRating' => $productRating
        ];
        $this->view('Buyer/v_productDetails', $data);
    }

    public function allProducts(){
        $allProduct = $this->productModel->getAllProducts();
        // echo $allProduct;
        $data = [
            'product_all' => $allProduct
        ];

        $this->view('pages/home',$data);
    }

    public function productSearch(){
        // echo 'dieeee';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $search = trim($_POST['search']);
            if (empty($search)) {
                echo 'Please enter a search term.';
                return;
            }
        }else{
            $search = '';
        }

        $searchResult = $this->productModel->searchForProduct($search);
        
        $data = [
            'search' =>$searchResult
        ];

        $this->view('pages/home', $data);
    }


    
 }
<?php
 class Product extends Controller{
    public function __construct(){
        $this->productModel=$this->model('M_Product');
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
        echo $itemID;

        $productInfo = $this->productModel->getProductInfo($itemID);
        $this->view('Buyer/v_productDetails', $productInfo);
    }
    
 }
<?php
class Item extends Controller{
    private $itemModel;
    private $cartModel;
    public function __construct(){
        $this->itemModel=$this->model('M_item');
        $this->cartModel=$this->model('M_cart');
    }

   public function itemName($item_ID){
        $itemName = $this->itemModel->sendItemIDName($item_ID);

        return $itemName->Item_name;
   }

}

?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT . '/views/inc/components/sidebars/seller_sidebar.php'?>

<?php interface ISellerPackage {
    public function setListingLimit($limit);
    public function getListingLimit();
}

class BasicPackage implements ISellerPackage {
    private $listingLimit = 20;

    public function setListingLimit($limit) {
        $this->listingLimit = $limit;
    }

    public function getListingLimit() {
        return $this->listingLimit;
    }
}

class StandardPackage implements ISellerPackage {
    private $listingLimit = 50;

    public function setListingLimit($limit) {
        $this->listingLimit = $limit;
    }

    public function getListingLimit() {
        return $this->listingLimit;
    }
}

class PremiumPackage implements ISellerPackage {
    private $listingLimit = 100;

    public function setListingLimit($limit) {
        $this->listingLimit = $limit;
    }

    public function getListingLimit() {
        return $this->listingLimit;
    }
}

class Seller {
    private $package;

    public function setPackage(ISellerPackage $package) {
        $this->package = $package;
    }

    public function getPackage() {
        return $this->package;
    }
}

// Example usage
$seller = new Seller();
$seller->setPackage(new BasicPackage());

echo 'Listing Limit: ' . $seller->getPackage()->getListingLimit();?>

<?php require APPROOT . '/views/inc/footer.php'; ?>  
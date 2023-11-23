<?php
class M_review{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    public function getReviews(){
        $this->db->query("SELECT * FROM review WHERE U_ID = '{$_SESSION['user_ID']}'");
        $reviews = $this->db->resultSet();

        return $reviews;
    }

    public function getReviewsForItem($itemID){
        $this->db->query("SELECT * FROM review WHERE item_ID =$itemID");
        $reviews = $this->db->resultSet();

        return $reviews;
    }

    public function getSingleReview($reviewID){
        $this->db->query("SELECT * FROM review WHERE review_ID = $reviewID");
        $singleReview = $this->db->single();

        return $singleReview;
    }

    public function updateReview($data){
    
            $this->db->query('UPDATE review SET Review=:review ,Rating=:rating, posted_date = :date, posted_time = :time WHERE review_ID =:review_ID');
            $this->db->bind(':review_ID', $data['review_ID']);
            $this->db->bind(':rating', $data['rating']);
            $this->db->bind(':review', $data['review']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':time', $data['time']);

            $this->db->execute();
            return true;
    }

    public function deleteReview($reviewID){
        $this->db->query('DELETE FROM review WHERE review_ID = :review_ID');
        $this->db->bind(':review_ID', $reviewID);

        $this->db->execute();
        return true;
    }
    
    }

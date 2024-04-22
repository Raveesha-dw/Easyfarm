<?php
class M_review{
    private $db;

    public function __construct()
    {
        $this->db=new Database();
    }

    public function getReviews(){
      //  $this->db->query("SELECT * FROM review WHERE U_ID = :user_ID");
       
        $this->db->query("SELECT review.*, item.Image FROM review INNER JOIN item on item.Item_Id = review.item_ID WHERE U_ID = :user_ID");
         $this->db->bind(':user_ID', $_SESSION['user_ID']);
        $reviews = $this->db->resultSet();

        return $reviews;
    }

    public function getReviewsForItem($itemID){
        // $this->db->query("SELECT * FROM review WHERE item_ID =$itemID");
        $this->db->query('SELECT review.Rating, review.Review, review.item_name, review.posted_date, reg_buyer.Name FROM review INNER JOIN reg_buyer ON reg_buyer.U_id = review.U_ID WHERE item_ID =:itemID');
        $this->db->bind(':itemID', $itemID);
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

    public function getRatingsForItem($itemID){
        $this->db->query('SELECT Rating FROM review WHERE item_ID =:itemID');
        $this->db->bind(':itemID', $itemID);

        $ratings = $this->db->resultSet();
        print_r($ratings);
        echo 'whyy';
        $ratingCount = [
            '5' => 0,
            '4' => 0,
            '3' => 0,
            '2' => 0,
            '1' => 0
        ];
        $totalRatings = 0;

        foreach($ratings as $rating){
            $value = $rating->Rating;
            if($value >=1 && $value <=5){
                $ratingCount[$value]++;
                $totalRatings++;
            }
        }

        $overall =0;
        if($totalRatings >0){
            $sum =0;
            foreach($ratingCount as $rating => $count){
                $sum += $rating * $count;
            }
            $overall = (float)$sum / $totalRatings;
        }

        return [
            'ratingCount' => $ratingCount,
            'overall' => $overall
        ];
    }
    
    }

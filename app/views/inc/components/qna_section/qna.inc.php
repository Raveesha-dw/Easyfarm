<?php

function setQuestions($conn){
    if (isset($_POST['questionSubmit'])){
        $item_id = $_POST['item_id'];
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $question = $_POST['question'];

        $sql = "INSERT INTO question (item_id, user_id, date, question) 
        VALUES ('$item_id', '$user_id', '$date', '$question')";
        $result = $conn->query($sql);
    }
}

function getQuestions($conn){
    $sql_question = "SELECT * FROM question";
    $result_question = $conn->query($sql_question);

    while($row_question = $result_question->fetch_assoc()){
        $id = $row_question['user_id'];
        $sql_user = "SELECT * FROM user WHERE U_Id='$id'";
        $result_user = $conn->query($sql_user);

        if($row_user = $result_user->fetch_assoc()){
            echo "<div class='question-card'><p>";
            echo "<b>".$row_user['Name']."</b> asks, </br></br>";
            echo nl2br($row_question['question'])."</br></br>";
            echo "<i>(".$row_question['date'].")</i><br>";
            echo "</p>";

            //Get Reply
            $question_id = $row_question['question_id'];
            $sql_reply = "SELECT * FROM reply WHERE question_id='$question_id'";
            $result_reply = $conn->query($sql_reply);
            $row_reply = $result_reply->fetch_assoc();

            if($row_reply){
                echo "<div class='question-card'><p>";
                echo "<b>".$row_reply['seller_name']."</b> replies, </br></br>";
                echo $row_reply['reply']."<br><br>";
                echo "<i>(".$row_reply['date'].")</i>";
                echo "</p></div>";
            }
            

            if(isset($_SESSION['id'])){
                if($_SESSION['id'] == $row_user['U_Id']){
                    echo "
                        <form class='edit-form' method='POST' action='editquestion'>
                            <input type='hidden' name='question_id' value='".$row_question['question_id']."'>
                            <input type='hidden' name='user_id' value='".$row_question['user_id']."'>
                            <input type='hidden' name='date' value='".$row_question['date']."'>
                            <input type='hidden' name='question' value='".$row_question['question']."'>
                            <input type='submit'  value='Edit' name='questionEdit'>
                            <!--<button>Edit</button>-->
                        </form>";
                    echo "
                        <form class='delete-form' method='POST' onclick='confirmDelete()' action='".deleteQuestions($conn)."'>
                            <input type='hidden' name='question_id' value='".$row_question['question_id']."'>
                            <input type='submit'  value='Delete' name='questionDelete'>
                        </form>";
                }
            }else{
                //echo "<p>You need to be logged in to reply!</p>";
            }
            echo "</div>";
        }
        
    }
}

function editQuestions($conn){
    if (isset($_POST['questionSubmit'])){
        $question_id = $_POST['question_id'];
        $user_id = $_POST['user_id'];
        $date = $_POST['date'];
        $question = $_POST['question'];

        $sql = "UPDATE question SET question='$question' WHERE question_id='$question_id'";
        $result = $conn->query($sql);
        header("Location: qna");
    }
}

function deleteQuestions($conn){
    if (isset($_POST['questionDelete'])){
        $question_id = $_POST['question_id'];

        $sql = "DELETE FROM question WHERE question_id='$question_id'";
        $result = $conn->query($sql);
        //header("Location: qna");
    }
}
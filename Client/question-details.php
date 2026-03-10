<div class="container">
    <h1 class=heading>Question</h1>
 <div class="row">
    
     <div class="col-8">
        
        
          <?php
                include("./common/db.php");
                $query="select * from questions where id=$qid";
                $result=$conn->query($query);
                $row=$result->fetch_assoc();
                $cid=$row['category_id'];
                echo "<h4 class='margin-bottom-15 question-tittle'>Question: ".$row['tittle']."</h4>";
                echo "<p class='margin-bottom-15'>".$row['description']."</p>";
                include("./client/answer.php");

                
                ?>
                <form action='./server/requests.php' method = 'POST'>
                    <input type="hidden" name="question_id" value="<?php  echo $qid?>">
                <textarea class="form-control margin-bottom-15" name="answer" placeholder="Your Answer...."></textarea>
                <button class="btn btn-primary margin-bottom-15 " type ='submit'>Write Answer</button>
            </form>

     </div>
     <div class="col-4">
        
            <?php

          $categoryQuery="select name from category where id=$cid";
          $categoryResult=$conn->query($categoryQuery);
          $categoryRow=$categoryResult->fetch_assoc();
         echo"<h1>".ucfirst($categoryRow['name'])."</h1>";

    $query="select * from questions where category_id=$cid and id!=$qid";
    $result=$conn->query($query);
    foreach($result as $row){
         $tittle=ucfirst($row['tittle']);
         $id =$row['id'];
        echo "<div class=' row questions-list'>
        <h4><a href='?q-id=$id'>$tittle</a></h4></div>";
    }
    ?>
</div>


    
</div>
</div>

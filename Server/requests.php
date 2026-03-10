<?php
include("../common/db.php");
  session_start();
if (isset($_POST['signup'])) {
    $username =$_POST['username'];
    $email= $_POST['email'];
    $adress=$_POST['adress'];
    $password=$_POST['password'];

    $user=$conn->prepare("Insert into users
    (id,username,email,adress,password)
    values(NULL,'$username','$email','$adress','$password')");

    $result=$user->execute();
    $user->insert_id;
    if($result){
    
        $_SESSION["user"]=["username"=>$username,"email"=>$email,"user_id"=>$user->insert_id];
        header("location:/discuss");
    }
    else{
    
        echo "User is not registered";
    }

}
else if (isset($_POST['login'])) {
    $email =$_POST['email'];
    $password =$_POST['password'];
    $username="";
    $user_id=0;
    
     $query="select *from users where email= '$email' and password ='$password'";
     $result = $conn->query($query);

     if($result->num_rows==1){
        foreach($result as $row){

            $username =$row['username'];
            $user_id=$row['id'];
            $email=$row['email'];
        }
        
        $_SESSION["user"]=["username"=>$username,"email"=>$email,"user_id"=>$user_id];
        header("location:/discuss");
     }
     else{
         echo "User is not registered";
     }


}else if(isset($_GET['logout'])){
    session_unset();
    header("location:/discuss");

}else if(isset($_POST["ask"])){

       
    
    $tittle =$_POST['tittle'];
    $description= $_POST['description'];
    $category_id=$_POST['category'];
    $user_id=$_SESSION['user']['user_id'];

    $question=$conn->prepare("INSERT INTO questions
    (id,tittle,description ,category_id ,user_id)
    values(NULL,'$tittle','$description','$category_id','$user_id')");

    $result=$question->execute();
    if($result){
    
        
        header("location:/discuss");
    }
    else{
    
        echo "User is not registered";
    }
}
else if (isset($_POST['answer'])){
     $answer =$_POST['answer'];
    $question_id= $_POST['question_id'];
    $user_id=$_SESSION['user']['user_id'];

    $query=$conn->prepare("INSERT INTO answers
    (id,answer,question_id,user_id)
    values(NULL,'$answer','$question_id','$user_id')");

    $result=$query->execute();
    if($result){
    
        
        header("location:/discuss?q-id=$question_id");
    }
    else{
    
        echo "answer is not added to the website";
    }
}

    else if(isset($_GET['delete'])){
        $qid=$_GET["delete"];
        $query =$conn->prepare("delete from questions where id=$qid");
      $result=$query->execute();
        if($result){
            header("location: /discuss");
        }
        else{
           echo "Question  Not Deleted" ;
        }
    
    }




?>
<div class="container">
    
    
<div class='row'>
    <div class="col-8">
        <h1 class="heading">Question</h1>
<?php
include("./common/db.php");

if(isset($_GET['c-id'])){
    
     $query="select * from questions where category_id =$cid";
}
else if(isset($_GET['u-id'])){
    
     $query="select * from questions where user_id =$uid";
}
else if(isset($_GET["Latest"])){
    
     $query="select * from questions order by id desc";
}
else if(isset($_GET["search"])){
    
     $query="select * from questions where `tittle` like '%$search%'";
}
else{
    $query="select * from questions";
}
$result =$conn->query($query);
foreach($result as $row){
    $tittle = $row['tittle'];
    $id =$row['id'];
    echo "<div class='questions-list'>
    <h4 class='my-questions'><a href='?q-id=$id'>$tittle</a>";
   

if(isset($_GET['u-id']) && $_SESSION['user']['user_id'] == $row['user_id']){
    echo "<a href='./server/requests.php?delete=$id'>Delete</a>";
}
    echo "</h4></div>";
}

?>
</div>
<div class="col-4">
<?php
include('categorylist.php');

?>
</div>
</div>
</div>



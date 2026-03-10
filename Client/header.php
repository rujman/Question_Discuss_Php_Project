<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="./">
        <img src="./public/logo.png" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active"  href="./">Home</a>
        </li>
        <?php 
        if(!empty($_SESSION['user']['username'])){?>
 <li class="nav-item">
          <a class="nav-link" href="?logout=true">Logout(<?php echo ucfirst($_SESSION['user']['username']) ?>)</a>
        </li>
 <li class="nav-item">
          <a class="nav-link" href="?ask=true">Ask Question</a>
        </li>
  <li class="nav-item">
          <a class="nav-link" href="?u-id=<?php echo $_SESSION['user']['user_id']?>">My Question</a>
        </li>
        
        <?php } ?>
        <?php
        if(empty($_SESSION['user']['username'])){?>
<li class="nav-item">
          <a class="nav-link" href="?login=true">Login</a>
        </li>
<li class="nav-item">
          <a class="nav-link" href="?signup=true">Signup</a>
        </li>
        
        <?php } ?>
         <?php

        if (isset($_GET['logout'])) {
            session_unset();    // remove all session variables
            session_destroy();  // destroy session
            header("Location: ./"); // redirect to home page
            exit();
        }
        ?>
       
       
        
        <li class="nav-item">
          <a class="nav-link" href="?Latest=true">Latest Questions</a>
        </li>
      </ul>
       
    </div>
    <form class="d-flex" action="">
        <input class="form-control me-2" type="search" name="search" placeholder="Search Question">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</nav>


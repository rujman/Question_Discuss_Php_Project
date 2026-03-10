<div class="container">
   <h1 class="heading">Signup </h1>
    <form method="post" action="./server/requests.php">
        
        <div class="col-6 offset-sm-3 .margin-bottom-15">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="enter username">
        
        </div>
        <div class="col-6 offset-sm-3 .margin-bottom-15">
            <label for="email" class="form-label"> User Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter user Email">
        
        </div>
        <div class="col-6 offset-sm-3 .margin-bottom-15">
            <label for="adress" class="form-label">User Adress</label>
            <input type="text" name="adress" class="form-control" id="adress" placeholder="Enter user adress">
        
        </div>
        
        <div class="col-6 offset-sm-3 .margin-bottom-15">
            <label for="password" class="form-label">password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Your password">
        
        </div>
        <div class="col-6 offset-sm-3">
        <button type="Submit" name ="signup" class="btn btn-primary">signup</button>
        </div>
</form>
</div>
<?php
  include 'header.php';
  $user_id = $_GET['user_id'];
  $user = $function->GetUserInfo($user_id);
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Update User</h5>
      <a class="btn btn-primary" href="users.php">Back</a><br><br>
      <?php
         if($user)
           { 
            $user_id = $user->id;
            $user_name = $user->name;
            $user_position = $user->position;
            $user_date = $user->date;
        ?>
      <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body">
            <?php
                  $msg = Session::get("msg");
                  if(isset($msg)){
                    echo $msg;
                    Session::set("msg", NULL);
                  }
              ?> 
            <form method="post" action="navigate.php?user_id=<?=$user_id;?>">
              <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" value="<?=($user_name)?$user_name:'';?>" required><br>
              </div>

              <div class="form-group">
                <label>Position:</label>
                <input type="text" class="form-control" name="position" value="<?=($user_position)?$user_position:'';?>" required><br>
              </div>

              <div class="form-group">
                <label>Date:</label>
                <input type="date" class="form-control" name="date" value="<?=($user_date)?$user_date:'';?>" required><br>
              </div>

              <button class="btn btn-primary" type="submit" style="float: right;" name="btn-edit-user">Submit</button>

            </form>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
</div>

<?php 
  include 'footer.php';
?>
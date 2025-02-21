<?php
  include 'header.php';
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Add User</h5>
      <a class="btn btn-primary" href="users.php">Back</a><br><br>
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
            <form method="post" action="navigate.php">
              <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name" required><br>
              </div>

              <div class="form-group">
                <label>Position:</label>
                <input type="text" class="form-control" name="position" required><br>
              </div>

              <div class="form-group">
                <label>Date:</label>
                <input type="date" class="form-control" name="date" required><br>
              </div>

              <button class="btn btn-primary" type="submit" style="float: right;" name="btn-add-user">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include 'footer.php';
?>
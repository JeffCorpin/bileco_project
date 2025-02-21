<?php
  include 'header.php';
?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Users</h5>
      <a class="btn btn-primary" href="Add-user.php">Add</a><br><br>
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
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark">
                  <tr>
                    <th>
                      <h6>Id</h6>
                    </th>
                    <th>
                      <h6>FullName</h6>
                    </th>
                    <th>
                      <h6>Position</h6>
                    </th>
                    <th>
                      <h6>Date</h6>
                    </th>                   
                    <th>
                      <h6>Action</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>

                  <?php                         
                          $i = 0;
                          $users = $function->GetAllUsers();
                          if ($users) {
                            foreach ($users as $user):
                              $user_id = $user['id'];
                              $user_name = $user['name'];
                              $user_position = $user['position']; 
                              $user_date = $user['date'];
                              $i++;
                            ?>
                          <tr>
                            <td><label><?=$i;?></label></td>                            
                            <td><label><?=$user_name;?></label></td>
                            <td><label><?=$user_position;?></label><td>
                            <td><label><?=$user_date;?></label></td>
                            <td>
                              <form method="post" action="navigate.php">
                                <a class="btn btn-primary" href="Edit-user.php?user_id=<?=$user_id;?>">Edit</a> &nbsp;
                                <input type="hidden" name="id" value="<?=$user_id;?>">
                                <button class="btn btn-danger" type="submit" name="btn-delete-user">Delete</button></td> 
                              </form>                       
                          </tr>



                      <?php

                            endforeach;
                          }

                        ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
  include 'footer.php';
?>
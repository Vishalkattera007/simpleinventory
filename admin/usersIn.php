<?php
    include 'header.php';
    include 'side_nav.php';
?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title"> User Management</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <form action="inserts.php" method="POST">
                     <div class="form-row">
                        <div class="col-md-4 mb-3">
                           <label for="username">Username</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text">@</span>
                              </div>
                              <input type="hidden" name="user_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

                              <input type="text" class="form-control" name="username" value="<?php echo isset($_GET['id']) ? getUserData($con, $_GET['id'], 'username') : ''?>" required>
                           </div>
                        </div>

                        <div class="col-md-4 mb-3">
                           <label for="employee_id">Employee ID</label>
                           <input type="number" class="form-control" name="employee_id" value="<?php echo isset($_GET['id']) ? getUserData($con, $_GET['id'], 'employeeId') : ''?>" required>
                        </div>

                        <div class="col-md-4 mb-3">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" name="password" value="<?php echo isset($_GET['id']) ? getUserData($con, $_GET['id'], 'employeeId') : ''?>" <?php echo isset($_GET['id']) ? '' : 'required'?>>
                        </div>

                        <div class="col-md-4 mb-3">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" name="email" value="<?php echo isset($_GET['id']) ? getUserData($con, $_GET['id'], 'email') : ''?>" required>
                        </div>

                        <div class="col-md-4 mb-3">
                           <label for="phone">Mobile Number</label>
                           <input type="tel" class="form-control" name="phone" value="<?php echo isset($_GET['id']) ? getUserData($con, $_GET['id'], 'mobile') : ''?>" required>
                        </div>

                        <div class="col-md-4 mb-3">
                           <label for="role">Select Role</label>
                           <select class="form-control" name="role">
                              <option selected disabled>--Select the role--</option>
                              <?php roles($con, isset($_GET['id']) ? getUserData($con, $_GET['id'], 'roleId') : '');  ?>
                           </select>
                        </div>
                     </div>

                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Unit Selection</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <?php checkboxes($con,111, isset($_GET['id']) ? $_GET['id'] : 0); ?>
                        </div>
                     </div>

                     <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['id']) ? 'update_user' : 'add_user'?>">
                           <?php echo isset($_GET['id']) ? 'Update User' : 'Add User'?>
                        </button>
                     </div>
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
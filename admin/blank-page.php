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
                  <form>
                     <div class="form-row">
                        <div class="col-md-4 mb-3">
                           <label for="validationDefaultUsername">Username</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="inputGroupPrepend2">@</span>
                              </div>
                              <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                           </div>
                        </div>
                        <div class="col-md-4 mb-3">
                           <label for="exampleInputNumber1">Employee Id</label>
                           <input type="number" class="form-control" id="exampleInputNumber1" value="2356" required>
                        </div>
                        <div class="col-md-4 mb-3">
                           <label for="validationDefault02">Password</label>
                           <input type="password" class="form-control" id="validationDefault02" required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="exampleInputEmail3">Email Input</label>
                           <input type="email" class="form-control" id="exampleInputEmail3" value="markjhon@gmail.com" placeholder="Enter Email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="exampleInputphone">Mobile Number</label>
                           <input type="tel" class="form-control" id="exampleInputphone" value="1-(555)-555-5555" required>
                        </div>

                     </div>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Unit Selection</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="customCheck-22">
                              <label class="custom-control-label" for="customCheck-22">U1</label>
                           </div>
                           <div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="customCheck-23">
                              <label class="custom-control-label" for="customCheck-23">U1</label>
                           </div>
                           <div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="customCheck-24">
                              <label class="custom-control-label" for="customCheck-24">U1</label>
                           </div>
                           <div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="customCheck-25">
                              <label class="custom-control-label" for="customCheck-25">U1</label>
                           </div>
                           <div class="custom-control custom-checkbox custom-checkbox-color custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="customCheck-26">
                              <label class="custom-control-label" for="customCheck-26">U1</label>
                           </div>
                           
                        </div>
                     </div>
                     <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit form</button>
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
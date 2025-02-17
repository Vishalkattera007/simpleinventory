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
                     <h4 class="card-title"> Products Management</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <form>
                     <div class="form-row">
                        <div class="col-md-4 mb-3">
                           <label for="validationDefaultpcode">Product Code</label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="validationDefaultpcode" aria-describedby="inputGroupPrepend2" required>
                           </div>
                        </div>
                        <div class="col-md-4 mb-3">
                           <label for="validationDefaultmcode">Material Code</label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="validationDefaultmcode" aria-describedby="inputGroupPrepend2" required>
                           </div>
                        </div>
                        <div class="col-md-4 mb-3">
                           <label for="validationDefaultmatname">Name of Material Code</label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="validationDefaultmatname" aria-describedby="inputGroupPrepend2" required>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Blocks Selection</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <?php blockscheckboxes($con)?>

                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Stages Selection</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <?php stagescheckboxes($con)?>


                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Units Selection</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <?php checkboxes($con)?>

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
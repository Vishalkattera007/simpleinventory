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
                  <form action="inserts.php" method="POSt">
                     <div class="form-row">
                        <div class="col-md-4 mb-3">
                           <label for="validationDefaultpcode">Product Code</label>
                           <div class="input-group">
                              <input type="hidden" name="product_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                              <input type="text" class="form-control" id="validationDefaultpcode" aria-describedby="inputGroupPrepend2" value="<?php echo isset($_GET['id']) ? productData($con, $_GET['id'], 'productCode') : ''?>" name="product_code" required>
                           </div>
                        </div>
                        <div class="col-md-4 mb-3">
                           <label for="validationDefaultmcode">Material Code</label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="validationDefaultmcode" aria-describedby="inputGroupPrepend2" value="<?php echo isset($_GET['id']) ? productData($con, $_GET['id'], 'materialCode') : ''?>" name="material_code" required>
                           </div>
                        </div>
                        <div class="col-md-4 mb-3">
                           <label for="validationDefaultmatname">Name of Material Code</label>
                           <div class="input-group">
                              <input type="text" class="form-control" id="validationDefaultmatname" aria-describedby="inputGroupPrepend2" value="<?php echo isset($_GET['id']) ? productData($con, $_GET['id'], 'material_Code_name') : ''?>" name="material_name" required>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">UOM Selection</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <?php uomcheckboxes($con, isset($_GET['id']) ? $_GET['id'] : 0); ?>

                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Blocks Selection</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <?php blockscheckboxes($con, isset($_GET['id']) ? $_GET['id'] : 0); ?>

                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Stages Selection</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <?php stagescheckboxes($con, isset($_GET['id']) ? $_GET['id'] : 0); ?>

                        </div>
                     </div>
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Units Selection</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <?php checkboxes($con,001, isset($_GET['id']) ? $_GET['id'] : 0); ?>

                        </div>
                     </div>
                     <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['id']) && ! empty($_GET['id']) ? 'update_product' : 'add_product' ?>">
                           <?php echo isset($_GET['id']) && ! empty($_GET['id']) ? 'Update Product' : 'Add Product' ?>
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
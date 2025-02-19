<?php
include 'header.php';
include 'side_nav.php';
$uom_info = uomsshow($con, $_GET['id'] ?? 0); 
?>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title"> uom Management</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="inserts.php" method="POSt">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefaultpcode">uom Name</label>
                                    <input type="hidden" name="uom_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="uom_name" id="validationDefaultpcode" aria-describedby="inputGroupPrepend2" value="<?php echo $uom_info['name']; ?>" required>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="uom_value" id="validationDefaultpcode" aria-describedby="inputGroupPrepend2" value="<?php echo $uom_info['value']; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['id']) && ! empty($_GET['id']) ? 'update_uom' : 'add_uom' ?>">
                                    <?php echo isset($_GET['id']) && ! empty($_GET['id']) ? 'Update uom' : 'Add uom' ?>
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4 class="card-title">List of uoms</h4>

                        </div>

                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">
                            <table
                                id="myTable"
                                class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>uom Name</th>
                                        <th>Vlaue</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    uomsList($con);
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>S.no</th>
                                        <th>uom Name</th>
                                        <th>Vlaue</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
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
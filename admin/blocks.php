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
                            <h4 class="card-title"> Block Management</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="inserts.php" method="POSt">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefaultpcode">block Name</label>
                                    <input type="hidden" name="block_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="block_name" id="validationDefaultpcode" aria-describedby="inputGroupPrepend2" value="<?php echo blocksshow($con, $_GET['id'] ?? 0) ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['id']) && ! empty($_GET['id']) ? 'update_block' : 'add_block' ?>">
                                    <?php echo isset($_GET['id']) && ! empty($_GET['id']) ? 'Update block' : 'Add block' ?>
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4 class="card-title">List of blocks</h4>

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
                                        <th>block Name</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        blocksList($con);
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>S.no</th>
                                        <th>block Name</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
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
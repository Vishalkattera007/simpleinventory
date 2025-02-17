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
                            <h4 class="card-title"> Stage Management</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form action="inserts.php" method="POSt">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationDefaultpcode">stage Name</label>
                                    <input type="hidden" name="stage_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="stage_name" id="validationDefaultpcode" aria-describedby="inputGroupPrepend2" value="<?php echo stagesshow($con, $_GET['id'] ?? 0) ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="<?php echo isset($_GET['id']) && ! empty($_GET['id']) ? 'update_stage' : 'add_stage' ?>">
                                    <?php echo isset($_GET['id']) && ! empty($_GET['id']) ? 'Update stage' : 'Add stage' ?>
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4 class="card-title">List of stages</h4>

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
                                        <th>stage Name</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        stagesList($con);
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>S.no</th>
                                        <th>stage Name</th>
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
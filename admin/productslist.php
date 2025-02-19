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
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4 class="card-title">Products List</h4>

                        </div>
                        <div class="iq-header-title">
                            <a href="productsIn.php"><button type="button" class="btn dark-icon btn-primary mb-3">Add Product</button></a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div id="table" class="table-editable">
                            <table
                                id="myTable"
                                class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>P.Code</th>
                                        <th>M.Code</th>
                                        <th>M.Name</th>
                                        <th>Block Ids</th>
                                        <th>Stage Ids</th>
                                        <th>Unit Ids</th>
                                        <th>UOM Ids</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    productList($con);
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>#</th>
                                        <th>P.Code</th>
                                        <th>M.Code</th>
                                        <th>M.Name</th>
                                        <th>Block Ids</th>
                                        <th>Stage Ids</th>
                                        <th>Unit Ids</th>
                                        <th>UOM Ids</th>
                                        <th>Actions</th>
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
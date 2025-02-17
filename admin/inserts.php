<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    include 'functions.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // All Insert Actions

        //Unit - inserting
        if (isset($_POST['add_unit'])) {
            $unit_name  = $_POST['unit_name'];
            $created_by = 1; // Change dynamically if needed

            $insert_status = unitsInsert($con, $unit_name, $created_by);

            if ($insert_status === true) {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Unit added successfully!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'units.php';
                });
            });
            </script>";
            } else {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '" . addslashes($insert_status) . "'
                }).then(() => {
                    window.location.href = 'units.php';
                });;
            });
            </script>";
            }
        }

        //stage Inserting
        if (isset($_POST['add_stage'])) {
            $stage_name = $_POST['stage_name'];
            $created_by = 1; // Change dynamically if needed

            $insert_status = stagesInsert($con, $stage_name, $created_by);

            if ($insert_status === true) {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'stage added successfully!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'stage.php';
                });
            });
            </script>";
            } else {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '" . addslashes($insert_status) . "'
                }).then(() => {
                    window.location.href = 'stage.php';
                });;
            });
            </script>";
            }
        }

        //blocks
        if (isset($_POST['add_block'])) {
            $block_name = $_POST['block_name'];
            $created_by = 1; // Change dynamically if needed

            $insert_status = blocksInsert($con, $block_name, $created_by);

            if ($insert_status === true) {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'block added successfully!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'blocks.php';
                });
            });
            </script>";
            } else {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '" . addslashes($insert_status) . "'
                }).then(() => {
                    window.location.href = 'blocks.php';
                });;
            });
            </script>";
            }
        }

    // All Upadtes Actions

        //Unit - updating
        if (isset($_POST['update_unit'])) {
            $unit_id    = $_POST['unit_id'];
            $unit_name  = $_POST['unit_name'];
            $updated_by = 1; // Change dynamically if needed

            $update_status = unitsUpdate($con, $unit_id, $unit_name, $updated_by);

            if ($update_status === true) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Unit Updated successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'units.php';
                    });
                });
                </script>";
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: '" . addslashes($insert_status) . "'
                    }).then(() => {
                        window.location.href = 'units.php';
                    });;
                });
                </script>";
            }
        }

        // Stage Updtes
        if (isset($_POST['update_stage'])) {
            $stage_id   = $_POST['stage_id'];
            $stage_name = $_POST['stage_name'];
            $updated_by = 1; // Change dynamically if needed

            $update_status = stagesUpdate($con, $stage_id, $stage_name, $updated_by);

            if ($update_status === true) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'stage Updated successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'stage.php';
                    });
                });
                </script>";
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: '" . addslashes($insert_status) . "'
                    }).then(() => {
                        window.location.href = 'stage.php';
                    });;
                });
                </script>";
            }
        }

        //blocks

        if (isset($_POST['update_block'])) {
            $block_id   = $_POST['block_id'];
            $block_name = $_POST['block_name'];
            $updated_by = 1; // Change dynamically if needed

            $update_status = blocksUpdate($con, $block_id, $block_name, $updated_by);

            if ($update_status === true) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Block Updated successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'blocks.php';
                    });
                });
                </script>";
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: '" . addslashes($insert_status) . "'
                    }).then(() => {
                        window.location.href = 'blocks.php';
                    });;
                });
                </script>";
            }
        }

    // All Delete Actions

        //units deleting
        if (isset($_POST['delete_unit'])) {
            $unit_id      = $_POST['unit_id'];
            $delete_units = unitsDelete($con, $unit_id);
            if ($delete_units === true) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'unit Deleted successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'units.php';
                    });
                });
                </script>";
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: '" . addslashes($insert_status) . "'
                    }).then(() => {
                        window.location.href = 'units.php';
                    });;
                });
                </script>";
            }
        }

        //stages delete
        if (isset($_POST['delete_stage'])) {
            $stage_id      = $_POST['stage_id'];
            $delete_stages = stagesDelete($con, $stage_id);
            if ($delete_stages === true) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'stage Deleted successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'stage.php';
                    });
                });
                </script>";
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: '" . addslashes($insert_status) . "'
                    }).then(() => {
                        window.location.href = 'stage.php';
                    });;
                });
                </script>";
            }
        }

        //blocks
        if (isset($_POST['delete_block'])) {
            $block_id      = $_POST['block_id'];
            $delete_blocks = blocksDelete($con, $block_id);
            if ($delete_blocks === true) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'block Deleted successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'blocks.php';
                    });
                });
                </script>";
            } else {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: '" . addslashes($insert_status) . "'
                    }).then(() => {
                        window.location.href = 'blocks.php';
                    });;
                });
                </script>";
            }
        }

        //Users Data Handling

        if (isset($_POST['add_user'])) {
            $username    = $_POST['username'];
            $employee_id = $_POST['employee_id'];
            $password    = $_POST['password'];
            $email       = $_POST['email'];
            $phone       = $_POST['phone'];
            $role        = $_POST['role'];
            $created_by  = 1;

            $insert_status = userInsert($con, $username, $employee_id, $password, $email, $phone, $role, $created_by);

            if ($insert_status === true) {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'User added successfully!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'usersIn.php';
                });
            });
            </script>";
            } else {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '" . addslashes($insert_status) . "'
                }).then(() => {
                    window.location.href = 'usersIn.php';
                });;
            });
            </script>";
            }
        }
    }

?>

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
            $units       = isset($_POST['units']) ? implode(',', $_POST['units']) : '';
            $created_by  = 1;

            $insert_status = userInsert($con, $username, $employee_id, $password, $email, $phone, $role, $units, $created_by);

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

        if (isset($_POST['update_user'])) {
            $user_id     = $_POST['user_id'];
            $username    = $_POST['username'];
            $employee_id = $_POST['employee_id'];
            $password    = $_POST['password'];
            $email       = $_POST['email'];
            $phone       = $_POST['phone'];
            $role        = $_POST['role'];
            $units       = isset($_POST['units']) ? implode(',', $_POST['units']) : '';
            $updated_by  = 1;

            $insert_status = usersUpdate($con, $username, $employee_id, $password, $email, $phone, $role, $units, $updated_by, $user_id);

            if ($insert_status === true) {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'User Updated successfully!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'userslist.php';
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
                    window.location.href = 'userslist.php';
                });;
            });
            </script>";
            }
        }

        if (isset($_POST['delete_user'])) {
            $user_id     = $_POST['user_id'];
            $delete_user = usersDelete($con, $user_id);
            if ($delete_user === true) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'User Deleted successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'userslist.php';
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
                        window.location.href = 'userslist.php';
                    });;
                });
                </script>";
            }
        }

        //uom
        if (isset($_POST['add_uom'])) {
            $uom_name   = $_POST['uom_name'];
            $uom_value  = $_POST['uom_value'];
            $created_by = 1;

            $insert_status = uomInsert($con, $uom_name, $uom_value, $created_by);

            if ($insert_status === true) {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'User added successfully!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'uom.php';
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
                    window.location.href = 'uom.php';
                });;
            });
            </script>";
            }
        }

        if (isset($_POST['update_uom'])) {
            $uom_id     = $_post['uom_id'];
            $uom_name   = $_POST['uom_name'];
            $uom_value  = $_POST['uom_value'];
            $updated_by = 1;

            $update_status = uomUpdate($con, $uom_id, $uom_name, $updated_by, $value);

            if ($update_status === true) {
                echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'User Updated successfully!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'uom.php';
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
                    window.location.href = 'uom.php';
                });;
            });
            </script>";
            }
        }

        if (isset($_POST['delete_uom'])) {
            $uom_id     = $_POST['uom_id'];
            $delete_uom = uomDelete($con, $uom_id);
            if ($delete_uom === true) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'UOM Deleted successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'uom.php';
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
                        window.location.href = 'uom.php';
                    });;
                });
                </script>";
            }
        }

        if (isset($_POST['add_product'])) {
            $product_code  = mysqli_real_escape_string($con, $_POST['product_code']);
            $material_code = mysqli_real_escape_string($con, $_POST['material_code']);
            $material_name = mysqli_real_escape_string($con, $_POST['material_name']);

            // Handle checkboxes (Convert to comma-separated values)
            $uom_ids    = isset($_POST['uom']) ? implode(',', $_POST['uom']) : '';
            $blocks_ids = isset($_POST['blocks']) ? implode(',', $_POST['blocks']) : '';
            $stages_ids = isset($_POST['stages']) ? implode(',', $_POST['stages']) : '';
            $units_ids  = isset($_POST['units']) ? implode(',', $_POST['units']) : '';

            // echo $units_ids;
            // exit();
            $created_by    = 1;
            $insert_status = productInsert($con, $product_code, $material_code, $material_name, $uom_ids, $blocks_ids, $stages_ids, $units_ids, $created_by);
            if ($insert_status === true) {
                echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Product Added successfully!',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'productslist.php';
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
            window.location.href = 'productslist.php';
        });;
    });
    </script>";
            }
        }

        if (isset($_POST['update_product'])) {
            $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
            $product_code  = mysqli_real_escape_string($con, $_POST['product_code']);
            $material_code = mysqli_real_escape_string($con, $_POST['material_code']);
            $material_name = mysqli_real_escape_string($con, $_POST['material_name']);

            // Handle checkboxes (Convert to comma-separated values)
            $uom_ids    = isset($_POST['uom']) ? implode(',', $_POST['uom']) : '';
            $blocks_ids = isset($_POST['blocks']) ? implode(',', $_POST['blocks']) : '';
            $stages_ids = isset($_POST['stages']) ? implode(',', $_POST['stages']) : '';
            $units_ids  = isset($_POST['units']) ? implode(',', $_POST['units']) : '';

            // echo $units_ids;
            // exit();
            $updated_by    = 1;
            $insert_status = productUpdate($con,$product_id, $product_code, $material_code, $material_name, $uom_ids, $blocks_ids, $stages_ids, $units_ids, $updated_by);
            if ($insert_status === true) {
                echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Product Updated successfully!',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'productslist.php';
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
            window.location.href = 'productslist.php';
        });;
    });
    </script>";
            }
        }

        if (isset($_POST['delete_product'])) {
            $product_id     = $_POST['product_id'];
            $delete_product = productDelete($con, $product_id);
            if ($delete_product === true) {
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'product Deleted successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = 'productlist.php';
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
                        window.location.href = 'productlist.php';
                    });;
                });
                </script>";
            }
        }

    }

?>

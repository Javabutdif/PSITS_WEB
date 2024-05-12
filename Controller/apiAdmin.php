<?php
require '../Backend/BackendAdmin.php';
require '../assets/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSITS | Merchandise</title>
</head>

<body>

    <div class="modal fade" id="addMerch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Merchandise</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="apiAdmin.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="image">Upload Image:</label>
                            <input type="file" id="image" name="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="name">Product Name:</label>
                            <input type="text" id="name" name="name" placeholder="Enter product name"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Product Type:</label>
                            <input type="text" id="type" name="type" placeholder="Enter product type"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Product Price:</label>
                            <input type="number" id="price" name="price" placeholder="Enter product price"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="stocks">Product Stocks:</label>
                            <input type="number" id="stocks" name="stocks" placeholder="Enter product stocks"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submitImage" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>

<?php
//Actions
//Login Admin
loginAdmin();

//Cancel Order
if (isset($_POST['cancelOrder'])) {
    $order_id = $_POST['order_id'];

    if (cancel_order($order_id)) {
        echo '<script>alert("Cancel Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminOrderMerch.php";</script>';
        exit;
    } else {
        echo '<script>alert("Cancel Unsuccessful");</script>';
        echo '<script>window.location.href = "../Admin/AdminOrderMerch.php";</script>';
        exit;
    }


}
if (isset($_POST['editStudent'])) {
    $id_number = $_POST['id_number'];
    edit_student($id_number);
}
//Change password
if (isset($_POST['changePass'])) {
    $newPassword = $_POST['newPassword'];
    $adminId = $_SESSION['adminId'];

    if (change_admin_password($newPassword, $adminId)) {
        echo '<script>alert("Change Password Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminDashboard.php";</script>';
        exit;
    } else {
        echo '<script>alert("Changed Password Unsuccessful");</script>';
        echo '<script>window.location.href = "../Admin/AdminDashboard.php";</script>';
        exit;
    }
}

//Edit Student
if (isset($_POST['submitEdit'])) {
    $id_number = $_POST['id_number'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    if (submit_edit_student($id_number, $first_name, $middle_name, $last_name, $email, $course, $year)) {
        echo '<script>alert("Edit Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminStudents.php";</script>';
        exit;
    } else {
        echo '<script>alert("Edit Unsuccessful");</script>';
        echo '<script>window.location.href = "../Admin/AdminStudents.php";</script>';
        exit;
    }

}

//Register Student in admin side
if (isset($_POST['submitAdd'])) {

    $id_number = $_POST['id_number'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    if (submit_add_student($id_number, $password, $first_name, $middle_name, $last_name, $email, $course, $year)) {
        echo '<script>alert("Registration Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminStudents.php";</script>';
        exit();
    } else {
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Duplicate ID Number",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../Admin/AdminStudents.php";
            }
        });
            </script>';
        exit();
    }
}
//Delete Students
if (isset($_POST['delete'])) {
    $id_number = $_POST['id_number'];

    if (delete_student($id_number)) {
        echo '<script>alert("Delete Student Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminStudents.php";</script>';
        exit;
    } else {
        echo '<script>alert("Delete Student Unsuccessful");</script>';
        echo '<script>window.location.href = "../Admin/AdminStudents.php";</script>';
        exit;
    }
}

//Membership Cancel
if (isset($_POST['cancelMembership'])) {
    $id_number = $_POST['id_number'];

    if (cancel_membership($id_number)) {
        echo '<script>alert("Cancel Membership Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminMembership.php";</script>';
        exit;
    } else {
        echo '<script>alert("Cancel Membership Unsuccessful");</script>';
        echo '<script>window.location.href = "../Admin/AdminMembership.php";</script>';
        exit;
    }
}


//Approve Subscription
if (isset($_POST['approveMembership'])) {
    $id_number = $_POST['id_number'];
    $rfid = $_POST['rfid'];
    $admin_name = $_SESSION['adminName'];
    $time = date('h:m:sa');
    $date1 = date('M-d-Y');


    if (approve_membership($id_number, $rfid, $admin_name, $time, $date1)) {
        echo '<script>alert("Approve Membership Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminMembership.php";</script>';
        exit;
    } else {
        echo '<script>alert("Approve Membership Unsuccessful");</script>';
        echo '<script>window.location.href = "../Admin/AdminMembership.php";</script>';
        exit;
    }


}
if (isset($_POST['submitImage'])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Define folder where images will be stored
        $uploadDirectory = "../assets/uploads/";

        // Check if the upload directory exists, if not, create it
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true); // Create the directory recursively
        }
        
        // Get uploaded image details
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $tmpName = $_FILES['image']['tmp_name'];

        $relativeUploadDirectory = "../assets/uploads/";
        $filename = uniqid() . "_" . $name;
        $filepath = $relativeUploadDirectory . $filename;
        
        // Move the uploaded image to the upload directory
        if (move_uploaded_file($tmpName, $uploadDirectory . $filename)) {
            // File successfully uploaded, proceed with database insertion
            $db = Database::getInstance();
            $conn = $db->getConnection();
            
            // Generate a unique product ID
            $product_id = rand(111111, 999999);
            $product_name = $_POST['name'];
            $product_type = $_POST['type'];
            $product_price = $_POST['price'];
            $product_stocks = $_POST['stocks'];
            
            // Insert product details into the database
            $sqlProduct = "INSERT INTO product (`product_id`,`product_name`,`product_type`,`product_price`,`product_stocks`) VALUES ('$product_id','$product_name','$product_type','$product_price','$product_stocks')";
            $stmt = $conn->prepare("INSERT INTO image (name, type, filepath, product_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $name, $type, $filepath, $product_id);
            
            if (mysqli_query($conn, $sqlProduct) && $stmt->execute()) {
                echo '<script>alert("Add Merchandise Successful");</script>';
                echo '<script>window.location.href = "../Admin/AdminViewMerch.php";</script>';
                exit;
            } else {
                echo '<script>alert("Unsuccessful");</script>';
                echo '<script>window.location.href = "../Admin/AdminViewMerch.php";</script>';
                exit;
            }
        } else {
            // File upload failed
            echo '<script>alert("Failed to upload image.");</script>';
            echo '<script>window.location.href = "../Admin/AdminViewMerch.php";</script>';
            exit;
        }
    }
}





if (isset($_POST['editSubmit'])) {


    $product_id = $_POST['editProductId'];
    $product_name = $_POST['editName'];
    $product_type = $_POST['editType'];
    $product_price = $_POST['editPrice'];
    $product_stocks = $_POST['editStocks'];


    if (edit_product($product_id, $product_name, $product_type, $product_price, $product_stocks)) {
        echo '<script>alert("Edit Product Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminViewMerch.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error: Edit Product Failed");</script>';
        exit;
    }
}

if (isset($_POST['deleteProduct'])) {
    $id_number = $_POST['id_number'];


    if (delete_product($id_number)) {
        echo '<script>alert("Delete Product Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminViewMerch.php";</script>';
        exit;
    } else {
        echo '<script>alert("Delete Product Unsuccessful");</script>';
        echo '<script>window.location.href = "../Admin/AdminViewMerch.php";</script>';
        exit;
    }
}

if (isset($_POST['submitPayment'])) {
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $money = $_POST['money'];
    $total = $_POST['total'];

    if ($money < $total) {
        echo '<script>alert("Not Enough Money");</script>';

    } else {
        $change = $money - $total;

        $orderResult = order_result($order_id);
        $id_number = $orderResult['id_number'];
        $name = $orderResult['name'];
        $size = $orderResult['size'];
        $quantity = $orderResult['quantity'];
        $admin_name = $_SESSION['adminName'];
        $date = date('Y-m-d');

        if (payment($order_id, $product_id, $money, $change, $total, $id_number, $name, $size, $quantity, $admin_name, $date)) {
            echo '<script>alert("Ordered Successfully");</script>';
            echo '<script>window.location.href = "../Admin/AdminOrderMerch.php";</script>';
            exit;
        } else {
            echo '<script>alert("Ordered Unsuccessfully");</script>';
            echo '<script>window.location.href = "../Admin/AdminOrderMerch.php";</script>';
            exit;
        }

    }


}

if (isset($_POST['renew'])) {
    if (renewal()) {
        echo '<script>alert("Renewal Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminStudents.php";</script>';
        exit;
    } else {
        echo '<script>alert("Renewal Unsuccessful");</script>';
        echo '<script>window.location.href = "../Admin/AdminStudents.php";</script>';
        exit;
    }
}
if (isset($_POST['approveRenewal'])) {
    $id_number = $_POST['id_number'];
    $admin_name = $_POST['admin_name'];

    if (renewal_approve($id_number, $admin_name)) {
        echo '<script>alert("Membership Renewal Successful");</script>';
        echo '<script>window.location.href = "../Admin/AdminRenewal.php";</script>';
        exit;
    } else {
        echo '<script>alert("Membership Renewal Unsuccessful");</script>';
        echo '<script>window.location.href = "../Admin/AdminRenewal.php";</script>';
        exit;
    }
}




?>
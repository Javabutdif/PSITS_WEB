
<?php
require 'connection.php';


function login($id_number, $password){   
    $db = Database::getInstance();
    $conn = $db->getConnection();

    //Admin Login
    $sqlAdmin = "SELECT * FROM `admin` WHERE id_number = '$id_number'";
    $resultAdmin = mysqli_query($conn,$sqlAdmin);
    $adminGet = mysqli_fetch_array($resultAdmin, MYSQLI_ASSOC);



    //User Login
    $sqlUser = "SELECT students.id_number,students.rfid, students.first_name, students.middle_name, students.last_name,students.password, students.membership,students.status as stat, renewal.status,renewal.renewal_date FROM `students` INNER JOIN renewal ON students.id_number = renewal.id_number WHERE students.id_number = '$id_number' AND renewal.renewal_date = 'None'";
    $resultUser = mysqli_query($conn,$sqlUser);
    $userGet = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);

    $max_attempts = 3;
    $wait_time = 60;


    if (!isset($_SESSION['attempt'])) {
        $_SESSION['attempt'] = 0;
    }


    if (isset($_SESSION['last_attempt_time']) && (time() - $_SESSION['last_attempt_time'] < $wait_time)) {
        $remaining_time = $wait_time - (time() - $_SESSION['last_attempt_time']);
    
        echo '<script>Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Please wait 1 minute seconds before trying again.",
					
				  });</script>';
       
    }
    else if($adminGet['id_number'] != null && password_verify($password, $adminGet['password']) && ($adminGet['Position'] == "President" || $adminGet['Position'] == "Developer" )){
        $_SESSION['attempt'] = 0;
        ini_set('session.cookie_lifetime', 1800);
        $_SESSION['adminId'] = $adminGet['id_number'];
        $_SESSION['adminName'] = $adminGet['name'];
        $_SESSION['position'] = $adminGet['Position'];
        session_regenerate_id();
        logs($adminGet['name'], $adminGet['Position'] . " Login!");
        echo '<script>window.location.href = "Admin/SuperAdminDashboard.php";</script>';
        exit;
    }
    else if($adminGet['id_number'] != null && password_verify($password,$adminGet['password'])){
        $_SESSION['attempt'] = 0;
        ini_set('session.cookie_lifetime', 1800);
        $_SESSION['adminId'] = $adminGet['id_number'];
        $_SESSION['adminName'] = $adminGet['name'];
        $_SESSION['position'] = $adminGet['Position'];
        session_regenerate_id();
        logs($adminGet['name'], $adminGet['Position'] . " Login!");
        echo '<script>window.location.href = "Admin/AdminDashboard.php";</script>';
        exit;
    }
    else if($userGet['id_number'] != null && $userGet['membership'] == 'Approve' && $userGet['stat'] == 'TRUE'  && $userGet['status'] == 'Deactivate' && $userGet['renewal_date'] == 'None' && password_verify($password,$userGet['password'])){
        $_SESSION['attempt'] = 0;
        ini_set('session.cookie_lifetime', 1800);
        $_SESSION['user_id'] = $userGet['id_number'];
        $_SESSION['user_rfid'] = $userGet['rfid'];
        $_SESSION['userName'] = $userGet['first_name']." ".$userGet['middle_name'].". ".$userGet['last_name'];
        session_regenerate_id();
        $_SESSION['attempt'] = 0;
        echo '<script>window.location.href = "User/UserDashboard.php";</script>';
        exit;
    }
     else if($userGet['id_number'] != null && $userGet['membership'] == 'Approve' && $userGet['status'] == 'Activate' && password_verify($password,$userGet['password'])){
        $_SESSION['attempt'] = 0;
        echo '<script>Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "You are obligated to settle the renewal fee of ₱20 at the PSITS Office.",
					
				  });</script>';
        
      
    }

    else if($userGet['id_number'] != null && $userGet['membership'] == 'Pending' && password_verify($password,$userGet['password'])){
        $_SESSION['attempt'] = 0;
        echo '<script>Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "You must pay the membership fee of ₱50 at the PSITS Office.",
					
				  });</script>';
          
      
    }
    else{
        echo '<script>Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Incorrect ID Number and Password!",
					
				  });</script>';
    
        $_SESSION['attempt']++;
        $_SESSION['last_attempt_time'] = time();

        if ($_SESSION['attempt'] >= $max_attempts) {
            echo '<script>Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "Maximum login attempts reached. Please wait 1 minute before trying again!",
					
				  });</script>';
        }
       
    }
    
  }

  function register_student($id_number,$password,$first_name,$middle_name,$last_name,$email,$course,$year){

    $db = Database::getInstance();
    $conn = $db->getConnection();

    //Hashing Password
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    
    
    $stmt = $conn->prepare("INSERT INTO students (id_number, first_name, middle_name, last_name, email, course, year, password, status, membership) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'TRUE', 'Pending')");
    $ren = $conn->prepare("INSERT INTO renewal (id_number,status,admin_name,renewal_date) VALUES (?,'Deactivate','None','None')");
    $ren->bind_param("s", $id_number);
    $stmt->bind_param("ssssssss", $id_number, $first_name, $middle_name, $last_name, $email, $course, $year, $hashPassword);


     try {
        if ($stmt->execute() && $ren->execute()) {
            echo '<script>alert("Registration Successful");</script>';
            echo '<script>window.location.href = "Login.php";</script>';
            exit(); 
        } else {
            echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Duplicate ID Number",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "Register.php";
            }
        });
    </script>';
            exit(); 
        }
    } catch (mysqli_sql_exception $e) {
         echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Duplicate ID Number",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "Register.php";
            }
        });
    </script>';
        $stmt->close();
        exit(); 
    }
    
  }


?>
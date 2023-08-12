<?php 
    include 'head.php';
    include 'body.php';
    session_start();
    include 'connection.php';
    function input($data)
    {
    
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $id = input($_POST["id"]);
        $password = input($_POST["pass"]);
        /** @var object $con */
        $stmt = $con->prepare("SELECT * FROM auth");
        $stmt->execute();
        $ids = $stmt->get_result();
        $res = $ids->fetch_all(MYSQLI_ASSOC);
    
        foreach ($res as $user) {
            if ($user['id'] == $id && $user['pass'] != $password) {
                echo "<script type='text/javascript'>alert('Check whether your password is correct');
                window.location='http://localhost/Juhosi%20Software%20Web%20Development/';
                </script>";
            }
        }
        foreach ($res as $user) {
            if ($user['id'] != $id && $user['pass'] != $password && $user['type'] == 'admin') {
                echo "<script type='text/javascript'>alert('Enter proper ID');
                window.location='http://localhost/Juhosi%20Software%20Web%20Development/';
                </script>";
            }
        }
        foreach ($res as $user) {
            if ($user['id'] != $id && $user['pass'] != $password && $user['type'] == 'cust') {
                echo "<script type='text/javascript'>alert('Check whether your ID is registered. Contact Admin!');
                window.location='http://localhost/Juhosi%20Software%20Web%20Development/';
                </script>";
            }
        }
        foreach ($res as $user) {
            if ($user['id'] == $id && $user['pass'] == $password && $user['type'] == 'admin') {
                $_SESSION['id'] = $user['id'];
                $_SESSION['type'] = $user['type'];
                header("location: http://localhost/Juhosi%20Software%20Web%20Development/summary/");
            }
        }
        foreach ($res as $user) {
            if ($user['id'] == $id && $user['pass'] == $password && $user['type'] == 'cust') {
                $_SESSION['id'] = $user['id'];
                $_SESSION['type'] = $user['type'];
                header("location: http://localhost/Juhosi%20Software%20Web%20Development/order/");
            }
        }
        
    }
?>  
<!doctype html>
<html lang="en">

<head>
    <?php
    session_start();
    include('head.php');
    include('connection.php');
    if ($_SESSION['type'] == "cust") {
        header("location: http://localhost/Juhosi%20Software%20Web%20Development/");
    } elseif (empty($_SESSION)) {
        header("location: http://localhost/Juhosi%20Software%20Web%20Development/");
    } elseif ($_SESSION['type'] == "admin") {
    ?>

</head>

<body>
    <?php include("body.php"); ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Infohub</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span class="navbar-text">Welcome, <?php echo $_SESSION['id']; ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="logout()">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- JavaScript function for logout -->
    <script>
        function logout() {
            window.location = "http://localhost/Juhosi%20Software%20Web%20Development/logout.php";
        }
    </script>
    <?php
        // Assuming you have established a database connection

        // Fetch data from the database
        $query = "SELECT SUM(quantity) AS cust_q1 FROM customer WHERE id = 'customer1';";
        $query1 = "SELECT SUM(weight) AS cust_w1 FROM customer WHERE id = 'customer1';";
        $query2 = "SELECT SUM(box_count) AS cust_b1 FROM customer WHERE id = 'customer1';";
        $result = mysqli_query($con, $query);
        $result1 = mysqli_query($con, $query1);
        $result2 = mysqli_query($con, $query2);
        $row = mysqli_fetch_assoc($result);
        $row1 = mysqli_fetch_assoc($result1);
        $row2 = mysqli_fetch_assoc($result2);
        $cust_q1 = $row['cust_q1'];
        $cust_w1 = $row1['cust_w1'];
        $cust_b1 = $row2['cust_b1'];

        $query3 = "SELECT SUM(quantity) AS cust_q3 FROM customer WHERE id = 'customer2';";
        $query4 = "SELECT SUM(weight) AS cust_w3 FROM customer WHERE id = 'customer2';";
        $query5 = "SELECT SUM(box_count) AS cust_b3 FROM customer WHERE id = 'customer2';";
        $result3 = mysqli_query($con, $query3);
        $result4 = mysqli_query($con, $query4);
        $result5 = mysqli_query($con, $query5);
        $row3 = mysqli_fetch_assoc($result3);
        $row4 = mysqli_fetch_assoc($result4);
        $row5 = mysqli_fetch_assoc($result5);
        $cust_q3 = $row3['cust_q3'];
        $cust_w3 = $row4['cust_w3'];
        $cust_b3 = $row5['cust_b3'];
    ?>

    <div class="container py-5">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item / Customer</th>
                    <th>Customer 1</th>
                    <th>Customer 2</th>
                    <th>Total</th>
                    <!-- Add more column headers as needed -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Quantity</td>
                    <?php
                    echo "<td>" . $cust_q1 ."</td>";
                    echo "<td>" . $cust_q3 ."</td>";
                    echo "<td>" . ($cust_q1 + $cust_q3) . "</td>";
                    ?>
                </tr>
                <tr>
                    <td>Weight</td>
                    <?php
                    echo "<td>" . $cust_w1 ."</td>";
                    echo "<td>" . $cust_w3 ."</td>";
                    echo "<td>" . ($cust_w1 + $cust_w3) . "</td>";
                    ?>
                </tr>
                <tr>
                    <td>Box Count</td>
                    <?php
                    echo "<td>" . $cust_b1 ."</td>";
                    echo "<td>" . $cust_b3 ."</td>";
                    echo "<td>" . ($cust_b1 + $cust_b3) . "</td>";
                    ?>
                </tr>
                
            </tbody>
        </table>
    </div>
</body>
<?php } ?>

</html>
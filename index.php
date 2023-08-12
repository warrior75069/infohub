<!doctype html>
<html lang="en">

<head>
    <?php
    include('head.php');
    include('connection.php');
    ?>
</head>

<body class="my-login-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 min-vh-100 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded shadow shadow-sm">
                            <div class="card-header">
                                <h3 class="mb-0">Login</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" role="form" autocomplete="off" id="formLogin" action="authentication.php" method="POST">
                                    <div class="form-group">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control form-control-lg rounded-0" name="id" id="id" required="" placeholder="Enter your ID">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control-lg rounded-0" name="pass" id="pass" required="" autocomplete="new-password" placeholder="Enter your password">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg float-right" id="login" name="login">Login</button>
                                </form>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->
    <?php include('body.php');?>
</body>

</html>
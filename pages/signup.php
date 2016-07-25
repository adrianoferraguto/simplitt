<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 25/07/2016
 * Time: 13.43
 */

include("../static/config.php");

if(isset($_SESSION['id'])){
    header("Location: index.php");
}

include("../static/header.php");


ob_start();

if(isset($_POST['btn-signup'])) {

    $username = trim($_POST['uname']);
    $password = trim($_POST['pass']);

    // Tag stripping from both username and password
    $username = strip_tags($username);
    $password = strip_tags($password);

    // Password encryption using SHA256 algorithm
    $password = hash('sha256', $password);

    $query = "SELECT username FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows===0) { // Checks if the username is already registered

        $query = "INSERT INTO users(username,password) VALUES('$username','$password')";
        $result = $conn->query($query);

        if ($result) {
            $errTyp = "success";
            $errMSG = "Signup successful. You may now login.";
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong.";
        }

    } else {
        $errTyp = "warning";
        $errMSG = "The username you are trying to register is already taken. Please try another.";
    }

}
?>

<div class="container">

    <div id="signup-form">
        <form method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class="">Signup</h2>
                </div>

                <div class="form-group">
                    <hr />
                </div>

                <?php
                if ( isset($errMSG) ) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="uname" class="form-control" placeholder="Username" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required />
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Signup</button>
                </div>

                <div class="form-group">
                    <hr />
                </div>

                <div class="form-group">
                    Already have an account? <a href="login.php">Login here</a>
                </div>

            </div>

        </form>
    </div>

</div>

<?php include("../static/footer.php");

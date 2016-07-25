<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 18/07/2016
 * Time: 17.09
 */

// Page parametres
$pagename = "Login";


include("../static/config.php");

include("../static/header.php");

?>

<div class="container">
    <div id="login-form">
        <form action="../scripts/login.php" method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class="">Login</h2>
                </div>

                <div class="form-group">
                    <hr />
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="username" class="form-control" placeholder="Username" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Login</button>
                </div>

                <div class="form-group">
                    <hr />
                </div>

                <div class="form-group">
                    Don't have an account? <a href="signup.php">Signup here</a>
                </div>

            </div>

        </form>
    </div>
</div>

<?php include("../static/footer.php"); ?>

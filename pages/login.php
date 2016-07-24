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
    <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="../scripts/login.php" method="post">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username"><br><br>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password"><br><br>
                    <input type="submit" class="btn btn-primary" value="Login">
                </form>
            </div>
        <div class="col-md-3"></div>
    </div>

</div>

<?php

include("../static/footer.php");

?>

<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 26/07/2016
 * Time: 00.22
 */

$pagename = "Account settings";

include("../static/config.php");

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}

include("../static/header.php");



ob_start();

if(isset($_POST['btn-signup'])) {

    $oldPassword = trim($_POST['oldPass']);
    $newPassword = trim($_POST['newPass']);

    // Tag stripping from both old and new password
    $oldPassword = strip_tags($oldPassword);
    $newPassword = strip_tags($newPassword);

    // Passwords encryption using SHA256 algorithm
    $oldPassword = hash('sha256', $oldPassword);
    $newPassword = hash('sha256', $newPassword);

    $query = "SELECT password FROM users WHERE id=".$_SESSION['id']." AND password='$oldPassword'";
    $result = $conn->query($query);

    if ($result->num_rows===1) { // Checks if the username is already registered
        $query = "UPDATE users SET password='".$newPassword."' WHERE id=".$_SESSION['id'];
        $result = $conn->query($query);

        if ($result) {
            $errTyp = "success";
            $errMSG = "New password set successfully.";
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong.";
        }

    } else {
        $errTyp = "danger";
        $errMSG = "The password you entered as current password doesn't match your actual current password. Please try again.";
    }

}
?>

    <div class="container">

        <div id="signup-form">
            <form method="post" autocomplete="off">

                <div class="col-md-12">

                    <div class="form-group">
                        <h2 class="">Set a new password</h2>
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
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name="oldPass" class="form-control" placeholder="Current password" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name="newPass" class="form-control" placeholder="New password" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Confirm</button>
                    </div>


                </div>

            </form>
        </div>

    </div>

<?php include("../static/footer.php");

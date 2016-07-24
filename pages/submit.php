<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 18/07/2016
 * Time: 00.46
 */

// Page parametres
$pagename = "Submit content";

include("../static/config.php");

if(!isset($_SESSION['id'])) { header("Location: login.php"); }

include("../static/header.php");

?>
<div class="container">
    <form action="../scripts/submission.php" method="post">
        <label for="post_title">Title</label>
        <input type="text" class="form-control" name="post_title" placeholder="Write a title">
        <br>
        <label for="post_content">Content</label>
        <textarea class="form-control" rows="5" name="post_content"></textarea>
        <br>
        <input class="btn btn-primary" type="submit">
    </form>
</div>
<?php

include("../static/footer.php");
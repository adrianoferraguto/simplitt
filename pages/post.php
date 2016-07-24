<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 18/07/2016
 * Time: 02.38
 */

$pagename = "Post ".$_GET['id'];

include("../static/config.php");

include("../static/header.php");

?>

<div class="container">

<!--Post-->
<?php
    $showLink = false;
    include("../scripts/postPanel.php");
?>

<!--Comment box-->
<?php
    if(isset($_SESSION['id'])){ ?>
        <div class="container">
            <form action="../scripts/commentSubmission.php?postId=<?php echo $_GET['id']; ?>" method="post">
                <label for="comment_content">Comment</label>
                <textarea class="form-control" rows="3" name="comment_content"></textarea>
                <br>
                <input class="btn btn-primary" type="submit">
            </form>
        </div>
    <?php }
?>

<!--Comment section-->
<?php
    $query = "SELECT * FROM comments as c, users as u WHERE c.userId = u.id AND c.postId = ".$_GET['id'];
    if($result = $conn->query($query)){
         while($row = $result->fetch_assoc()){
             ?>
             <div class="panel panel-default">
                 <div class="panel-body">
                     <?php echo $row['content'];?>
                 </div>
                 <div class="panel-footer">
                     Posted by <?php echo '<a href="../pages/profile.php?id='.$row['userId'].'">'.$row['username'].'</a> on '.$row['datetime'].'<br>'; ?>
                     <!--<a href="../scripts/vote.php/?id=<?php echo $row['idPost']; ?>&type=UP"><span class="glyphicon glyphicon-chevron-up"<?php if($didUpvote) echo ' style="color:red"' ?>></span>Upvote</a>
                     <a href="../scripts/vote.php/?id=<?php echo $row['idPost']; ?>&type=DOWN"><span class="glyphicon glyphicon-chevron-down"<?php if($didDownvote) echo ' style="color:red"' ?>></span>Downvote</a><br>
                     Post karma: <?php echo ($upvotes-$downvotes); ?> (<?php echo $upvotes; ?> upvotes and <?php echo $downvotes; ?> downvotes)-->
                 </div>
             </div>

             <?php
         }
    }
?>

</div>

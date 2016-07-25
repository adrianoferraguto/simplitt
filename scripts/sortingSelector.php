<?php
/**
 * Created by PhpStorm.
 * User: Adriano
 * Date: 25/07/2016
 * Time: 00.31
 */

?>

<label>Sort by:</label>
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php if(strpos($_SERVER['QUERY_STRING'],'karma')) echo "Best karma"; else echo "Most recent"; ?> <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="<?php echo $_SERVER['PHP_SELF']."?sort=recent"; ?>">Most recent</a></li>
    <li><a href="<?php echo $_SERVER['PHP_SELF']."?sort=karma"; ?>">Best karma</a></li>
  </ul>
</div>
        <!--<div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php /* if(strpos($_SERVER['QUERY_STRING'],'24h')) echo "24 hours";
                else if(strpos($_SERVER['QUERY_STRING'],'month')) echo "month";
                else if(strpos($_SERVER['QUERY_STRING'],'all')) echo "all time";
                else echo "24 hours"; ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?limit=24h"; ?>">24 hours</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?limit=month"; ?>">month</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?limit=all"; */ ?>">all time</a></li>
            </ul>
        </div>-->
<br><br>


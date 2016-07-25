<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Online Quiz - Quiz List</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <script src="<?php echo base_url();?>common/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>common/js/common.js"></script>
        <link href="<?php echo base_url();?>common/css/quiz.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>common/css/sublist.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<!--        to select quiz subject by member-->
        <?php
        
        echo "<div id=featured-wrapper><div id='featured' class=container> Select Subject to Give Quiz</div> </div>";        
        echo "<div id=content>";        
        foreach($query as $q) {            
            echo "<div class='link-li'><a href=showtest.php?subid=".$q->sub_id."><div>".$q->sub_name."</div></a></div>";
        }        
        echo "</div>";
        ?>     
    </body>
</html>

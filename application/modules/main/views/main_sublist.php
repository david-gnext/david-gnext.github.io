       <link href="<?php echo base_url();?>common/css/sublist.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<!--        to select quiz subject by member-->
        <?php
        
        echo "<div id=featured-wrapper><div id='featured' class=container> Select Subject to Give Quiz</div> </div>";        
        echo "<div id=content>";        
        foreach($query as $q) {            
            echo "<div class='link-li'><a href=showtest/subid/".$q->sub_id."><div>".$q->sub_name."</div></a></div>";
        }        
        echo "</div>";
        ?>     
    </body>
</html>

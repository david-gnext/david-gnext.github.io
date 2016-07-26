<script src="<?= base_url() ?>js/Chart.js-master/Chart.js"></script>
<script src="<?= base_url() ?>common/js/admin/showScore.js"></script>
</head>
<body>
<?php

    $mem_name = array();
    $score = array();
    echo "<h2 class=head1>" . $test_name . " Test Result Score</h2>";
    echo "<table class=coll align=center><thead><th class=style3>Name</th><th class=style3>Subject</th><th class=style3>Give Mark</th><th class=style3>Score</th><th class=style3>Status</th></thead>";
    foreach($allscore as $all){
        echo "<tr><td align=center class=style3>$all->login</td><td aling=center class=style3>$all->test_name</td><td align=center class=style3>$all->score</td><td align=center class=style3>$all->total_que</td>";
        $status = $all->total_que / 2;
        if ($all->score > $status) {
            echo "<td align=center class='style3 pass'>Pass</td></tr>";
        } else {
            echo "<td align=center class='style3 fail'>Fail</td></tr>";
        }
        array_push($mem_name, $all->login); //get member name array
        array_push($score, $all->score);  //get score array
    }    
    echo "<span id='member_name' style='display:none'>".json_encode($mem_name)."</span>";
    echo "<span id='member_score' style='display:none'>".json_encode($score)."</span>";
    echo "</table>";

    ?>       
<!-- 
##  display doughnut's chart 
##  member name with color 
-->
<div id="canvas-holder" style="width:20%;margin:0 auto;">
    <canvas id="chart-area" width="100" height="100"/>
</div>
<div style="float:right;width: 200px;" id="mem_name"></div>                      
</body>
</html>
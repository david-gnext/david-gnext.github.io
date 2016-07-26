<script src="<?php echo base_url();?>js/Chart.js-master/Chart.js"></script>
<script src="<?php echo base_url();?>common/js/admin/showResult.js"></script>
    </head>

    <body>

        <?php               
      
        echo "<h1 class=head1><u><span style='background:#abdd99'>" . $username . "</span></u> Result </h1>";
        if (count($field) < 1) {
            echo "<br><br><h1 class=head1> You have not take answer any quiz</h1>";            
        }
        else{
        echo "<table align=center class='result_tb'><thead class='style6'><th width=300 >Test Name</th> <th width=200> Total<br> Question</th> <th width=100 > Score</th><th width=200 >Qualification</th></thead>";
        $na = array();
        $sub = array();        
        foreach ($field as $row) {
            echo "<tr class=style5><td>$row->test_name</td> <td align=center> $row->total_que</td> <td align=center> $row->score</td>";
            if ($row->score > ($row->total_que / 2)) {
                echo "<td align=center class=pass>Pass</td></tr>";
            } else {
                echo "<td align=center class=fail>Fail</td></tr>";
            }
            array_push($na, $row->score);
            array_push($sub, $row->test_name);
        }
          echo "<span id='member_name' style='display:none'>".$username."</span>";
          echo "<span id='member_score' style='display:none'>".json_encode($na)."</span>";
         echo "<span id='test_name' style='display:none;'>".json_encode($sub)."</span>";
        echo "</table>";
        ?>
        
        <div id="canvas-holder" style="width:20%;margin:0 auto;">
            <canvas id="chart-area" width="100" height="100"/>

        </div>
    </div>
    <div style="float: right;width:200px;">
        <div style="background:#F7464A;min-width:80px;height:20px;float:left;"></div><span>CSS</span>
        <div style="clear:both;"></div>
        <div style="background:#46BFBD;min-width:80px;height:20px;float:left;"></div><span>Jquery</span>
        <div style="clear:both;"></div>
        <div style="background:#949fb1;min-width:80px;height:20px;float:left;"></div><span>HTML</span>
        <div style="clear: both;"></div>

    </div>
    <?php
    }
    ?>
</body>
</html>
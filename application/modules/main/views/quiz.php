
        <?php         
        if(!isset($js_un)) {
        ?>
            <script src="<?= base_url() ?>common/js/quiz.js"></script>            
        <?php
         } 
         ?>                 
            <link href="<?= base_url() ?>common/css/quizz.css" rel="stylesheet" type="text/css">        
    </head>

    <body>         
        <?php                
        echo '<span id="time"></span>';
        echo "<span id='allowTime' hidden>".$time[0]->time."</span>";               
        $t_q = count($total);
        if(isset($result) && $result){
                    echo "<div id=featured-wrapper> Result</div>";                    
                    echo "<div id=content><div class=style1>Total Question<span style='float:right;'>" . $t_q ."</span></div>";
                    echo "<div class=style1>True Answer<span style='float:right;'>" . $this->session->userdata('trueans')."</span></div>";
                    $w = $t_q - $this->session->userdata('trueans');
                    echo "<div class=style1>Wrong Answer<span style='float:right;'>" . $w."</span></div>";
                    if ($this->session->userdata('trueans') > $t_q / 2) {
                        ?>
                        <script>alert('You are Pass!!!!');</script>
                        <?php
                    } else {
                        ?>
                        <script>alert('You are Fail,Try more your lesson!!!');</script>
                        <?php
                    }                    
                    echo "<h1 align=center><a href=review> Review Question</a> </h1></div>";
                    $this->session->unset_userdata("qn");
                    $this->session->unset_userdata("sid");
                    $this->session->unset_userdata("tid");
                    $this->session->unset_userdata("trueans");                    
                }
                else{
                //$ques = mysql_query("select * from mst_question where test_id=" . $tid, $cn) or die(mysql_error());
        if ($t_q == 0) {
            $this->session->unset_userdata("qn");
            echo "<h1 class=head1>Some Error  Occured</h1>";
            //session_destroy();
            echo "Please <a href=index.php> Start Again</a>";
            exit;
        }
        echo "<form name='myfm' method='POST' action='#' class='login-box'>";
                $n = $this->session->userdata('qn') + 1;
        echo "<div id=featured_wrapper><center><h3>Que " . $n . ":".(($current_ques->image != null) ? "<img src='data:image/jpeg;base64,".base64_encode($current_ques->image)."' >" : $current_ques->que_desc ) ."</h3></center></div>";
        echo "<div><input type='radio' name='ans' value='1' id='a1'>$current_ques->ans1</div>";
        echo "<div><input type='radio' name='ans' value='2' id='a2'>$current_ques->ans2</div>";
        echo "<div><input type='radio' name='ans' value='3' id='a3'>$current_ques->ans3</div>";
        echo "<div><input type='radio' name='ans' value='4' id='a4'>$current_ques->ans4</div>";        
        if ($this->session->userdata('qn') < ($t_q - 1)) {
            echo "<center><input type='submit' name='submit' value='Next Question'></center>";
        } else {
            echo "<center><input type='submit' name='submit' value='Get Result'></center>";
        }
        echo "</form>";
        }
        ?>        
    </body>
</html>
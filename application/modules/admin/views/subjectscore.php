</head>
<body>              
    <?php
#member result table list
#@david.jp
##                     
    

    echo "<h2 class=head1> Select Subject Name to See Score </h2>";
    echo "<table align=center class=coll>";    
    foreach($subject as $s){
        echo "<tr><td align=center class=style3><a href=show_score/testid/".$s->sub_id."/testname/".$s->sub_name."><div >".$s->sub_name."</div></a>";
    }
    echo "</table>";
    ?>
</body>
</html>

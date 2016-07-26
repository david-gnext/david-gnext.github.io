</head>

<body>      

    <p class="head1">Member List</p>        

    <?php
    echo "<table border=0 align=center class='result_tb'><thead class=style6><th width=300>Member Name </th><th width=300>City</th><th width=200>Email</th></thead>";
    //check for member exist
    if (count($AllUser) > 0) {
        foreach ($AllUser as $all) {
            echo "<tr class=style5>
                          <td><abbr title='See my result'>" . $all->username . "</abbr>
                               <a href='result/".$all->login."/".$all->username."'><input type='button' style='float:right' value='Result'></a>                                                                   
                          </td> 
                          <td align=center> $all->city</td> 
                          <td align=center> $all->email </td></tr>";
        }
    } else {
        echo "<tr align='center'><td colspan='3'>No member to show</td></tr>"; //<input type='submit' style='float:right;' name='submit' value='Delete'>
    }
    //------------------*---------------------
    echo "</table>";

//    if (isset($_POST['submit'])) {
//        extract($_SESSION);
//        mysqli_query($cn, 'delete from mst_user where login="' . $_POST["del"] . '"');
//        mysqli_query($cn, 'delete from mst_result where login="' . $_POST["del"] . '"');
//        mysqli_query($cn, 'delete from mst_useranswer where sess_id="' . session_id() . '"');
//
//        echo '<meta http-equiv="refresh" content="0">';
//    }
    ?>



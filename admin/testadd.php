<?php
session_start();
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link href="../css/questionadd.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");

include("header.php");


echo "<div class='box'><h2><div  class=head1>Add Test</div></h2>";
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'Save' || strlen($_POST['subid']) > 0) {
        extract($_POST);
        mysqli_query($cn,"insert into mst_test(sub_id,test_name,total_que,time) values ('$subid','$testname','$totque','$hour:$min')");
        echo "<p align=center>Test <b>\"$testname\"</b> Added Successfully.</p>";
        unset($_POST);
    }
}
?>
<SCRIPT LANGUAGE="JavaScript">
    function check() {
        mt = document.form1.testname.value;
        if (mt.length < 1) {
            alert("Please Enter Test Name");
            document.form1.testname.focus();
            return false;
        }
        tt = document.form1.totque.value;
        if (tt.length < 1) {
            alert("Please Enter Total Question");
            document.form1.totque.value;
            return false;
        }
        return true;
    }
</script>
<form name="form1" method="post" onSubmit="return check();">
    <div class="input">
        <div class="spLeft">
    Enter Subject ID           
        </div>
        <div class="spRight">
                <select name="subid">                    
                    <?php
                    $rs = mysqli_query($cn,"select * from mst_subject order by sub_name");
                    
                    while ($row = mysqli_fetch_array($rs)) {                        
                        echo "<option value='".$row['sub_id']."' selected>".$row['sub_name']."</option>";
                    }
                    ?>
                </select>
        </div>
    </div>
    <div class="input">
        <div class="spLeft">
         Enter Test Name
        </div>
        <div class="spRight">
           <input name="testname" type="text" id="testname">
        </div>
    </div>
    <div class="input">
        <div class="spLeft">
        Enter Total Question
        </div>
        <div class="spRight">
           <input name="totque" type="text" id="totque">           
        </div>
    </div>
    <div class="input small-select">
        <div class="spLeft">
        Enter Total Allow Time
        </div>
        <div class="spRight">
            Hour :
            <select name="hour">
                <?php
                for($h = 0; $h < 25;$h++){
                    echo "<option>$h</option>";
                }
                ?>
            </select>
            Minutes :
            <select name="min">
                  <?php
                for($m = 0; $m < 60;$m++){
                    echo "<option>$m</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <input type="submit" name="submit" value="Add">        
</form>
</div>


<?php
session_start();
require("../database.php");
include("header.php");
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link href="../css/questionadd.css" rel="stylesheet" type="text/css">
<?php
extract($_POST);

echo "<div class=box><h2>Add Question </h2>";
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'Save' || strlen($_POST['testid']) > 0) {
        extract($_POST);
        $file = $_FILES['image']['tmp_name'];
        if (!isset($file)) {
            echo 'Please select an Image';
        } else {
            $image_check = getimagesize($_FILES['image']['tmp_name']);
            if ($image_check == false) {
                echo 'Not a Valid Image';
            } else {
                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $image_name = addslashes($_FILES['image']['name']);
                mysqli_query($cn, "insert into mst_question(test_id,que_desc,image_name,image,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','{$image_name}','{$image}','$ans1','$ans2','$ans3','$ans4','$anstrue')");
            }
        }
//        echo "<p align=center>Question Added Successfully.</p>";
        ?>
        <script> alert("Question Added Successfully");</script>
        <?php
        unset($_POST);
    }
}
?>
<SCRIPT LANGUAGE="JavaScript">
    function check() {

        a1 = document.form1.ans1.value;
        if (a1.length < 1) {
            alert("Please Enter Answer1");
            document.form1.ans1.focus();
            return false;
        }
        a2 = document.form1.ans2.value;
        if (a1.length < 1) {
            alert("Please Enter Answer2");
            document.form1.ans2.focus();
            return false;
        }
        a3 = document.form1.ans3.value;
        if (a3.length < 1) {
            alert("Please Enter Answer3");
            document.form1.ans3.focus();
            return false;
        }
        a4 = document.form1.ans4.value;
        if (a4.length < 1) {
            alert("Please Enter Answer4");
            document.form1.ans4.focus();
            return false;
        }
        at = document.form1.anstrue.value;
        if (at.length < 1) {
            alert("Please Enter True Answer");
            document.form1.anstrue.focus();
            return false;
        }
        return true;
    }
</script>
<form name="form1" method="post" onSubmit="return check();"  enctype='multipart/form-data'>
    <div class="input"><div class="spLeft">Select Test Name</div>
        <div class="spRight">
            <select name="testid" id="testid" >
                <?php
                $rs = mysqli_query($cn, "Select * from mst_test order by test_name");
                while ($row = mysqli_fetch_array($rs)) {
                    echo "<option value='" . $row['test_id'] . "' selected>" . $row['test_name'] . "</option>";
                }
                ?>
            </select></div>
    </div>
    <div  class="input">
        <div class="spLeft"> Enter Question OR Image</div>
        <div class="spRight">
            <textarea name="addque" rows="2" id="addque"></textarea>
            <input type='file' name= 'image' >
        </div>
    </div>
    <div  class="input">
        <div class="spLeft">
            Enter Option1 
        </div>
        <div class="spRight">
            <input name="ans1" type="text" id="ans1" >
        </div>
    </div>
    <div class="input" style="margin-top: 25px;">
        <div class="spLeft"> Enter Option2 </div>
        <div class="spRight">
            <input name="ans2" type="text" id="ans2" >
        </div>
    </div>
    <div  class="input">
        <div class="spLeft">
            Enter Option3 </div>
        <div class="spRight">
            <input name="ans3" type="text" id="ans3" >
        </div>
    </div>
    <div  class="input">
        <div class="spLeft">
            Enter Option4
        </div>
        <div class="spRight">
            <input name="ans4" type="text" id="ans4" >
        </div>
    </div>
    <div  class="input"><div class="spLeft">
            Enter True Answer 
        </div>
        <div class="spRight">
            <input name="anstrue" type="text" id="anstrue" >
        </div>
    </div>
    <input type="submit" name="submit" value="Add">

</form>
</div>


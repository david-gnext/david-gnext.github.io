<?php
session_start();
require("../database.php");
include("header.php");
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
extract($_POST);

echo "<BR><h3 class=head1>Add Question </h3>";
if (isset($_POST['submit'])) {    
    if ($_POST['submit'] == 'Save' || strlen($_POST['testid']) > 0) {
        extract($_POST);
    $file   =$_FILES['image']['tmp_name'];
    if(!isset($file))
    {
      echo 'Please select an Image';
    }
    else 
    {
       $image_check = getimagesize($_FILES['image']['tmp_name']);
       if($image_check==false)
       {
        echo 'Not a Valid Image';
       }
       else
       {
        $image = addslashes(file_get_contents ($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        mysql_query("insert into mst_question(test_id,que_desc,image_name,image,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','{$image_name}','{$image}','$ans1','$ans2','$ans3','$ans4','$anstrue')", $cn) or die(mysql_error());
       }
   }        
//        echo "<p align=center>Question Added Successfully.</p>";
   ?>
<script> alert("Question Added Successfully");</script>
<?php        unset($_POST);
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
    <table width="80%"  border="0" align="center">
        <tr>
            <td width="24%" height="32"><div align="left"><strong>Select Test Name </strong></div></td>
            <td width="1%" height="5">  </td>
            <td width="75%"  ><select name="testid" id="testid" >
                    <?php
                    $rs = mysql_query("Select * from mst_test order by test_name", $cn);
                    while ($row = mysql_fetch_array($rs)) {
                         echo "<option value='".$row['test_id']."' selected>".$row['test_name']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td height="26"><div align="left"><strong> Enter Question </strong></div></td>
            <td>&nbsp;</td>
            <td><textarea name="addque" cols="60" rows="2" id="addque" class="style1"></textarea>
            OR Enter Image :  <input type='file' name= 'image' >
            </td>
        </tr>
        <tr>
            <td height="26"><div align="left"><strong>Enter Answer1 </strong></div></td>
            <td>&nbsp;</td>
            <td><input name="ans1" type="text" id="ans1" size="85" maxlength="85" class="style1"></td>
        </tr>
        <tr>
            <td height="26"><strong>Enter Answer2 </strong></td>
            <td>&nbsp;</td>
            <td><input name="ans2" type="text" id="ans2" size="85" maxlength="85" class="style1"></td>
        </tr>
        <tr>
            <td height="26"><strong>Enter Answer3 </strong></td>
            <td>&nbsp;</td>
            <td><input name="ans3" type="text" id="ans3" size="85" maxlength="85" class="style1"></td>
        </tr>
        <tr>
            <td height="26"><strong>Enter Answer4</strong></td>
            <td>&nbsp;</td>
            <td><input name="ans4" type="text" id="ans4" size="85" maxlength="85" class="style1"></td>
        </tr>
        <tr>
            <td height="26"><strong>Enter True Answer </strong></td>
            <td>&nbsp;</td>
            <td><input name="anstrue" type="text" id="anstrue" size="50" maxlength="85" class="style1"></td>
        </tr>
        <tr>
            <td height="26"></td>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Add" class="style5"></td>
        </tr>
    </table>
</form>
<p>&nbsp; </p>

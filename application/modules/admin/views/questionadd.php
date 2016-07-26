<link href="<?php echo base_url();?>common/css/questionadd.css" rel="stylesheet" type="text/css">
<?php
echo "<div class=box><h2>Add Question </h2>";
if (isset($message)) {
   echo $message;
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
                foreach($allTest as $Test){
                    echo "<option value='".$Test->test_id."' selected>". $Test->test_name."</option>";
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


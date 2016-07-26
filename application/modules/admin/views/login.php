<link href="<?php echo base_url(); ?>common/css/quizz.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    if (isset($valid) && !$valid) {
        echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
        $this->output->_display();
        exit;
    }
    ?>
    <div id="featured-wrapper">
        <div id="featured" id="container"><header>Welcome to Admistrative Area </header></div></div>
    <div id="content">
        <div><a href="subadd">Add Subject</a></div>
        <div><a href="testadd">Add Test</a></div>
        <div><a href="questionadd">Add Question </a></div>
        <div><a href="memberresult">See Member</a></div>
        <div><a href="subjectscore">Tasks Result</a></div>
    </div>
</body>
</html>

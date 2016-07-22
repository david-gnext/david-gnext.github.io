<div id="head-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1>GNEXT Online Quiz Management</h1>
        </div>    

        <?php
        $index = explode("/", $_SERVER['PHP_SELF'])[2];
        if (isset($_SESSION['alogin'])) {
            if (!$_SESSION['alogin'] && $index != "index.php") {
                echo "</div></div>";
                echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
                exit;
            }
            echo "<div id='menu'><ul><li><a href=\"sublist.php\">HOme</a></li><li><a href=\"signout.php\">Signout</a></li></ul></div>";
            ?>
        </div>
    </div>                  
    <?php
} else if ($index != "index.php" && $index != "signup.php" && $index != "signupuser.php") {
    echo "</div></div>";
    echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
    exit;
} else {
    echo "</div></div>";
}
?>      


<div id="head-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1>GNEXT Online Quiz Management</h1>
        </div>    
        <?php        
        if (($this->session->userdata('alogin') == null && $controller != "admin")) {
            if ($index != "index" && $index != "signup" && $index != "signupuser") {
                echo "</div></div>";
                ($controller == "admin") ? $redirect = "admin" : $redirect = "index.php";
                echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=" . base_url() .$redirect.">Login</a><div>";
                $this->output->_display();
                exit;
            }
               echo "</div></div>";
        }
        elseif($this->session->userdata("adminlogin") == null && $controller == "admin"){
             if ($index != "index") {
                echo "</div></div>";
                ($controller == "admin") ? $redirect = "admin" : $redirect = "index.php";
                echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=" . base_url() .$redirect.">Login</a><div>";
                $this->output->_display();
                exit;
            }
               echo "</div></div>";
        }
        else{
            ($controller == "admin") ? $redirect = "admin/login" : $redirect = "main/sublist";
            echo "<div id='menu'><ul><li><a href=" . base_url() .$redirect. ">HOme</a></li><li><a href=" . site_url("signout/out/$controller") . ">Signout</a></li></ul></div>";
            ?>
        </div>
    </div>                  
    <?php
}
?>      

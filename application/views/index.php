    </head>
    <body>
        <?php                                        
            if (count($user) == 0) {
                echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
                $this->session->set_userdata(array('alogin'=> false));                
            }
            else{
            $this->session->set_userdata(array('user'=> $user));
            $this->session->set_userdata(array('alogin' => true));
        
            if($this->session->userdata('alogin')){
            ?>
            <script>window.location.href = 'main/sublist';</script>
            <?php
            }
            else{
            echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";                
            }
            }
        ?>    
        <div class="login-box ">
            <h3> Log In </h3>
            <form method="POST">
                <input type="text" name="user"  placeholder="Type User Name"><br>
                <input type="password" name="pass"  placeholder="Type Password"><br>
                <input type="submit" name="submit" value="Login" class="button">
            </form>
            <span id="signup_text">You are not still a member.Click <a href="signup.php">Sign Up</a></span>
        </div>
    </body>
</html>

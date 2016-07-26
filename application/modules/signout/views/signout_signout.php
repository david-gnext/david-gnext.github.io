<?php
$this->session->unset_userdata("alogin");
$this->session->sess_destroy();
($controller == "admin") ? $redirect = "admin" : $redirect = "index.php";
header("Location:".base_url().$redirect);
?>

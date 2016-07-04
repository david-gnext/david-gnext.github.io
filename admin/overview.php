<?php
session_start();
?>
<html>
    <head>
        <title>Member Overview Progress</title>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
        <link href="../quiz.css" rel="stylesheet" type="text/css">
        <script src="../js/Chart.js-master/Chart.js"></script>
    </head>

    <body>
        

        <script>

    
            window.onload = function () {
                var ctx = document.getElementById("chart-area").getContext("2d");
                window.myBar = new Chart(ctx).Bar(polarData, {
                    responsive: true
                });
            };
          


        </script>
        <?php
        include("header.php");
        ?>
        <h2 align="center">Member Overview Progress Chart</h2>
        <div id="canvas-holder" style="width:20%;margin:0 auto;">
            <canvas id="chart-area" width="100" height="100"/>

       

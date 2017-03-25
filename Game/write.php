<?php
    $name=$_GET['name'];
    $win=$_GET['win'];
    $btn2=$_GET['btn2'];
    $btn1=$_GET['btn1'];
    mysql_connect("localhost","root","asd");
    mysql_select_db("game");
    $sql="insert into aprox values('".$name."',".$win.")";
    mysql_query($sql);
    if($btn1)header("Location: game.html");
    else header("Location: index.html");

  ?>

<?php
    mysql_connect("localhost","root","asd")or die("asd");
    mysql_select_db("game")or die("sda");
    $sql="select * from aprox order by score desc";
    $query=mysql_query($sql);
    $table=array();
    while($r=mysql_fetch_assoc($query))array_push($table,$r);
    echo "{\"players\":".json_encode($table)."}";
?>

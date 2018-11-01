<?php

    // connection details sent via email
    $host = "";
    $db = "";
    $user = "";
    $pass = "";

    $dbc = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
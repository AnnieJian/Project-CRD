<?php
    require_once("../lib/common.php");
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
        exit();
    } else {
        echo(init_content("CRD"));
    }
?>
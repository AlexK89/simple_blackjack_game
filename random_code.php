<?php
/**
 * Created by PhpStorm.
 * User: alexandrk
 * Date: 21/09/2017
 * Time: 11:48
 */

$hello_int = "2348276";
if (strpos($hello_int, "[A-Za-z]")) {
    echo $hello_int;
} else {
    echo "wrong input";
}
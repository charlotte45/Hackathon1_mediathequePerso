<?php
/**
 * Created by PhpStorm.
 * User: benjah
 * Date: 06/10/17
 * Time: 12:02
 */

session_start();
session_destroy();

header('Location: login.php');

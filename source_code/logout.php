<?php
require 'config.php';
$_SESSION = [];
session_unset();
session_destroy();
echo"<script>alert('You have been logged out!')</script>";
header("Location: login.php");
?>
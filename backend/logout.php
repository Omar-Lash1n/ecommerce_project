<?php
// backend/logout.php

session_start(); // لازم نبدأها عشان نقدر نقفلها

// إلغاء كل متغيرات السيشن
$_SESSION = array();

// تدمير السيشن
session_destroy();

// رجعه للصفحة الرئيسية
header("Location: ../frontend/index.php");
exit();
?>
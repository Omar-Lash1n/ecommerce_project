<?php
// backend/logout.php

session_start(); // لازم نبدأها عشان نقدر نقفلها

// إلغاء كل متغيرات السيشن
$_SESSION = array();

// (اختياري لكن أفضل) إلغاء الكوكي بتاعة السيشن
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// تدمير السيشن
session_destroy();

// رجعه لصفحة اللوجن (تم التعديل هنا)
header("Location: ../frontend/login.html");
exit();
?>
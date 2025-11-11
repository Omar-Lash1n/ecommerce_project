<?php
// backend/db_connect.php

// جلب الإعدادات من متغيرات البيئة (Environment Variables)
// دي الطريقة الاحترافية للتعامل مع الإعدادات عشان لما نرفع على AWS
$db_host = getenv('DB_HOST') ?: 'localhost';
$db_name = getenv('DB_NAME') ?: 'electech_db';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') ?: '';

// إنشاء اتصال
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// فحص الاتصال
if ($conn->connect_error) {
    // لا تطبع الخطأ للعامة في الـ production، لكن هذا جيد للتجربة
    die("فشل الاتصال: " . $conn->connect_error);
}

// ضبط الترميز لضمان دعم اللغة العربية
$conn->set_charset("utf8mb4");

?>
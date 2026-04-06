<?php
// backend/login.php

// **مهم: لازم نبدأ السيشن قبل أي حاجة**
session_start();

// تضمين ملف الاتصال
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // 1. هل الحقول مليانة؟
    if (empty($email) || empty($password)) {
        header("Location: ../frontend/login.html?error=emptyfields");
        exit();
    }

    // --- جلب اليوزر من الداتا بيز ---
    $sql = "SELECT id, username, password_hash FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // اليوزر موجود، هات بياناته
        $user = $result->fetch_assoc();
        
        // **التأكد من الباسورد**
        // بنقارن الباسورد اللي اليوزر كتبه (password) بالـ HASH اللي في الداتا بيز
        if (password_verify($password, $user['password_hash'])) {
            
            // --- الباسورد صح! ابدأ السيشن ---
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // وديه على الصفحة الرئيسية
            // (هنعدل index.html لـ index.php كمان شوية)
            header("Location: ../frontend/index.php"); 
            exit();

        } else {
            // الباسورد غلط
            header("Location: ../frontend/login.html?error=invalidcredentials");
            exit();
        }

    } else {
        // الإيميل مش موجود أصلاً
        header("Location: ../frontend/login.html?error=invalidcredentials");
        exit();
    }
    
    $stmt->close();
    $conn->close();

} else {
    header("Location: ../frontend/login.html");
    exit();
}
?>
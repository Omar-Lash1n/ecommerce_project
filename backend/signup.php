<?php
// backend/signup.php

// تضمين ملف الاتصال بالداتا بيز
require_once 'db_connect.php';

// التأكد أن الطلب جاي بنظام POST (من الفورم)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // استلام البيانات وتأمينها بشكل مبدئي
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // --- Error Handling & Validation ---

    // 1. هل كل الحقول مليانة؟
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: ../frontend/signup.html?error=emptyfields");
        exit();
    }

    // 2. هل الإيميل صحيح؟
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../frontend/signup.html?error=invalidemail");
        exit();
    }

    // 3. هل الباسورد مطابق؟
    if ($password !== $confirm_password) {
        header("Location: ../frontend/signup.html?error=passwordcheck");
        exit();
    }

    // 4. (اختياري) هل الباسورد قوي كفاية؟ (مثلاً 8 حروف)
    if (strlen($password) < 8) {
        header("Location: ../frontend/signup.html?error=passwordshort");
        exit();
    }

    // --- التأكد أن الإيميل مش متسجل قبل كدة ---
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // "s" means string
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // الإيميل موجود بالفعل
        header("Location: ../frontend/signup.html?error=emailtaken");
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();

    // --- كل حاجة تمام، ابدأ تسجيل اليوزر ---

    // **مهم جداً: تشفير كلمة المرور (Hashing)**
    // أوعى تخزن الباسورد زي ما هو
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // إدخال اليوزر الجديد في الداتا بيز
    $sql_insert = "INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt_insert->execute()) {
        // تم التسجيل بنجاح
        // وديه على صفحة اللوجن عشان يدخل
        header("Location: ../frontend/login.html?success=registered");
        exit();
    } else {
        // حصل خطأ في الداتا بيز
        header("Location: ../frontend/signup.html?error=dberror");
        exit();
    }

    $stmt_insert->close();
    $conn->close();

} else {
    // لو حد حاول يفتح الملف ده في المتصفح مباشرة
    header("Location: ../frontend/signup.html");
    exit();
}
?>
-- الخطوة 1: إنشاء الداتا بيز (لو مش موجودة)
-- احنا سميناها 'electech_db' زي ما افترضنا في ملف db_connect.php
CREATE DATABASE IF NOT EXISTS electech_db
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- الخطوة 2: قول للسيرفر يستخدم الداتا بيز دي
USE electech_db;

-- الخطوة 3: إنشاء جدول المستخدمين (users)
-- ده الجدول اللي ملفات signup.php و login.php بتتعامل معاه
CREATE TABLE IF NOT EXISTS users (
    -- id: رقم تعريفي فريد لكل مستخدم (Primary Key)
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- username: اسم المستخدم اللي هيظهر في الموقع
    username VARCHAR(100) NOT NULL,
    
    -- email: الإيميل، لازم يكون فريد (UNIQUE) مينفعش يتكرر
    email VARCHAR(255) NOT NULL UNIQUE,
    
    -- password_hash: الباسورد بعد تشفيره (Hashing)
    -- بنستخدم 255 عشان نكون في الأمان لو اتغيرت طريقة التشفير
    password_hash VARCHAR(255) NOT NULL,
    
    -- created_at: تاريخ إنشاء الحساب (مفيد جداً)
    -- DEFAULT CURRENT_TIMESTAMP معناه إنه هياخد وقت إنشاء الصف تلقائياً
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- (اختياري) ممكن نضيف جداول تانية بعدين زي:
-- CREATE TABLE products ( ... );
-- CREATE TABLE orders ( ... );
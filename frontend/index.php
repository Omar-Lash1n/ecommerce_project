<?php
    // لازم نبدأ السيشن في أول الصفحة عشان نقدر نقراها
    session_start(); 
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electech - أهلاً بك</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <a href="index.php" class="logo">Electech</a>
            <ul class="nav-links">
                <li><a href="index.php">الرئيسية</a></li>
                <li><a href="#">المنتجات</a></li>
                
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="#">أهلاً، <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                    <li><a href="../backend/logout.php">تسجيل الخروج</a></li>
                <?php else: ?>
                    <li><a href="login.html">تسجيل الدخول</a></li>
                    <li><a href="signup.html">حساب جديد</a></li>
                <?php endif; ?>
                
                <li><a href="#">🛒 السلة</a></li>
            </ul>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <h1>أفضل العروض على الإلكترونيات</h1>
            <p>اكتشف أحدث الأجهزة بأسعار لا تقاوم</p>
            <a href="#" class="btn btn-primary">تسوق الآن</a>
        </div>
    </header>

    <main class="container">
        <section class="products-section">
            <h2>أبرز المنتجات</h2>
            <div class="product-grid">
                 <div class="product-card">
                    <img src="/ecommerce_project/frontend/images/Dell-Sept-14.jpg" alt="صورة لابتوب حديث">
                    <h3>لابتوب حديث</h3>
                    <p>معالج قوي وتصميم أنيق.</p>
                    <span class="price">25,000 ج.م</span>
                    <button class="btn">أضف للسلة</button>
                </div>
                <div class="product-card">
                    <img src="/ecommerce_project/frontend/images/Dell-Sept-14.jpg" alt="صورة لابتوب حديث">
                    <h3>لابتوب حديث</h3>
                    <p>معالج قوي وتصميم أنيق.</p>
                    <span class="price">25,000 ج.م</span>
                    <button class="btn">أضف للسلة</button>
                </div>
                <div class="product-card">
                    <img src="/ecommerce_project/frontend/images/Dell-Sept-14.jpg" alt="صورة لابتوب حديث">
                    <h3>لابتوب حديث</h3>
                    <p>معالج قوي وتصميم أنيق.</p>
                    <span class="price">25,000 ج.م</span>
                    <button class="btn">أضف للسلة</button>
                </div>
                <div class="product-card">
                    <img src="/ecommerce_project/frontend/images/Dell-Sept-14.jpg" alt="صورة لابتوب حديث">
                    <h3>لابتوب حديث</h3>
                    <p>معالج قوي وتصميم أنيق.</p>
                    <span class="price">25,000 ج.م</span>
                    <button class="btn">أضف للسلة</button>
                </div>
                <div class="product-card">
                    <img src="/ecommerce_project/frontend/images/Dell-Sept-14.jpg" alt="صورة لابتوب حديث">
                    <h3>لابتوب حديث</h3>
                    <p>معالج قوي وتصميم أنيق.</p>
                    <span class="price">25,000 ج.م</span>
                    <button class="btn">أضف للسلة</button>
                </div>
                <div class="product-card">
                    <img src="/ecommerce_project/frontend/images/Dell-Sept-14.jpg" alt="صورة لابتوب حديث">
                    <h3>لابتوب حديث</h3>
                    <p>معالج قوي وتصميم أنيق.</p>
                    <span class="price">25,000 ج.م</span>
                    <button class="btn">أضف للسلة</button>
                </div>
                </div>
        </section>
    </main>

    <footer class="footer">
        <p>جميع الحقوق محفوظة &copy; 2025 Electech</p>
    </footer>

</body>
</html>
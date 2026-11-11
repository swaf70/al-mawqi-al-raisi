<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الموقع | فهرس الصفحات</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Tajawal', sans-serif; background: #f4f7fb; color: #0f172a; min-height: 100vh; padding: 40px 16px; }
        .wrap { max-width: 760px; margin: 0 auto; }
        h1 { font-size: 26px; font-weight: 900; margin-bottom: 6px; }
        .sub { color: #475569; font-size: 14px; margin-bottom: 26px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 14px; }
        a.card { display: flex; flex-direction: column; gap: 6px; padding: 20px; background: #fff; border: 1px solid rgba(15,23,42,.1); border-radius: 16px; text-decoration: none; color: inherit; transition: transform .2s, box-shadow .2s, border-color .2s; }
        a.card:hover { transform: translateY(-4px); box-shadow: 0 10px 30px rgba(15,23,42,.12); border-color: rgba(8,145,178,.35); }
        a.card i { font-size: 22px; color: #0891b2; }
        a.card b { font-size: 16px; }
        a.card span { font-size: 12px; color: #64748b; line-height: 1.7; }
        code { direction: ltr; display: inline-block; background: #eaf0f7; border-radius: 6px; padding: 2px 8px; font-size: 12px; color: #0e7490; }
        .foot { margin-top: 28px; font-size: 13px; color: #64748b; text-align: center; }
    </style>
</head>
<body>
    <div class="wrap">
        <h1>الموقع — فهرس الصفحات</h1>
        <p class="sub">كل صفحة داخل مجلدها، وترتبط بغيرها عبر المسارات. هذا الملف مجرد دليل للتنقل بينها.</p>

        <div class="grid">
            <a class="card" href="الرئيسية/">
                <i class="fa-solid fa-house"></i><b>الرئيسية</b>
                <span>الواجهة الترحيبية مع الإحصائيات وقسم الاستكشاف</span>
                <code>الرئيسية/index.php</code>
            </a>
            <a class="card" href="من-أنا/">
                <i class="fa-solid fa-user-shield"></i><b>من أنا</b>
                <span>السيرة الذاتية والمهارات التقنية</span>
                <code>من-أنا/index.php</code>
            </a>
            <a class="card" href="أعمالي/">
                <i class="fa-solid fa-briefcase"></i><b>أعمالي</b>
                <span>معرض المشاريع مع الفلترة والبحث</span>
                <code>أعمالي/index.php</code>
            </a>
            <a class="card" href="خدماتي/">
                <i class="fa-solid fa-layer-group"></i><b>الخدمات</b>
                <span>الخدمات الرقمية والأسعار</span>
                <code>خدماتي/index.php</code>
            </a>
            <a class="card" href="تواصل/">
                <i class="fa-solid fa-envelope-open-text"></i><b>تواصل معي</b>
                <span>نموذج التواصل وبيانات الاتصال</span>
                <code>تواصل/index.php</code>
            </a>
            <a class="card" href="تسجيل-الدخول/">
                <i class="fa-solid fa-right-to-bracket"></i><b>تسجيل الدخول / حساب جديد</b>
                <span>بوابة الأعضاء والمدير</span>
                <code>تسجيل-الدخول/index.php</code>
            </a>
            <a class="card" href="لوحة-التحكم/">
                <i class="fa-solid fa-gauge-high"></i><b>لوحة التحكم</b>
                <span>إدارة المشاريع، الخدمات، الرسائل والمستخدمين (للمدير)</span>
                <code>لوحة-التحكم/index.php</code>
            </a>
        </div>

        <div class="foot">للتشغيل: ضع مجلد الموقع داخل <code>C:\xampp\htdocs</code> وافتح <code>http://localhost/الموقع/</code></div>
    </div>
</body>
</html>
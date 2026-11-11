<?php
require_once __DIR__ . '/../includes/functions.php';

$page_title = setting('site_name', 'م. محمد الصواف') . ' | تواصل معي';
$active = 'contact';

require __DIR__ . '/../includes/header.php';
?>

<!-- ============ CONTACT ============ -->
<section class="section contact" id="contact">
    <div class="container">
        <div class="section-head" data-aos="fade-down">
            <span class="section-tag">تواصل معي</span>
            <h2 class="section-title">لنبدأ <span class="gradient-text">مشروعك</span> اليوم</h2>
            <p class="section-sub">أرسل لي رسالتك وسأرد خلال 24 ساعة</p>
        </div>
        <div class="contact-grid">
            <div class="contact-info" data-aos="fade-left">
                <div class="info-card">
                    <span class="info-icon"><i class="fa-solid fa-envelope"></i></span>
                    <div><h4>البريد الإلكتروني</h4><p dir="ltr"><?= e(setting('contact_email', '')) ?></p></div>
                </div>
                <div class="info-card">
                    <span class="info-icon"><i class="fa-solid fa-phone"></i></span>
                    <div><h4>الهاتف / واتساب</h4><p dir="ltr"><?= e(setting('contact_phone', '')) ?></p></div>
                </div>
                <div class="info-card">
                    <span class="info-icon"><i class="fa-solid fa-location-dot"></i></span>
                    <div><h4>الموقع</h4><p><?= e(setting('contact_location', '')) ?></p></div>
                </div>
                <a href="<?= e(setting('social_whatsapp', '#')) ?>" target="_blank" rel="noopener" class="btn btn-whatsapp btn-block">
                    <i class="fa-brands fa-whatsapp"></i> تواصل واتساب مباشرة
                </a>
            </div>
            <form class="contact-form" id="contactForm" data-aos="fade-right" novalidate>
                <div class="form-row">
                    <div class="form-group">
                        <label for="cName">الاسم *</label>
                        <input type="text" id="cName" name="name" class="form-control" placeholder="اسمك الكامل" required>
                        <span class="field-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="cEmail">البريد الإلكتروني *</label>
                        <input type="email" id="cEmail" name="email" class="form-control" placeholder="name@example.com" required dir="ltr">
                        <span class="field-error"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cSubject">الموضوع *</label>
                    <input type="text" id="cSubject" name="subject" class="form-control" placeholder="موضوع الرسالة" required>
                    <span class="field-error"></span>
                </div>
                <div class="form-group">
                    <label for="cMessage">الرسالة *</label>
                    <textarea id="cMessage" name="message" class="form-control" rows="6" placeholder="اكتب تفاصيل مشروعك أو استفسارك هنا..." required></textarea>
                    <span class="field-error"></span>
                </div>
                <div class="form-terms">
                    <i class="fa-solid fa-lock"></i> رسالتك مشفرة وسيتم الرد عليها عبر البريد الإلكتروني بأمان.
                </div>
                <button type="submit" class="btn btn-primary btn-block submit-btn" id="contactSubmit">
                    <span class="btn-label"><i class="fa-solid fa-paper-plane"></i> إرسال الرسالة</span>
                    <span class="btn-loading" hidden><i class="fa-solid fa-spinner fa-spin"></i> جار الإرسال...</span>
                </button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
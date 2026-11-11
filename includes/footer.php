<?php
$footer_text   = setting('footer_text', 'جميع الحقوق محفوظة.');
$contact_mail  = setting('contact_email', '');
$contact_phone = setting('contact_phone', '');
$contact_loc   = setting('contact_location', '');
$github        = setting('social_github', '#');
$linkedin      = setting('social_linkedin', '#');
$whatsapp      = setting('social_whatsapp', '#');
?>
<footer class="footer">
    <div class="container footer-grid">
        <div class="footer-col">
            <div class="brand footer-brand">
                <span class="brand-mark"><i class="fa-solid fa-shield-halved"></i></span>
                <span class="brand-text"><?= e(setting('site_name')) ?></span>
            </div>
            <p class="footer-desc"><?= e(setting('hero_title')) ?> — أقدم حلولاً تقنية متكاملة تجمع بين هندسة الشبكات وأمن المعلومات وتطوير البرمجيات.</p>
        </div>
        <div class="footer-col">
            <h4 class="footer-title">روابط سريعة</h4>
            <ul class="footer-links">
                <li><a href="../الرئيسية/">الرئيسية</a></li>
                <li><a href="../من-أنا/">من أنا</a></li>
                <li><a href="../أعمالي/">أعمالي</a></li>
                <li><a href="../خدماتي/">الخدمات</a></li>
                <li><a href="../تواصل/">تواصل معي</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4 class="footer-title">معلومات التواصل</h4>
            <ul class="footer-contact">
                <li><i class="fa-solid fa-envelope"></i><span dir="ltr"><?= e($contact_mail) ?></span></li>
                <li><i class="fa-solid fa-phone"></i><span dir="ltr"><?= e($contact_phone) ?></span></li>
                <li><i class="fa-solid fa-location-dot"></i><span><?= e($contact_loc) ?></span></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4 class="footer-title">تابعني</h4>
            <div class="footer-social">
                <a href="<?= e($github) ?>" target="_blank" rel="noopener" aria-label="GitHub"><i class="fa-brands fa-github"></i></a>
                <a href="<?= e($linkedin) ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="<?= e($whatsapp) ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <p><?= e($footer_text) ?></p>
            <p class="footer-dev">صُنع بـ <i class="fa-solid fa-heart"></i> بواسطة <a href="../الرئيسية/"><?= e(setting('site_name')) ?></a></p>
        </div>
    </div>
</footer>

<div class="toast-container" id="toastContainer"></div>

<a href="#top" class="back-to-top" id="backToTop" aria-label="العودة للأعلى"><i class="fa-solid fa-angles-up"></i></a>

<div class="modal" id="projectModal" aria-hidden="true">
    <div class="modal-overlay" data-close></div>
    <div class="modal-box">
        <button class="modal-close" data-close aria-label="إغلاق"><i class="fa-solid fa-xmark"></i></button>
        <div class="modal-body" id="projectModalBody"></div>
    </div>
</div>

<script src="<?= e(base_url('assets/js/main.js')) ?>"></script>
</body>
</html>
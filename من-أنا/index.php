<?php
require_once __DIR__ . '/../includes/functions.php';

$site_name  = setting('site_name', 'م. محمد الصواف');
$hero_title = setting('hero_title', 'مهندس شبكات وأمن معلومات');
$about_1    = setting('about_1', '');
$about_2    = setting('about_2', '');

$skills = [
    ['name' => 'إدارة وتصميم الشبكات', 'level' => 95],
    ['name' => 'أمن المعلومات ومكافحة الاختراق', 'level' => 90],
    ['name' => 'الجدران النارية و VPN', 'level' => 88],
    ['name' => 'تطوير الويب (PHP / JS)', 'level' => 85],
    ['name' => 'قواعد البيانات (MySQL)', 'level' => 82],
    ['name' => 'أمان تطبيقات الويب', 'level' => 92],
];

$page_title = $site_name . ' | من أنا';
$active = 'about';

require __DIR__ . '/../includes/header.php';
?>

<!-- ============ ABOUT ============ -->
<section class="section about" id="about">
    <div class="container">
        <div class="section-head" data-aos="fade-down">
            <span class="section-tag">من أنا</span>
            <h2 class="section-title">أجمع بين <span class="gradient-text">الهندسة</span> و<span class="gradient-text">الأمن</span> في كل مشروع</h2>
            <p class="section-sub">تعرّف على مسيرتي المهنية وخبراتي التقنية</p>
        </div>
        <div class="about-grid">
            <div class="about-visual" data-aos="fade-left">
                <div class="about-frame">
                    <div class="about-card-main">
                        <div class="about-avatar"><i class="fa-solid fa-user-shield"></i></div>
                        <h3><?= e($site_name) ?></h3>
                        <p><?= e($hero_title) ?></p>
                        <a href="../تواصل/" class="btn btn-primary btn-sm">تواصل معي <i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="about-badge-exp">
                    <span class="exp-num">3+</span>
                    <span class="exp-label">سنوات<br>خبرة</span>
                </div>
            </div>
            <div class="about-content" data-aos="fade-right">
                <p class="about-text"><?= e($about_1) ?></p>
                <p class="about-text"><?= e($about_2) ?></p>
                <div class="about-tags">
                    <span><i class="fa-solid fa-check"></i> عقد صيانة ودعم</span>
                    <span><i class="fa-solid fa-check"></i> تسليم بالوقت</span>
                    <span><i class="fa-solid fa-check"></i> تقرير أمني شفاف</span>
                </div>
                <h4 class="skills-title">مهاراتي التقنية</h4>
                <div class="skills">
                    <?php foreach ($skills as $sk): ?>
                        <div class="skill" data-aos="fade-right">
                            <div class="skill-head"><span><?= e($sk['name']) ?></span><span class="skill-pct" data-level="<?= (int)$sk['level'] ?>">0%</span></div>
                            <div class="skill-bar"><div class="skill-fill" data-level="<?= (int)$sk['level'] ?>"></div></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
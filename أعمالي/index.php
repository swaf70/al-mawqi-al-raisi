<?php
require_once __DIR__ . '/../includes/functions.php';

$cats = [];
$projects = [];
try {
    $cats = db()->query('SELECT id, name, slug, icon FROM categories ORDER BY id')->fetchAll();
    $projects = db()->query(
        'SELECT p.*, c.name AS category_name, c.slug AS category_slug
         FROM projects p
         JOIN categories c ON c.id = p.category_id
         ORDER BY p.featured DESC, p.created_at DESC'
    )->fetchAll();
} catch (Throwable $e) {
    $cats = [];
    $projects = [];
}

$page_title = setting('site_name', 'م. محمد الصواف') . ' | أعمالي';
$active = 'portfolio';

require __DIR__ . '/../includes/header.php';
?>

<!-- ============ PORTFOLIO ============ -->
<section class="section portfolio" id="portfolio">
    <div class="container">
        <div class="section-head" data-aos="fade-down">
            <span class="section-tag">معرض الأعمال</span>
            <h2 class="section-title">مشاريع <span class="gradient-text">نفّذتها</span> باحترافية</h2>
            <p class="section-sub">استعرض أعمالي في تطوير الويب والشبكات والأمن السيبراني</p>
        </div>
        <div class="portfolio-toolbar" data-aos="fade-up">
            <div class="filter-buttons" id="filterButtons">
                <button class="filter-btn active" data-filter="all">الكل</button>
                <?php foreach ($cats as $c): ?>
                    <button class="filter-btn" data-filter="<?= e($c['slug']) ?>">
                        <i class="fa-solid <?= e($c['icon']) ?>"></i> <?= e($c['name']) ?>
                    </button>
                <?php endforeach; ?>
            </div>
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="projectSearch" placeholder="ابحث عن مشروع...">
            </div>
        </div>
        <div class="projects-grid" id="projectsGrid">
            <?php if ($projects): ?>
                <?php foreach ($projects as $p): ?>
                    <article class="project-card" data-aos="zoom-in"
                             data-category="<?= e($p['category_slug']) ?>"
                             data-title="<?= e($p['title']) ?>"
                             data-description="<?= e(mb_substr($p['description'] ?? '', 0, 500)) ?>"
                             data-image="<?= e($p['image'] ?: '') ?>"
                             data-category-name="<?= e($p['category_name']) ?>">
                        <div class="project-thumb">
                            <?php if ($p['image']): ?>
                                <img src="<?= e(base_url($p['image'])) ?>" alt="<?= e($p['title']) ?>" loading="lazy">
                            <?php else: ?>
                                <div class="project-noimg"><i class="fa-solid fa-diagram-project"></i></div>
                            <?php endif; ?>
                            <div class="project-overlay">
                                <span class="project-cat-badge"><i class="fa-solid fa-folder"></i> <?= e($p['category_name']) ?></span>
                                <div class="project-actions">
                                    <button class="btn-icon project-view" title="عرض التفاصيل"><i class="fa-solid fa-eye"></i></button>
                                </div>
                            </div>
                            <?php if ($p['featured']): ?><span class="project-featured"><i class="fa-solid fa-star"></i> مميز</span><?php endif; ?>
                        </div>
                        <div class="project-info">
                            <h3 class="project-title"><?= e($p['title']) ?></h3>
                            <p class="project-desc"><?= e(mb_substr($p['description'] ?? '', 0, 90)) ?>…</p>
                            <span class="project-tech"><?= e($p['category_name']) ?></span>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <p class="empty-state" id="projectsEmpty" hidden><i class="fa-solid fa-folder-open"></i> لا توجد نتائج مطابقة للبحث</p>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
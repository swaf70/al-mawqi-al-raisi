<?php
require_once __DIR__ . '/../includes/functions.php';

$services = [];
try {
    $services = db()->query('SELECT * FROM services ORDER BY featured DESC, created_at DESC')->fetchAll();
} catch (Throwable $e) {
    $services = [];
}

$availability_map = [
    'available'   => ['متوفر', 'badge-available'],
    'limited'     => ['كمية محدودة', 'badge-limited'],
    'unavailable' => ['غير متاح', 'badge-unavailable'],
];

$page_title = setting('site_name', 'م. محمد الصواف') . ' | الخدمات';
$active = 'services';

require __DIR__ . '/../includes/header.php';
?>

<!-- ============ SERVICES ============ -->
<section class="section services" id="services">
    <div class="container">
        <div class="section-head" data-aos="fade-down">
            <span class="section-tag">الخدمات والمنتجات</span>
            <h2 class="section-title">حلول و<span class="gradient-text">خدمات رقمية</span> عند الطلب</h2>
            <p class="section-sub">اختر الخدمة المناسبة واحصل على عرض سعر خلال 24 ساعة</p>
        </div>
        <div class="services-grid">
            <?php if ($services): ?>
                <?php foreach ($services as $srv): ?>
                    <?php [$avail_label, $avail_class] = $availability_map[$srv['availability']] ?? ['متوفر', 'badge-available']; ?>
                    <article class="service-card <?= $srv['featured'] ? 'service-featured' : '' ?>" data-aos="fade-up">
                        <?php if ($srv['featured']): ?><span class="service-popular">الأكثر طلباً</span><?php endif; ?>
                        <div class="service-icon"><i class="fa-solid <?= e($srv['icon']) ?>"></i></div>
                        <span class="service-badge <?= $avail_class ?>"><?= e($avail_label) ?></span>
                        <h3 class="service-title"><?= e($srv['title']) ?></h3>
                        <p class="service-desc"><?= e($srv['description']) ?></p>
                        <div class="service-price">
                            <?php if ($srv['price'] !== null): ?>
                                <span class="price-num">$<?= number_format((float)$srv['price'], 0) ?></span>
                                <?php if ($srv['price_note']): ?><span class="price-note"><?= e($srv['price_note']) ?></span><?php endif; ?>
                            <?php else: ?>
                                <span class="price-num price-request">عند الطلب</span>
                            <?php endif; ?>
                        </div>
                        <a href="../تواصل/" class="btn btn-outline btn-block order-btn"
                           data-service="<?= e($srv['title']) ?>"><i class="fa-solid fa-cart-plus"></i> اطلب الخدمة</a>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
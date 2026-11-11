<!-- شريط الإحصائيات: أرقام تُعدّ من بيانات الملف _data.php -->
<section class="stats-band" id="stats">
    <div class="container stats-grid">
        <?php foreach ($stats as $s): ?>
            <div class="stat-item" data-aos="zoom-in">
                <span class="stat-value"><span class="counter" data-target="<?= (int)$s['value'] ?>">0</span><span class="stat-suffix"><?= e($s['suffix']) ?></span></span>
                <span class="stat-label"><?= e($s['label']) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>
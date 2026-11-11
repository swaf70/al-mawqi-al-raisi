<?php
require_once __DIR__ . '/../includes/functions.php';

$site_name  = setting('site_name', 'م. محمد الصواف');
$hero_title = setting('hero_title', 'مهندس شبكات وأمن معلومات');
$hero_tag   = setting('hero_tagline', 'حلول تقنية متكاملة');

$typing = json_decode(setting('hero_typing', '[]'), true);
if (!is_array($typing) || !$typing) {
    $typing = ['مهندس شبكات', 'خبير أمن سيبراني', 'مطور ويب', 'مستشار تقني'];
}

$stats = [
    ['value' => 3,  'suffix' => '+', 'label' => 'سنوات خبرة'],
    ['value' => 120, 'suffix' => '+', 'label' => 'مشروع منفّذ'],
    ['value' => 85,  'suffix' => '+', 'label' => 'عميل سعيد'],
    ['value' => 10,  'suffix' => '+', 'label' => 'شهادة احترافية'],
];
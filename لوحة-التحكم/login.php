<?php
require_once __DIR__ . '/../includes/functions.php';

if (is_logged_in()) {
    redirect(base_url('لوحة-التحكم/'));
}

redirect(base_url('تسجيل-الدخول/'));
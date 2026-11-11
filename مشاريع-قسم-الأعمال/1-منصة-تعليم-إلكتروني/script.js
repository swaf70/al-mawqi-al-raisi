var courses = [
    { title: 'أساسيات الشبكات', desc: 'مدخل عملي لتصميم الشبكات الصغيرة وإعداد الأجهزة.', lessons: 12, level: 'مبتدئ' },
    { title: 'أمن الويب التطبيقي', desc: 'حماية التطبيقات من الثغرات الشائعة حسب OWASP.', lessons: 18, level: 'متقدم' },
    { title: 'PHP و MySQL', desc: 'بناء تطبيقات ديناميكية بقواعد بيانات آمنة.', lessons: 24, level: 'متوسط' }
];

var grid = document.getElementById('coursesGrid');

courses.forEach(function (c) {
    var el = document.createElement('div');
    el.className = 'course';
    el.innerHTML =
        '<h3>' + c.title + '</h3>' +
        '<p>' + c.desc + '</p>' +
        '<div class="meta"><span>' + c.level + '</span><span>' + c.lessons + ' درساً</span></div>';
    grid.appendChild(el);
});

var quiz = [
    { q: 'ما هو المنفذ الافتراضي لـ HTTP؟', a: '80' },
    { q: 'ما الاختصار الصحيح لنظام إدارة قواعد البيانات MySQL؟', a: 'DBMS' },
    { q: 'من رمز هجوم SQL Injection يُستخدم لاختراق البيانات؟', a: 'SQL' }
];
var qIndex = 0;
var score = 0;

document.getElementById('quizStart').addEventListener('click', function () {
    qIndex = 0;
    score = 0;
    start();
});

function start() {
    if (qIndex >= quiz.length) {
        document.getElementById('quizResult').textContent = 'نتيجتك: ' + score + ' من ' + quiz.length;
        document.getElementById('quizStart').textContent = 'إعادة الاختبار';
        return;
    }
    var q = quiz[qIndex];
    var answer = prompt(q.q);
    if (answer && answer.trim().toUpperCase() === q.a.toUpperCase()) { score++; }
    qIndex++;
    start();
}
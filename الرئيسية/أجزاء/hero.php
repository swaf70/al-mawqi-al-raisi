<!-- قالب ترحيبي (Hero): اسم الموقع، التخصص، وزرّا التنقل الأساسيان -->
<section class="hero" id="home" data-aos="fade-up">
    <div class="hero-bg" aria-hidden="true">
        <div class="hero-grid-overlay"></div>
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>
    <div class="container hero-inner">
        <div class="hero-content">
            <span class="hero-badge"><i class="fa-solid fa-code"></i> متاح لاستقبال المشاريع</span>
            <h1 class="hero-title">
                أهلاً، أنا
                <span class="gradient-text"><?= e($site_name) ?></span>
            </h1>
            <div class="hero-type">
                <span class="hero-type-label">أعمل كـ</span>
                <span class="typer" id="typer" data-words='<?= e(json_encode($typing, JSON_UNESCAPED_UNICODE)) ?>'></span><span class="typer-caret"></span>
            </div>
            <p class="hero-desc"><?= e($hero_tag) ?></p>
            <div class="hero-actions">
                <a href="../أعمالي/" class="btn btn-primary"><i class="fa-solid fa-briefcase"></i> تصفح أعمالي</a>
                <a href="../تواصل/" class="btn btn-ghost"><i class="fa-solid fa-paper-plane"></i> تواصل معي</a>
            </div>
            <div class="hero-tech">
                <span>PHP</span><span>MySQL</span><span>JavaScript</span><span>Linux</span><span>CCNA</span><span>CEH</span>
            </div>
        </div>
        <div class="hero-visual">
            <div class="code-card" id="codeCard">
                <div class="code-card-head">
                    <span class="dot red"></span><span class="dot yellow"></span><span class="dot green"></span>
                    <span class="code-card-title">network-audit.php</span>
                </div>
                <div class="code-card-body">
                    <pre><code><span class="c-kw">function</span> <span class="c-fn">secureNetwork</span>(<span class="c-var">$network</span>) {
    <span class="c-kw">foreach</span> (<span class="c-var">$network</span> <span class="c-kw">as</span> <span class="c-var">$device</span>) {
        <span class="c-fn">applyFirewall</span>(<span class="c-var">$device</span>);
        <span class="c-fn">enableEncryption</span>(<span class="c-var">$device</span>);
        <span class="c-fn">runPenTest</span>(<span class="c-var">$device</span>);
    }
    <span class="c-kw">return</span> <span class="c-str">'Network SECURED ✓'</span>;
}</code></pre>
                </div>
                <div class="code-card-status"><span class="pulse-dot"></span> Status: <span class="c-ok">All Systems Protected</span></div>
            </div>
            <div class="hero-orbit">
                <span class="orbit-ring r1"></span><span class="orbit-ring r2"></span>
                <div class="orbit-core"><i class="fa-solid fa-shield-halved"></i></div>
            </div>
            <div class="float-chip chip-1"><i class="fa-solid fa-lock"></i> AES-256</div>
            <div class="float-chip chip-2"><i class="fa-solid fa-network-wired"></i> 99.9% Uptime</div>
            <div class="float-chip chip-3"><i class="fa-solid fa-bug-slash"></i> Zero Critical</div>
        </div>
    </div>
    <div class="hero-scroll"><a href="#stats"><span></span></a></div>
</section>
@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan | Icommits')

@push('styles')
<style>
    /* ===== 404 Page Styles ===== */
    .error-page {
        min-height: 75vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 60px 24px;
        text-align: center;
        overflow: hidden;
        position: relative;
        background: #f4f7f6;
    }

    /* ===== Soft Animated Background ===== */
    .error-bg-pattern {
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(circle at 20% 50%, rgba(0, 107, 76, 0.04) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(0, 166, 118, 0.04) 0%, transparent 50%),
            radial-gradient(circle at 50% 80%, rgba(0, 107, 76, 0.03) 0%, transparent 50%);
        z-index: 0;
    }

    /* Soft gradient blobs */
    .error-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.25;
        z-index: 0;
        animation: errorBlobFloat 10s ease-in-out infinite;
    }

    .error-blob-1 {
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, #b8e6d4, transparent 70%);
        top: -150px;
        right: -120px;
        animation-delay: 0s;
    }

    .error-blob-2 {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, #c3eedd, transparent 70%);
        bottom: -100px;
        left: -100px;
        animation-delay: -4s;
    }

    .error-blob-3 {
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, #d4f0e4, transparent 70%);
        top: 40%;
        left: 60%;
        animation-delay: -7s;
    }

    @keyframes errorBlobFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(20px, -15px) scale(1.04); }
        66% { transform: translate(-15px, 10px) scale(0.96); }
    }

    /* Floating particles */
    .error-particles {
        position: absolute;
        inset: 0;
        z-index: 0;
        pointer-events: none;
    }

    .error-particle {
        position: absolute;
        border-radius: 50%;
        opacity: 0;
        animation: errorParticleFloat linear infinite;
    }

    @keyframes errorParticleFloat {
        0% {
            opacity: 0;
            transform: translateY(100%) scale(0);
        }
        10% { opacity: 0.35; }
        90% { opacity: 0.35; }
        100% {
            opacity: 0;
            transform: translateY(-100%) scale(1);
        }
    }

    /* ===== Card ===== */
    .error-card {
        background: #ffffff;
        border-radius: 28px;
        padding: 60px 48px;
        max-width: 560px;
        width: 100%;
        position: relative;
        z-index: 10;
        box-shadow:
            0 4px 6px rgba(0, 0, 0, 0.02),
            0 12px 40px rgba(0, 107, 76, 0.06);
        transition: transform 0.15s ease-out, box-shadow 0.3s ease;
        animation: errorCardAppear 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
        transform: translateY(40px);
        border: 1px solid rgba(0, 107, 76, 0.06);
    }

    .error-card:hover {
        box-shadow:
            0 4px 6px rgba(0, 0, 0, 0.02),
            0 20px 60px rgba(0, 107, 76, 0.1);
    }

    @keyframes errorCardAppear {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Shine effect on card */
    .error-card-shine {
        position: absolute;
        inset: 0;
        border-radius: 28px;
        overflow: hidden;
        pointer-events: none;
    }

    .error-card-shine::after {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        top: -50%;
        left: -50%;
        background: radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 50%), rgba(0, 107, 76, 0.04) 0%, transparent 50%);
        transition: opacity 0.3s;
        opacity: 0;
    }

    .error-card:hover .error-card-shine::after {
        opacity: 1;
    }

    /* ===== SVG Illustration ===== */
    .error-illustration {
        width: 160px;
        height: 160px;
        margin: 0 auto 28px;
        position: relative;
        cursor: pointer;
    }

    .error-illustration svg {
        width: 100%;
        height: 100%;
        transition: filter 0.3s;
    }

    .error-illustration:hover svg {
        filter: drop-shadow(0 4px 12px rgba(0, 107, 76, 0.15));
    }

    .error-illust-bg {
        position: absolute;
        inset: -10px;
        background: linear-gradient(135deg, #e8f5f0, #d4f0e4);
        border-radius: 50%;
        z-index: -1;
        animation: errorBgPulse 4s ease-in-out infinite;
    }

    @keyframes errorBgPulse {
        0%, 100% { transform: scale(1); opacity: 0.6; }
        50% { transform: scale(1.06); opacity: 0.9; }
    }

    /* SVG Animations */
    .error-face-circle {
        animation: errorFaceRotate 6s ease-in-out infinite;
        transform-origin: center;
    }

    @keyframes errorFaceRotate {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(3deg); }
        75% { transform: rotate(-3deg); }
    }

    .error-eye-left, .error-eye-right {
        animation: errorBlink 4s ease-in-out infinite;
        transform-origin: center;
    }

    .error-eye-right {
        animation-delay: 0.1s;
    }

    @keyframes errorBlink {
        0%, 42%, 48%, 100% { transform: scaleY(1); }
        45% { transform: scaleY(0.1); }
    }

    .error-mouth-sad {
        animation: errorMouthWobble 3s ease-in-out infinite;
        transform-origin: center;
    }

    @keyframes errorMouthWobble {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(2px); }
    }

    .error-sweat-drop {
        animation: errorSweatDrop 2.5s ease-in-out infinite;
        opacity: 0;
    }

    @keyframes errorSweatDrop {
        0%, 40% { opacity: 0; transform: translateY(-4px); }
        50% { opacity: 0.6; transform: translateY(0); }
        80% { opacity: 0.6; transform: translateY(6px); }
        100% { opacity: 0; transform: translateY(10px); }
    }

    .error-question-mark {
        animation: errorQuestionBounce 2s ease-in-out infinite;
        transform-origin: center;
    }

    @keyframes errorQuestionBounce {
        0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.4; }
        50% { transform: translateY(-6px) rotate(10deg); opacity: 0.8; }
    }

    .error-floating-shapes g {
        animation: errorShapesFloat 8s ease-in-out infinite;
        transform-origin: center;
    }

    .error-floating-shapes g:nth-child(2) { animation-delay: -2s; }
    .error-floating-shapes g:nth-child(3) { animation-delay: -4s; }

    @keyframes errorShapesFloat {
        0%, 100% { transform: translateY(0); opacity: 0.3; }
        50% { transform: translateY(-5px); opacity: 0.6; }
    }

    /* ===== Error Code ===== */
    .error-code-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 8px;
        animation: errorFadeSlideUp 0.8s 0.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .error-code {
        font-size: 6rem;
        font-weight: 900;
        background: linear-gradient(135deg, #006B4C, #00a676);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
        position: relative;
        letter-spacing: -3px;
        transition: transform 0.3s ease;
    }

    .error-code:hover {
        transform: scale(1.05);
    }

    .error-divider {
        width: 50px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #006B4C, transparent);
        border-radius: 99px;
        margin: 16px auto;
        animation: errorFadeSlideUp 0.8s 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards, errorDividerGlow 3s ease-in-out infinite;
        opacity: 0;
    }

    @keyframes errorDividerGlow {
        0%, 100% { width: 50px; opacity: 0.4; }
        50% { width: 70px; opacity: 0.7; }
    }

    .error-card h2 {
        font-size: 1.45rem;
        font-weight: 700;
        color: #1a2e27;
        margin-bottom: 10px;
        animation: errorFadeSlideUp 0.8s 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .error-card .error-desc {
        color: #7a9188;
        font-size: 0.95rem;
        line-height: 1.8;
        margin-bottom: 32px;
        animation: errorFadeSlideUp 0.8s 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    @keyframes errorFadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== Button ===== */
    .error-btn-wrapper {
        animation: errorFadeSlideUp 0.8s 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .error-btn {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #006B4C, #00a676);
        color: #ffffff;
        padding: 14px 32px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        overflow: hidden;
        border: none;
        cursor: pointer;
    }

    .error-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.18), transparent);
        opacity: 0;
        transition: opacity 0.3s;
    }

    .error-btn:hover::before {
        opacity: 1;
    }

    .error-btn:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow:
            0 8px 25px rgba(0, 107, 76, 0.3),
            0 2px 8px rgba(0, 107, 76, 0.15);
        color: #ffffff;
        text-decoration: none;
    }

    .error-btn:active {
        transform: translateY(-1px) scale(0.98);
    }

    /* Ripple effect */
    .error-btn .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.35);
        transform: scale(0);
        animation: errorRippleAnim 0.6s linear;
        pointer-events: none;
    }

    @keyframes errorRippleAnim {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    .error-btn-icon {
        display: inline-flex;
        transition: transform 0.3s ease;
    }

    .error-btn:hover .error-btn-icon {
        transform: translateX(-4px);
    }

    /* ===== Secondary Links ===== */
    .error-secondary-links {
        display: flex;
        gap: 24px;
        justify-content: center;
        margin-top: 24px;
        animation: errorFadeSlideUp 0.8s 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .error-secondary-links a {
        color: #5a9a84;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.25s;
        position: relative;
        padding: 6px 14px;
        border-radius: 8px;
        background: rgba(0, 107, 76, 0.04);
    }

    .error-secondary-links a:hover {
        color: #006B4C;
        background: rgba(0, 107, 76, 0.1);
        transform: translateY(-1px);
    }

    /* ===== Countdown Redirect ===== */
    .error-countdown {
        margin-top: 20px;
        font-size: 0.8rem;
        color: #94b3a8;
        animation: errorFadeSlideUp 0.8s 0.9s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        opacity: 0;
    }

    .error-countdown-number {
        display: inline-block;
        color: #006B4C;
        font-weight: 700;
        font-size: 0.95rem;
        min-width: 20px;
    }

    /* Progress bar */
    .error-progress-bar {
        width: 120px;
        height: 3px;
        background: rgba(0, 107, 76, 0.1);
        border-radius: 99px;
        margin: 10px auto 0;
        overflow: hidden;
    }

    .error-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #006B4C, #00a676);
        border-radius: 99px;
        width: 0%;
        transition: width 1s linear;
    }

    /* ===== Cursor dot ===== */
    .error-trail-dot {
        position: fixed;
        width: 8px;
        height: 8px;
        background: rgba(0, 107, 76, 0.3);
        border-radius: 50%;
        pointer-events: none;
        z-index: 999;
        opacity: 0;
        transition: opacity 0.3s;
    }

    /* ===== Responsive ===== */
    @media (max-width: 640px) {
        .error-card {
            padding: 44px 28px;
            border-radius: 20px;
        }

        .error-code {
            font-size: 4.5rem;
        }

        .error-card h2 {
            font-size: 1.25rem;
        }

        .error-illustration {
            width: 130px;
            height: 130px;
        }

        .error-secondary-links {
            flex-direction: column;
            gap: 10px;
        }

        .error-blob { opacity: 0.15; }
    }
</style>
@endpush

@section('content')
<section class="error-page">
    <!-- Soft Background -->
    <div class="error-bg-pattern"></div>
    <div class="error-blob error-blob-1"></div>
    <div class="error-blob error-blob-2"></div>
    <div class="error-blob error-blob-3"></div>

    <!-- Floating Particles -->
    <div class="error-particles" id="errorParticles"></div>

    <!-- Mouse Trail -->
    <div class="error-trail-dot" id="errorTrailDot"></div>

    <!-- Main Card -->
    <div class="error-card" id="errorCard">
        <div class="error-card-shine" id="errorCardShine"></div>

        <!-- Animated SVG Illustration -->
        <div class="error-illustration" id="errorIllustration">
            <div class="error-illust-bg"></div>
            <svg viewBox="0 0 140 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Floating small shapes around -->
                <g class="error-floating-shapes">
                    <g><circle cx="15" cy="25" r="3" fill="#b8e6d4"/></g>
                    <g><rect x="120" y="18" width="6" height="6" rx="1.5" fill="#c3eedd" transform="rotate(20 123 21)"/></g>
                    <g><polygon points="12,110 16,102 20,110" fill="#d4f0e4"/></g>
                </g>

                <!-- Main face circle -->
                <g class="error-face-circle">
                    <circle cx="70" cy="70" r="50" stroke="#006B4C" stroke-width="2.5" fill="#e8f5f0"/>
                    <circle cx="70" cy="70" r="50" stroke="#006B4C" stroke-width="0.8" stroke-dasharray="6 8" opacity="0.15"/>
                </g>

                <!-- Worried eyebrows -->
                <path d="M48 50 Q55 44 62 52" stroke="#006B4C" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.5"/>
                <path d="M78 52 Q85 44 92 50" stroke="#006B4C" stroke-width="2" stroke-linecap="round" fill="none" opacity="0.5"/>

                <!-- Eyes -->
                <g class="error-eye-left">
                    <circle cx="54" cy="63" r="5.5" fill="#006B4C"/>
                    <circle cx="55.5" cy="62" r="2" fill="#ffffff"/>
                </g>
                <g class="error-eye-right">
                    <circle cx="86" cy="63" r="5.5" fill="#006B4C"/>
                    <circle cx="87.5" cy="62" r="2" fill="#ffffff"/>
                </g>

                <!-- Sad mouth -->
                <path class="error-mouth-sad" d="M56 88 Q70 78 84 88" stroke="#006B4C" stroke-width="2.5" stroke-linecap="round" fill="none"/>

                <!-- Sweat drop -->
                <path class="error-sweat-drop" d="M98 54 Q100 60 98 64 Q96 60 98 54Z" fill="#7ac4ad" opacity="0.5"/>

                <!-- Question mark -->
                <g class="error-question-mark">
                    <text x="108" y="38" font-family="Poppins" font-weight="700" font-size="16" fill="#006B4C" opacity="0.35">?</text>
                </g>
            </svg>
        </div>

        <!-- Error Code -->
        <div class="error-code-wrapper">
            <div class="error-code" id="errorCodeText">404</div>
        </div>

        <div class="error-divider"></div>

        <h2>Halaman Tidak Ditemukan</h2>
        <p class="error-desc">Oops! Halaman yang kamu cari tidak tersedia.<br>Mungkin sudah dipindahkan atau URL-nya salah.</p>

        <div class="error-btn-wrapper">
            <a href="javascript:history.back()" class="error-btn" id="errorMainBtn">
                <span class="error-btn-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                </span>
                Kembali ke Halaman Sebelumnya
            </a>
        </div>

        <div class="error-secondary-links">
            <a href="/">🏠 Beranda</a>
            <a href="/contact">📩 Hubungi Kami</a>
        </div>

        <!-- Auto redirect countdown -->
        <div class="error-countdown">
            Redirect otomatis dalam <span class="error-countdown-number" id="errorCountdown">15</span> detik
            <div class="error-progress-bar">
                <div class="error-progress-fill" id="errorProgressFill"></div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // ===== Floating Particles =====
    (function createParticles() {
        const container = document.getElementById('errorParticles');
        if (!container) return;
        const count = 20;

        for (let i = 0; i < count; i++) {
            const particle = document.createElement('div');
            particle.className = 'error-particle';
            const size = Math.random() * 5 + 2;
            particle.style.width = size + 'px';
            particle.style.height = size + 'px';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDuration = (Math.random() * 10 + 8) + 's';
            particle.style.animationDelay = (Math.random() * 12) + 's';

            // Soft pastel greens
            const colors = ['#b8e6d4', '#c3eedd', '#a8d9c4', '#d4f0e4', '#006B4C'];
            particle.style.background = colors[Math.floor(Math.random() * colors.length)];

            container.appendChild(particle);
        }
    })();

    // ===== Interactive Card Tilt =====
    const errorCard = document.getElementById('errorCard');
    const errorCardShine = document.getElementById('errorCardShine');

    if (errorCard) {
        errorCard.addEventListener('mousemove', (e) => {
            const rect = errorCard.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * -4;
            const rotateY = ((x - centerX) / centerX) * 4;

            errorCard.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;

            // Update shine position
            const percentX = (x / rect.width) * 100;
            const percentY = (y / rect.height) * 100;
            errorCardShine.style.setProperty('--mouse-x', percentX + '%');
            errorCardShine.style.setProperty('--mouse-y', percentY + '%');
        });

        errorCard.addEventListener('mouseleave', () => {
            errorCard.style.transform = 'perspective(800px) rotateX(0deg) rotateY(0deg)';
        });
    }

    // ===== Button Ripple Effect =====
    const errorMainBtn = document.getElementById('errorMainBtn');
    if (errorMainBtn) {
        errorMainBtn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
            ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    }

    // ===== Mouse Trail Effect =====
    const errorTrailDot = document.getElementById('errorTrailDot');
    let errorMouseX = 0, errorMouseY = 0;
    let errorDotX = 0, errorDotY = 0;

    document.addEventListener('mousemove', (e) => {
        errorMouseX = e.clientX;
        errorMouseY = e.clientY;
        if (errorTrailDot) errorTrailDot.style.opacity = '0.4';
    });

    document.addEventListener('mouseleave', () => {
        if (errorTrailDot) errorTrailDot.style.opacity = '0';
    });

    function animateErrorTrail() {
        errorDotX += (errorMouseX - errorDotX) * 0.12;
        errorDotY += (errorMouseY - errorDotY) * 0.12;
        if (errorTrailDot) {
            errorTrailDot.style.left = errorDotX + 'px';
            errorTrailDot.style.top = errorDotY + 'px';
        }
        requestAnimationFrame(animateErrorTrail);
    }
    animateErrorTrail();

    // ===== Illustration Click Reaction =====
    const errorIllustration = document.getElementById('errorIllustration');
    if (errorIllustration) {
        errorIllustration.addEventListener('click', () => {
            errorIllustration.style.transition = 'transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
            errorIllustration.style.transform = 'scale(1.15) rotate(8deg)';
            setTimeout(() => {
                errorIllustration.style.transform = 'scale(1) rotate(0deg)';
            }, 400);
        });
    }

    // ===== Countdown & Progress =====
    let errorSeconds = 15;
    const errorCountdownEl = document.getElementById('errorCountdown');
    const errorProgressFill = document.getElementById('errorProgressFill');
    const errorTotalSeconds = errorSeconds;

    function updateErrorCountdown() {
        if (errorSeconds <= 0) {
            window.location.href = '/';
            return;
        }
        errorSeconds--;
        if (errorCountdownEl) errorCountdownEl.textContent = errorSeconds;

        const progress = ((errorTotalSeconds - errorSeconds) / errorTotalSeconds) * 100;
        if (errorProgressFill) errorProgressFill.style.width = progress + '%';
    }

    setInterval(updateErrorCountdown, 1000);

    // ===== Error Code Hover =====
    const errorCodeText = document.getElementById('errorCodeText');
    if (errorCodeText) {
        errorCodeText.addEventListener('mouseenter', () => {
            errorCodeText.style.transition = 'letter-spacing 0.3s ease, transform 0.3s ease';
            errorCodeText.style.letterSpacing = '6px';
        });

        errorCodeText.addEventListener('mouseleave', () => {
            errorCodeText.style.letterSpacing = '-3px';
        });
    }
</script>
@endpush

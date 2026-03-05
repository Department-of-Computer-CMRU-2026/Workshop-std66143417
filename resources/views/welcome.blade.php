<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senior-to-Junior Workshop 2026</title>
    <meta name="description" content="งาน Senior-to-Junior Workshop โดยนักศึกษารุ่นพี่ถ่ายทอดความรู้สู่รุ่นน้อง เลือก Workshop ที่คุณสนใจและลงทะเบียน">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #060811;
            --bg-card: #0d1117;
            --bg-card2: #111827;
            --border: rgba(255,255,255,0.08);
            --border-hover: rgba(99,102,241,0.6);
            --accent: #6366f1;
            --accent2: #818cf8;
            --accent-glow: rgba(99,102,241,0.3);
            --gold: #f59e0b;
            --gold-light: #fbbf24;
            --text: #f1f5f9;
            --text-muted: #94a3b8;
            --text-dim: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --radius: 16px;
            --radius-sm: 10px;
            --shadow: 0 25px 50px -12px rgba(0,0,0,0.8);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Outfit', 'Sarabun', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Background decoration */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -20%;
            width: 80%;
            height: 80%;
            background: radial-gradient(ellipse, rgba(99,102,241,0.12) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }
        body::after {
            content: '';
            position: fixed;
            bottom: -30%;
            right: -10%;
            width: 60%;
            height: 60%;
            background: radial-gradient(ellipse, rgba(245,158,11,0.08) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(6,8,17,0.85);
            border-bottom: 1px solid var(--border);
        }
        .navbar-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--accent), var(--gold));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }
        .brand-text { line-height: 1.2; }
        .brand-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
        }
        .brand-sub {
            font-size: 11px;
            color: var(--text-muted);
            font-weight: 400;
        }
        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .nav-link {
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-muted);
            transition: all 0.2s;
        }
        .nav-link:hover { color: var(--text); background: rgba(255,255,255,0.06); }
        .btn-nav-primary {
            padding: 8px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            background: linear-gradient(135deg, var(--accent), #4f46e5);
            color: #fff;
            transition: all 0.2s;
            box-shadow: 0 0 20px var(--accent-glow);
        }
        .btn-nav-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 0 30px var(--accent-glow);
        }
        .nav-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--gold));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            color: white;
            flex-shrink: 0;
        }
        .user-name { font-size: 14px; font-weight: 500; }

        /* ===== ALERTS ===== */
        .alert-container {
            max-width: 1200px;
            margin: 16px auto 0;
            padding: 0 24px;
        }
        .alert {
            padding: 14px 20px;
            border-radius: var(--radius-sm);
            font-size: 14px;
            font-weight: 500;
            border: 1px solid;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.3s ease;
        }
        @keyframes slideIn {
            from { transform: translateY(-10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .alert-success {
            background: rgba(16,185,129,0.1);
            border-color: rgba(16,185,129,0.3);
            color: #34d399;
        }
        .alert-error {
            background: rgba(239,68,68,0.1);
            border-color: rgba(239,68,68,0.3);
            color: #fc8181;
        }

        /* ===== HERO ===== */
        .hero {
            position: relative;
            z-index: 1;
            padding: 80px 24px 60px;
            text-align: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(99,102,241,0.15);
            border: 1px solid rgba(99,102,241,0.3);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 13px;
            font-weight: 600;
            color: var(--accent2);
            margin-bottom: 28px;
            letter-spacing: 0.5px;
        }
        .hero-badge::before {
            content: '';
            width: 8px; height: 8px;
            border-radius: 50%;
            background: var(--accent2);
            animation: pulse 2s ease infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.85); }
        }
        .hero h1 {
            font-size: clamp(36px, 6vw, 72px);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #fff 0%, #c7d2fe 50%, var(--gold-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero-sub {
            font-size: clamp(16px, 2vw, 22px);
            color: var(--text-muted);
            font-weight: 400;
            margin-bottom: 10px;
        }
        .hero-desc {
            font-size: 15px;
            color: var(--text-dim);
            max-width: 560px;
            margin: 0 auto 40px;
            line-height: 1.7;
        }
        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 48px;
            flex-wrap: wrap;
            margin-bottom: 48px;
        }
        .stat-item { text-align: center; }
        .stat-num {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, var(--accent2), var(--gold-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin-bottom: 4px;
        }
        .stat-label { font-size: 13px; color: var(--text-dim); font-weight: 500; }
        .hero-actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            flex-wrap: wrap;
        }
        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 32px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--accent) 0%, #4f46e5 100%);
            color: white;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.25s;
            box-shadow: 0 0 40px var(--accent-glow);
        }
        .btn-hero-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 60px var(--accent-glow), 0 20px 40px rgba(0,0,0,0.4);
        }
        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 32px;
            border-radius: 12px;
            background: rgba(255,255,255,0.05);
            color: var(--text-muted);
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            border: 1px solid var(--border);
            transition: all 0.25s;
        }
        .btn-hero-secondary:hover {
            background: rgba(255,255,255,0.09);
            color: var(--text);
            border-color: rgba(255,255,255,0.15);
        }

        /* ===== DIVIDER ===== */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, var(--border) 50%, transparent 100%);
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ===== EVENTS SECTION ===== */
        .events-section {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 24px 80px;
        }
        .section-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 36px;
            flex-wrap: wrap;
            gap: 16px;
        }
        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text);
        }
        .section-title span {
            background: linear-gradient(135deg, var(--accent2), var(--gold-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .section-subtitle { font-size: 14px; color: var(--text-dim); margin-top: 4px; }

        /* ===== EVENTS GRID ===== */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 24px;
        }

        /* ===== EVENT CARD ===== */
        .event-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .event-card:hover {
            transform: translateY(-4px);
            border-color: var(--border-hover);
            box-shadow: 0 0 40px rgba(99,102,241,0.15), var(--shadow);
        }
        .card-accent-bar {
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--gold));
        }
        .card-body {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .card-header-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 16px;
        }
        .card-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }
        .card-title {
            font-size: 17px;
            font-weight: 700;
            color: var(--text);
            line-height: 1.3;
            margin-bottom: 4px;
        }
        .card-meta {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
            flex: 1;
        }
        .card-meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--text-muted);
        }
        .card-meta-item .icon { font-size: 15px; flex-shrink: 0; }
        .seats-bar {
            margin-bottom: 20px;
        }
        .seats-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        .seats-text { font-size: 13px; color: var(--text-dim); }
        .seats-count { font-size: 13px; font-weight: 600; }
        .seats-count.ok { color: var(--success); }
        .seats-count.warning { color: var(--gold); }
        .seats-count.full { color: var(--danger); }
        .progress-track {
            height: 6px;
            background: rgba(255,255,255,0.08);
            border-radius: 3px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            border-radius: 3px;
            transition: width 0.6s ease;
        }
        .progress-fill.ok { background: linear-gradient(90deg, var(--success), #34d399); }
        .progress-fill.warning { background: linear-gradient(90deg, var(--gold), var(--gold-light)); }
        .progress-fill.full { background: linear-gradient(90deg, var(--danger), #fc8181); }
        .card-footer {
            padding: 0 24px 24px;
        }

        /* ===== BUTTONS ===== */
        .btn-register {
            display: block;
            width: 100%;
            padding: 13px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
            border: none;
            transition: all 0.25s;
            font-family: inherit;
        }
        .btn-register.primary {
            background: linear-gradient(135deg, var(--accent), #4f46e5);
            color: white;
            box-shadow: 0 4px 20px var(--accent-glow);
        }
        .btn-register.primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 30px var(--accent-glow);
        }
        .btn-register.registered {
            background: rgba(16,185,129,0.12);
            border: 1.5px solid rgba(16,185,129,0.4);
            color: var(--success);
            cursor: default;
        }
        .btn-register.full {
            background: rgba(239,68,68,0.08);
            border: 1.5px solid rgba(239,68,68,0.25);
            color: var(--danger);
            cursor: not-allowed;
            opacity: 0.7;
        }
        .btn-login {
            display: block;
            width: 100%;
            padding: 13px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            background: rgba(99,102,241,0.12);
            border: 1.5px solid rgba(99,102,241,0.35);
            color: var(--accent2);
            transition: all 0.25s;
        }
        .btn-login:hover {
            background: rgba(99,102,241,0.2);
            transform: translateY(-1px);
        }

        /* ===== BADGE ===== */
        .badge-registered {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(16,185,129,0.12);
            border: 1px solid rgba(16,185,129,0.3);
            color: var(--success);
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: var(--text-dim);
        }
        .empty-state .icon { font-size: 56px; margin-bottom: 16px; }
        .empty-state h3 { font-size: 20px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; }
        .empty-state p { font-size: 14px; }

        /* ===== FOOTER ===== */
        .footer {
            position: relative;
            z-index: 1;
            border-top: 1px solid var(--border);
            padding: 28px 24px;
            text-align: center;
        }
        .footer p { font-size: 13px; color: var(--text-dim); }
        .footer a { color: var(--accent2); text-decoration: none; }
        .footer a:hover { text-decoration: underline; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 640px) {
            .navbar-inner { padding: 0 16px; }
            .hero { padding: 56px 16px 40px; }
            .hero-stats { gap: 28px; }
            .events-section { padding: 40px 16px 60px; }
            .events-grid { grid-template-columns: 1fr; }
            .section-header { flex-direction: column; align-items: flex-start; }
        }

        /* ===== COLOR VARIANTS for card icons ===== */
        .icon-purple { background: rgba(99,102,241,0.15); }
        .icon-gold { background: rgba(245,158,11,0.15); }
        .icon-blue { background: rgba(59,130,246,0.15); }
        .icon-green { background: rgba(16,185,129,0.15); }
        .icon-red { background: rgba(239,68,68,0.15); }
        .icon-pink { background: rgba(236,72,153,0.15); }

        .card-num {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-dim);
            letter-spacing: 1px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar">
    <div class="navbar-inner">
        <a href="{{ route('home') }}" class="navbar-brand">
            <div class="brand-icon">🎓</div>
            <div class="brand-text">
                <div class="brand-title">Senior-to-Junior</div>
                <div class="brand-sub">Workshop 2026</div>
            </div>
        </a>
        <div class="navbar-nav">
            @auth
                @can('admin')
                    <a href="{{ route('admin.events.index') }}" class="nav-link" style="color: var(--gold); font-weight: 700; margin-right: 15px;">จัดการกิจกรรม</a>
                @endcan
                <div class="nav-user">
                    <div class="user-avatar">{{ auth()->user()->initials() }}</div>
                    <span class="user-name">{{ auth()->user()->name }}</span>
                </div>
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-link" style="background:none; border:none; cursor:pointer; font-family:inherit;">
                        ออกจากระบบ
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="nav-link">เข้าสู่ระบบ</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-nav-primary">สมัครสมาชิก</a>
                @endif
            @endauth
        </div>
    </div>
</nav>

<!-- ===== FLASH MESSAGES ===== -->
@if (session('success') || session('error'))
    <div class="alert-container">
        @if (session('success'))
            <div class="alert alert-success">
                <span>✅</span>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">
                <span>⚠️</span>
                {{ session('error') }}
            </div>
        @endif
    </div>
@endif

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="hero-badge">🔥 OPEN FOR REGISTRATION 2026</div>
    <h1>Senior-to-Junior<br>Workshop</h1>
    <p class="hero-sub">รุ่นพี่ถ่ายทอดความรู้ · รุ่นน้องเติบโต</p>
    <p class="hero-desc">
        เรียนรู้จากรุ่นพี่ที่มีประสบการณ์จริงในสาขาที่คุณสนใจ
        เลือก Workshop ที่ตรงกับความต้องการและลงทะเบียนได้เลย
        ที่นั่งมีจำกัด!
    </p>

    <div class="hero-stats">
        <div class="stat-item">
            <div class="stat-num">{{ $events->count() }}</div>
            <div class="stat-label">Workshop Sessions</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">{{ $events->sum('total_seats') }}</div>
            <div class="stat-label">ที่นั่งทั้งหมด</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">{{ $events->sum(fn($e) => $e->total_seats - $e->registrations_count) }}</div>
            <div class="stat-label">ที่นั่งคงเหลือ</div>
        </div>
    </div>

    <div class="hero-actions">
        <a href="#workshops" class="btn-hero-primary">
            🚀 ดู Workshop ทั้งหมด
        </a>
        @auth
            <a href="{{ route('dashboard') }}" class="btn-hero-secondary">
                📋 Workshop ของฉัน
            </a>
        @else
            <a href="{{ route('register') }}" class="btn-hero-secondary">
                ✨ สมัครสมาชิกฟรี
            </a>
        @endauth
    </div>
</section>

<div class="divider"></div>

<!-- ===== EVENTS SECTION ===== -->
<section class="events-section" id="workshops">
    <div class="section-header">
        <div>
            <h2 class="section-title">Workshop <span>Sessions</span></h2>
            <p class="section-subtitle">เลือก Workshop ที่คุณสนใจและลงทะเบียนได้เลย</p>
        </div>
        @auth
            <a href="{{ route('dashboard') }}" class="btn-hero-secondary" style="font-size:13px; padding:10px 20px;">
                📋 ดูการลงทะเบียนของฉัน
            </a>
        @endauth
    </div>

    @php
        $icons = ['💻', '🤖', '📱', '🔐', '☁️', '🎨'];
        $iconClasses = ['icon-purple', 'icon-gold', 'icon-blue', 'icon-red', 'icon-blue', 'icon-pink'];

        // Get IDs of events the user has registered for
        $registeredEventIds = auth()->check()
            ? auth()->user()->registrations()->pluck('event_id')->toArray()
            : [];

        // Get registration IDs for cancel button
        $registrationMap = auth()->check()
            ? auth()->user()->registrations()->pluck('id', 'event_id')->toArray()
            : [];
    @endphp

    @if ($events->isEmpty())
        <div class="empty-state">
            <div class="icon">📭</div>
            <h3>ยังไม่มี Workshop</h3>
            <p>กรุณารอการประกาศจากผู้จัดงาน</p>
        </div>
    @else
        <div class="events-grid">
            @foreach ($events as $index => $event)
                @php
                    $occupied = $event->registrations_count;
                    $percent = $event->total_seats > 0 ? ($occupied / $event->total_seats) * 100 : 0;
                    $available = $event->total_seats - $occupied;
                    $isFull = $available <= 0;
                    $isRegistered = in_array($event->id, $registeredEventIds);
                    $statusClass = $isFull ? 'full' : ($percent >= 70 ? 'warning' : 'ok');
                    $icon = $icons[$index % count($icons)];
                    $iconClass = $iconClasses[$index % count($iconClasses)];
                @endphp
                <div class="event-card">
                    <div class="card-accent-bar"></div>
                    <div class="card-body">
                        <div class="card-header-row">
                            <div>
                                <p class="card-num">Workshop #{{ str_pad($event->id, 2, '0', STR_PAD_LEFT) }}</p>
                                <h3 class="card-title">{{ $event->title }}</h3>
                            </div>
                            <div class="card-icon {{ $iconClass }}">{{ $icon }}</div>
                        </div>

                        @if ($isRegistered)
                            <div style="margin-bottom: 12px;">
                                <span class="badge-registered">✓ ลงทะเบียนแล้ว</span>
                            </div>
                        @endif

                        <div class="card-meta">
                            <div class="card-meta-item">
                                <span class="icon">🎤</span>
                                <span>{{ $event->speaker }}</span>
                            </div>
                            <div class="card-meta-item">
                                <span class="icon">📍</span>
                                <span>{{ $event->location }}</span>
                            </div>
                            <div class="card-meta-item">
                                <span class="icon">👥</span>
                                <span>ที่นั่งทั้งหมด {{ $event->total_seats }} ที่นั่ง</span>
                            </div>
                        </div>

                        <div class="seats-bar">
                            <div class="seats-info">
                                <span class="seats-text">ที่นั่งคงเหลือ</span>
                                <span class="seats-count {{ $statusClass }}">
                                    @if ($isFull)
                                        เต็มแล้ว
                                    @else
                                        {{ $available }} / {{ $event->total_seats }}
                                    @endif
                                </span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill {{ $statusClass }}" style="width: {{ min(100, $percent) }}%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        @auth
                            @if ($isRegistered)
                                <form method="POST" action="{{ route('registrations.destroy', $registrationMap[$event->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-register registered"
                                        onclick="return confirm('ยืนยันการยกเลิกลงทะเบียน?')">
                                        ✓ ลงทะเบียนแล้ว &nbsp;(คลิกเพื่อยกเลิก)
                                    </button>
                                </form>
                            @elseif ($isFull)
                                <button class="btn-register full" disabled>
                                    ❌ ที่นั่งเต็มแล้ว
                                </button>
                            @else
                                <form method="POST" action="{{ route('registrations.store') }}">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <button type="submit" class="btn-register primary">
                                        🎯 ลงทะเบียนเข้าร่วม
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}?redirect={{ route('home') }}" class="btn-login">
                                🔑 เข้าสู่ระบบเพื่อลงทะเบียน
                            </a>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer">
    <p>© 2026 Senior-to-Junior Workshop &nbsp;·&nbsp; Department of Computer Science &nbsp;·&nbsp;
        @auth
            <a href="{{ route('dashboard') }}">My Registrations</a>
        @else
            <a href="{{ route('login') }}">Login</a> · <a href="{{ route('register') }}">Register</a>
        @endauth
    </p>
</footer>

</body>
</html>

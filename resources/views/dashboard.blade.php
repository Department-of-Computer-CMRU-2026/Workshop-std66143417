
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Senior-to-Junior Workshop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg: #060811;
            --bg-card: #0d1117;
            --border: rgba(255,255,255,0.08);
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
        }
        body {
            font-family: 'Outfit', 'Sarabun', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }
        body::before {
            content: '';
            position: fixed;
            top: -40%;
            left: -10%;
            width: 70%;
            height: 70%;
            background: radial-gradient(ellipse, rgba(99,102,241,0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        /* NAVBAR */
        .navbar {
            position: sticky; top: 0; z-index: 100;
            backdrop-filter: blur(20px);
            background: rgba(6,8,17,0.85);
            border-bottom: 1px solid var(--border);
        }
        .navbar-inner {
            max-width: 1100px; margin: 0 auto; padding: 0 24px;
            height: 68px; display: flex; align-items: center; justify-content: space-between;
        }
        .navbar-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .brand-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, var(--accent), var(--gold));
            border-radius: 10px; display: flex; align-items: center; justify-content: center;
            font-size: 20px;
        }
        .brand-title { font-size: 15px; font-weight: 700; color: var(--text); line-height: 1.1; }
        .brand-sub { font-size: 11px; color: var(--text-muted); }
        .navbar-nav { display: flex; align-items: center; gap: 8px; }
        .nav-link {
            padding: 8px 16px; border-radius: 8px; text-decoration: none;
            font-size: 14px; font-weight: 500; color: var(--text-muted); transition: all 0.2s;
        }
        .nav-link:hover { color: var(--text); background: rgba(255,255,255,0.06); }
        .nav-link-btn {
            background: none; border: none; cursor: pointer; font-family: inherit;
        }
        .nav-active { color: var(--accent2) !important; }
        .user-avatar {
            width: 36px; height: 36px; border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--gold));
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700; color: white;
        }

        /* MAIN */
        .main {
            max-width: 1100px; margin: 0 auto; padding: 48px 24px 80px;
            position: relative; z-index: 1;
        }

        /* ALERTS */
        .alert { padding: 14px 20px; border-radius: var(--radius-sm); font-size: 14px; font-weight: 500;
            border: 1px solid; display: flex; align-items: center; gap: 10px; margin-bottom: 24px;
            animation: slideIn 0.3s ease; }
        @keyframes slideIn { from { transform: translateY(-10px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .alert-success { background: rgba(16,185,129,0.1); border-color: rgba(16,185,129,0.3); color: #34d399; }
        .alert-error { background: rgba(239,68,68,0.1); border-color: rgba(239,68,68,0.3); color: #fc8181; }

        /* WELCOME */
        .welcome-section { margin-bottom: 40px; }
        .welcome-greeting {
            font-size: 13px; font-weight: 600; color: var(--accent2);
            text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;
        }
        .welcome-name {
            font-size: 32px; font-weight: 800;
            background: linear-gradient(135deg, #fff, #c7d2fe);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
            margin-bottom: 6px;
        }
        .welcome-sub { font-size: 15px; color: var(--text-muted); }

        /* STATS ROW */
        .stats-row {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
            gap: 16px; margin-bottom: 40px;
        }
        .stat-card {
            background: var(--bg-card); border: 1px solid var(--border);
            border-radius: var(--radius-sm); padding: 20px 24px;
            display: flex; align-items: center; gap: 16px;
            transition: all 0.25s;
        }
        .stat-card:hover { border-color: rgba(99,102,241,0.35); transform: translateY(-2px); }
        .stat-icon { font-size: 28px; flex-shrink: 0; }
        .stat-card-num { font-size: 26px; font-weight: 800; color: var(--text); line-height: 1; margin-bottom: 3px; }
        .stat-card-label { font-size: 12px; color: var(--text-dim); font-weight: 500; }

        /* SECTION TITLE */
        .section-heading {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 24px; flex-wrap: wrap; gap: 12px;
        }
        .section-heading h2 {
            font-size: 22px; font-weight: 700;
        }
        .section-heading h2 span {
            background: linear-gradient(135deg, var(--accent2), var(--gold-light));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        .btn-browse {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 9px 18px; border-radius: 8px; text-decoration: none;
            background: rgba(99,102,241,0.12); border: 1px solid rgba(99,102,241,0.3);
            color: var(--accent2); font-size: 13px; font-weight: 600; transition: all 0.2s;
        }
        .btn-browse:hover { background: rgba(99,102,241,0.2); }

        /* REGISTRATION LIST */
        .reg-list { display: flex; flex-direction: column; gap: 16px; }
        .reg-card {
            background: var(--bg-card); border: 1px solid var(--border);
            border-radius: var(--radius-sm); padding: 20px 24px;
            display: flex; align-items: center; justify-content: space-between;
            gap: 16px; transition: all 0.25s;
        }
        .reg-card:hover { border-color: rgba(99,102,241,0.35); }
        .reg-left { display: flex; align-items: center; gap: 16px; flex: 1; min-width: 0; }
        .reg-num {
            width: 40px; height: 40px; border-radius: 10px; flex-shrink: 0;
            background: rgba(99,102,241,0.12); border: 1px solid rgba(99,102,241,0.2);
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700; color: var(--accent2);
        }
        .reg-info { min-width: 0; }
        .reg-title {
            font-size: 16px; font-weight: 700; color: var(--text);
            margin-bottom: 4px;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .reg-meta { display: flex; flex-wrap: wrap; gap: 16px; }
        .reg-meta-item { display: flex; align-items: center; gap: 5px; font-size: 13px; color: var(--text-muted); }
        .badge-ok {
            display: inline-flex; align-items: center; gap: 5px;
            background: rgba(16,185,129,0.12); border: 1px solid rgba(16,185,129,0.3);
            color: var(--success); font-size: 11px; font-weight: 700;
            padding: 4px 12px; border-radius: 50px; text-transform: uppercase; letter-spacing: 0.5px;
            flex-shrink: 0;
        }
        .btn-cancel {
            padding: 8px 16px; border-radius: 8px; border: 1px solid rgba(239,68,68,0.3);
            background: rgba(239,68,68,0.08); color: #fc8181; font-size: 13px; font-weight: 600;
            cursor: pointer; font-family: inherit; transition: all 0.2s; flex-shrink: 0;
        }
        .btn-cancel:hover { background: rgba(239,68,68,0.15); border-color: rgba(239,68,68,0.5); }

        /* EMPTY */
        .empty-state {
            text-align: center; padding: 64px 20px;
            background: var(--bg-card); border: 1px dashed var(--border); border-radius: var(--radius);
        }
        .empty-state .icon { font-size: 52px; margin-bottom: 16px; }
        .empty-state h3 { font-size: 20px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; }
        .empty-state p { font-size: 14px; color: var(--text-dim); margin-bottom: 24px; }
        .btn-go-browse {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 12px 28px; border-radius: 10px; text-decoration: none;
            background: linear-gradient(135deg, var(--accent), #4f46e5);
            color: white; font-size: 14px; font-weight: 700; transition: all 0.25s;
            box-shadow: 0 0 30px var(--accent-glow);
        }
        .btn-go-browse:hover { transform: translateY(-2px); box-shadow: 0 0 50px var(--accent-glow); }

        @media (max-width: 640px) {
            .main { padding: 32px 16px 60px; }
            .reg-card { flex-direction: column; align-items: flex-start; }
            .reg-left { width: 100%; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-inner">
        <a href="{{ route('home') }}" class="navbar-brand">
            <div class="brand-icon">🎓</div>
            <div>
                <div class="brand-title">Senior-to-Junior</div>
                <div class="brand-sub">Workshop 2026</div>
            </div>
        </a>
        <div class="navbar-nav">
            <a href="{{ route('home') }}" class="nav-link">หน้าหลัก</a>
            <a href="{{ route('dashboard') }}" class="nav-link nav-active">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="nav-link nav-link-btn">ออกจากระบบ</button>
            </form>
            <div class="user-avatar">{{ auth()->user()->initials() }}</div>
        </div>
    </div>
</nav>

<main class="main">

    <!-- ALERTS -->
    @if (session('success'))
        <div class="alert alert-success">✅ {{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">⚠️ {{ session('error') }}</div>
    @endif

    <!-- WELCOME -->
    <div class="welcome-section">
        <p class="welcome-greeting">👋 ยินดีต้อนรับกลับมา</p>
        <h1 class="welcome-name">{{ auth()->user()->name }}</h1>
        <p class="welcome-sub">ดูรายการ Workshop ที่คุณลงทะเบียนไว้ด้านล่าง</p>
    </div>

    @php
        $registrations = auth()->user()->registrations()->with('event')->latest()->get();
    @endphp

    <!-- STATS -->
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-icon">📋</div>
            <div>
                <div class="stat-card-num">{{ $registrations->count() }}</div>
                <div class="stat-card-label">Workshop ที่ลงทะเบียน</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">🪑</div>
            <div>
                <div class="stat-card-num">{{ \App\Models\Event::count() }}</div>
                <div class="stat-card-label">Workshop ทั้งหมด</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">✨</div>
            <div>
                <div class="stat-card-num">{{ \App\Models\Event::count() - $registrations->count() }}</div>
                <div class="stat-card-label">Workshop ที่ยังไม่ได้ลงทะเบียน</div>
            </div>
        </div>
    </div>

    <!-- REGISTRATIONS -->
    <div class="section-heading">
        <h2>Workshop <span>ของฉัน</span></h2>
        <a href="{{ route('home') }}" class="btn-browse">🔍 ดู Workshop ทั้งหมด</a>
    </div>

    @if ($registrations->isEmpty())
        <div class="empty-state">
            <div class="icon">📭</div>
            <h3>ยังไม่มีการลงทะเบียน</h3>
            <p>เลือก Workshop ที่คุณสนใจและลงทะเบียนได้เลย!</p>
            <a href="{{ route('home') }}" class="btn-go-browse">🚀 ดู Workshop ทั้งหมด</a>
        </div>
    @else
        <div class="reg-list">
            @foreach ($registrations as $i => $reg)
                <div class="reg-card">
                    <div class="reg-left">
                        <div class="reg-num">#{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        <div class="reg-info">
                            <div class="reg-title">{{ $reg->event->title }}</div>
                            <div class="reg-meta">
                                <span class="reg-meta-item">🎤 {{ $reg->event->speaker }}</span>
                                <span class="reg-meta-item">📍 {{ $reg->event->location }}</span>
                                <span class="reg-meta-item">🕐 ลงทะเบียนเมื่อ {{ $reg->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px; flex-shrink: 0;">
                        <span class="badge-ok">✓ Registered</span>
                        <form method="POST" action="{{ route('registrations.destroy', $reg) }}">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn-cancel"
                                onclick="return confirm('ยืนยันการยกเลิกการลงทะเบียน?')">
                                ยกเลิก
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</main>

</body>
</html>
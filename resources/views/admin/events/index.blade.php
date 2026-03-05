<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการกิจกรรม - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #0a0a0c;
            --bg-card: #16161a;
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --text-main: #ffffff;
            --text-muted: #94a3b8;
            --border: rgba(255, 255, 255, 0.1);
            --danger: #ef4444;
            --success: #10b981;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--bg-body);
            color: var(--text-main);
            font-family: 'Kanit', sans-serif;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
            margin: 0;
            background: linear-gradient(to right, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-add {
            background-color: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-add:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .card {
            background-color: var(--bg-card);
            border-radius: 16px;
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            padding: 16px 24px;
            background-color: rgba(255, 255, 255, 0.03);
            color: var(--text-muted);
            font-weight: 500;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .event-title {
            font-weight: 500;
            color: #fff;
            display: block;
            margin-bottom: 4px;
        }

        .event-speaker {
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 99px;
            font-size: 0.75rem;
            font-weight: 500;
            background-color: rgba(99, 102, 241, 0.1);
            color: var(--primary);
        }

        .actions {
            display: flex;
            gap: 12px;
        }

        .btn-edit {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: opacity 0.2s;
        }

        .btn-delete {
            color: var(--danger);
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            font-family: inherit;
        }

        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
            text-decoration: underline;
        }

        .nav-link {
            color: var(--text-muted);
            text-decoration: none;
            margin-right: 20px;
            font-size: 0.9rem;
        }

        .nav-link:hover {
            color: #fff;
        }

        .flash-message {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div style="margin-bottom: 20px;">
        <a href="{{ route('home') }}" class="nav-link">← กลับหน้าหลัก</a>
        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
    </div>

    @if(session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    <header>
        <div>
            <h1>จัดการกิจกรรม (Workshops)</h1>
            <p style="color: var(--text-muted); margin-top: 8px;">จัดการข้อมูลกิจกรรมทั้งหมดในระบบ</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="btn-add">
            <span>+ เพิ่มกิจกรรมใหม่</span>
        </a>
    </header>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>กิจกรรม</th>
                    <th>สถานที่</th>
                    <th>ที่นั่ง (จองแล้ว/ทั้งหมด)</th>
                    <th>ดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>
                            <span class="event-title">{{ $event->title }}</span>
                            <span class="event-speaker">วิทยากร: {{ $event->speaker }}</span>
                        </td>
                        <td>{{ $event->location }}</td>
                        <td>
                            <span class="badge">{{ $event->registrations_count }} / {{ $event->total_seats }}</span>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn-edit">แก้ไข</a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('ยืนยันการลบกิจกรรมนี้? ข้อมูลการลงทะเบียนจะถูกลบไปด้วย')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">ลบ</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 40px; color: var(--text-muted);">
                            ยังไม่มีกิจกรรมในระบบ
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

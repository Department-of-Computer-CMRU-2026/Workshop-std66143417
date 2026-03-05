<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายชื่อผู้ลงทะเบียน - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #0a0a0c;
            --bg-card: #16161a;
            --primary: #6366f1;
            --text-main: #ffffff;
            --text-muted: #94a3b8;
            --border: rgba(255, 255, 255, 0.1);
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
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        header {
            margin-bottom: 30px;
        }

        h1 {
            font-size: 1.8rem;
            margin: 0 0 10px 0;
            color: #fff;
        }

        .meta-info {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .card {
            background-color: var(--bg-card);
            border-radius: 12px;
            border: 1px solid var(--border);
            padding: 0;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .registrants-table {
            width: 100%;
            border-collapse: collapse;
        }

        .registrants-table th {
            text-align: left;
            padding: 15px 20px;
            background-color: rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid var(--border);
            color: var(--text-muted);
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .registrants-table td {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border);
        }

        .registrants-table tr:last-child td {
            border-bottom: none;
        }

        .user-name {
            font-weight: 500;
            color: #fff;
        }

        .user-email {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .nav-link {
            color: var(--text-muted);
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .nav-link:hover {
            color: #fff;
        }

        .empty-state {
            padding: 40px;
            text-align: center;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('admin.events.index') }}" class="nav-link">← กลับไปที่รายการกิจกรรม</a>

    <header>
        <h1>{{ $event->title }}</h1>
        <div class="meta-info">
            <div>วิทยากร: <strong>{{ $event->speaker }}</strong></div>
            <div>สถานที่: <strong>{{ $event->location }}</strong></div>
            <div>จำนวนผู้ลงทะเบียน: <strong>{{ $event->registrations->count() }} / {{ $event->total_seats }}</strong></div>
        </div>
    </header>

    <div class="card">
        <table class="registrants-table">
            <thead>
                <tr>
                    <th style="width: 60px;">#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อีเมล</th>
                    <th>ลงทะเบียนเมื่อ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($event->registrations as $index => $registration)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><span class="user-name">{{ $registration->user->name }}</span></td>
                        <td><span class="user-email">{{ $registration->user->email }}</span></td>
                        <td style="color: var(--text-muted); font-size: 0.85rem;">
                            {{ $registration->created_at->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">
                            ยังไม่มีผู้ลงทะเบียนสำหรับกิจกรรมนี้
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

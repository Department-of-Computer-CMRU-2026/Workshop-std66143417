<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>แก้ไขกิจกรรม - Admin</title>
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
            --input-bg: #1e1e24;
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
            margin-bottom: 32px;
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 600;
            margin: 0;
        }

        .card {
            background-color: var(--bg-card);
            border-radius: 20px;
            border: 1px solid var(--border);
            padding: 32px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            background-color: var(--input-bg);
            border: 1px solid var(--border);
            border-radius: 10px;
            color: #fff;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.2s;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .btn-submit {
            background-color: var(--primary);
            color: white;
            padding: 14px 24px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.2s;
            width: 100%;
            font-family: inherit;
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        .btn-back {
            color: var(--text-muted);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .btn-back:hover {
            color: #fff;
        }

        .error-list {
            background-color: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--danger);
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 24px;
            font-size: 0.9rem;
        }

        .error-list ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('admin.events.index') }}" class="btn-back">← ยกเลิกและกลับหน้าจัดการ</a>

    <header>
        <h1>แก้ไขกิจกรรม</h1>
        <p style="color: var(--text-muted); margin-top: 8px;">แก้ไขรายละเอียดของกิจกรรม workshop</p>
    </header>

    @if ($errors->any())
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form action="{{ route('admin.events.update', $event) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">หัวข้อกิจกรรม</label>
                <input type="text" id="title" name="title" value="{{ old('title', $event->title) }}" placeholder="เช่น AI for Beginners" required>
            </div>

            <div class="form-group">
                <label for="speaker">วิทยากร</label>
                <input type="text" id="speaker" name="speaker" value="{{ old('speaker', $event->speaker) }}" placeholder="ชื่อ-นามสกุล วิทยากร" required>
            </div>

            <div class="form-group">
                <label for="location">สถานที่</label>
                <input type="text" id="location" name="location" value="{{ old('location', $event->location) }}" placeholder="เช่น ห้องประชุม ชั้น 2" required>
            </div>

            <div class="form-group">
                <label for="total_seats">จำนวนที่นั่งทั้งหมด</label>
                <input type="number" id="total_seats" name="total_seats" value="{{ old('total_seats', $event->total_seats) }}" min="1" required>
                <small style="color: var(--text-muted); display: block; margin-top: 8px;">
                    * ปัจจุบันมีการลงทะเบียนแล้ว {{ $event->registrations()->count() }} ที่นั่ง
                </small>
            </div>

            <button type="submit" class="btn-submit">บันทึกการแก้ไข</button>
        </form>
    </div>
</div>

</body>
</html>

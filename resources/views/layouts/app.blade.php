<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sena Store')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root{
            --accent:#4a76e2;
            --accent-2:#345dcc;
            --muted:#6b7280;
            --bg:#eef3f8;
            --card:#ffffff;
            --danger:#dc3545;
        }

        body {
            background: linear-gradient(to bottom, #f0f4f8 0%, #d9e2ec 100%);
            background-attachment: fixed;
            margin: 0;
            font-family: 'Poppins', Arial, sans-serif;
            color: #111827;
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: var(--accent);
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 8px 20px rgba(19, 41, 75, 0.15);
            position: sticky;
            top: 0;
            z-index: 20;
            min-height: 70px;
        }

        .navbar h2 { margin: 0; font-weight:700; font-size:24px; letter-spacing: -0.5px; }

        .nav-links { display: flex; align-items: center; gap: 0; }

        .nav-links a { 
            margin-left: 30px; 
            color: white; 
            text-decoration: none; 
            font-weight:700; 
            font-size:18px;
            transition: all .2s ease;
            padding: 12px 20px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links a:hover { 
            background: rgba(255,255,255,0.25);
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
        }

        .profile-container {
            display: flex;
            align-items: center;
            gap: 16px;
            padding-left: 20px;
            border-left: 2px solid rgba(255,255,255,0.2);
        }

        .profile-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            border: 2px solid rgba(255,255,255,0.4);
            cursor: pointer;
            transition: all .2s ease;
        }

        .profile-avatar:hover {
            background: rgba(255,255,255,0.35);
            transform: scale(1.1);
        }

        .profile-name {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-name p {
            margin: 0;
            font-size: 13px;
            opacity: 0.85;
        }

        .profile-name strong {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        /* BOX / CONTAINER - MAX WIDTH DITINGKATKAN */
        .box {
            max-width: 1200px; /* Diubah dari 1400px, lebih realistis */
            margin: 40px auto;
            padding: 36px; /* Disesuaikan agar konsisten */
            background: var(--card); 
            border-radius: 15px;
            text-align: left;
            box-shadow: 0 10px 30px rgba(16,24,40,0.08);
            position: relative;
            overflow: hidden;
            z-index: 1; /* Diperlukan agar konten di atas box::before */
            min-height: 500px;
        }

        .center { text-align:center }

        /* GENERIC BUTTONS */
        .btn { padding: 10px 18px; display:inline-block; border-radius:8px; margin-top:12px; text-decoration:none; font-weight:600; font-size:14px; transition:all .12s ease }
        .btn-blue { background:var(--accent); color:white; box-shadow:0 6px 18px rgba(74,118,226,0.12); border:none }
        .btn-blue:hover { background:var(--accent-2); transform:translateY(-2px) }
        .btn-red { background:var(--danger); color:white }
        .btn-red:hover { opacity:.95 }

        /* Product specific */
        .btn-add { background:var(--accent); color:white; padding:8px 14px; text-decoration:none; border-radius:8px; font-weight:600; display:inline-block; transition:background .12s ease }
        .btn-add:hover { background:var(--accent-2) }

        .table-wrap{ overflow:auto; }
        table { width:100%; border-collapse: collapse; margin-top:18px; font-size:14px }
        table th { background:#f6f9ff; text-align:center; padding:12px }
        table, th, td { border-bottom:1px solid #eef2f7 }
        tbody tr:nth-child(odd){ background: #ffffff }
        tbody tr:nth-child(even){ background:#fbfdff }
        td { padding:12px; vertical-align:middle }
        tbody tr:hover { background:#f1f7ff }

        .btn-edit { background:#ffd54a;color:#111;padding:8px 12px;border-radius:6px;text-decoration:none;display:inline-block; transition:opacity .12s ease }
        .btn-edit:hover{ opacity:.95 }

        .btn-delete { background:var(--danger); color:#fff; padding:8px 12px; border-radius:6px; border:none; cursor:pointer; transition:opacity .12s ease }
        .btn-delete:hover{ opacity:.95 }

        /* Forms */
        label { font-weight:600; display:block; margin-bottom:6px; color:var(--muted) }
        input, textarea, select { width:100%; padding:12px;border:1px solid #e6e9ef;border-radius:10px;margin-bottom:16px;transition:box-shadow .12s ease,border-color .12s ease; box-sizing: border-box; }
        input:focus, textarea:focus, select:focus{ outline:none; box-shadow:0 6px 18px rgba(74,118,226,0.12); border-color:var(--accent) }

        /* Flash messages */
        .flash-success { background:#e6f4ea;color:#0f5132;padding:12px;border-radius:10px;margin-bottom:16px; border: 1px solid #d1e7dd }
        .flash-error { background:#fdecea;color:#7b2a2a;padding:12px;border-radius:10px;margin-bottom:16px; border: 1px solid #f5c6cb }

        /* responsive tweaks */
        @media (max-width:1250px){ /* Tambahkan breakpoint untuk mengatasi lebar 1200px */
            .box{ margin:20px; padding:20px }
        }
        @media (max-width:720px){
            .nav-links{ display:none }
            .navbar h2{ font-size:16px }
            table{ font-size:13px }
            .profile-container{ display: none; }
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <div class="navbar">
        <h2 style="margin:0">@yield('nav-title', 'Sena Store')</h2>
        
        <div class="nav-links">
            <a href="/dashboard">🏠 Home</a>
            <a href="{{ route('products.index') }}">📦 Produk</a>
            
            <div class="profile-container">
                <div class="profile-avatar" title="Profile">
                    {{ substr(session('user_name', 'U'), 0, 1) }}
                </div>
                <div class="profile-name">
                    <p>Welcome</p>
                    <strong>{{ session('user_name', 'User') }}</strong>
                </div>
                <a href="/logout" style="margin-left: 20px !important; background: rgba(255,255,255,0.2); padding: 8px 14px !important;">🚪 Logout</a>
            </div>
        </div>
    </div>

    {{-- KONTEN UTAMA --}}
    <div class="box">
        
        {{-- BLADE FLASH MESSAGES (Asumsi Laravel Session) --}}
        @if(session('success'))
            <div class="flash-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="flash-error">
                <ul style="margin:0;padding-left:18px">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- AREA UNTUK VIEW SPESIFIK --}}
        @yield('content')
        
    </div>

</body>
</html>
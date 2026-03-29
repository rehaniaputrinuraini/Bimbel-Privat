<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Bimbel Privat</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&family=Caveat:wght@700&display=swap" rel="stylesheet">
</head>
<body>

    @include('layouts.sidebar_custom')

    <div style="flex: 1; display: flex; flex-direction: column;">
        <header style="background: white; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee;">
            <i class="fas fa-bars" style="color: #999; cursor: pointer;"></i>
            <h1 style="font-family: 'Caveat'; font-size: 32px; color: #6F2DA8; margin: 0;">Prestasi lebih baik</h1>
            <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-weight: 600; color: #666;">{{ Auth::user()->username }}</span>
                <div style="width: 40px; height: 40px; background: #E0CFFC; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #6F2DA8;">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </header>

        <main style="padding: 40px;">
            @yield('content')
        </main>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
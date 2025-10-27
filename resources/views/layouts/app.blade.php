<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DMMMSU CIT Enrollment System</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="/" class="nav-brand">University Management System</a>
            <div class="nav-links">
                <a href="/rooms" class="nav-link">Rooms</a>
                <a href="/subjects" class="nav-link">Subjects</a>
                <a href="/students" class="nav-link">Students</a>
                <a href="/overview" class="nav-link">Overview</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <div id="toast-container"></div>

    <footer>
        <p>Server Time: {{ date('h:i A T, F d, Y') }} - © 2025 DMMMSU CIT Enrollment System</p>
    </footer>

    <script>
        // Enhanced toast function
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.innerHTML = `
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="flex-grow: 1;">${message}</div>
                    <button onclick="this.parentElement.parentElement.remove()" style="background: none; border: none; cursor: pointer; font-size: 18px; color: var(--text-muted);">&times;</button>
                </div>
            `;
            
            container.appendChild(toast);
            
            // Trigger animation
            setTimeout(() => toast.classList.add('show'), 10);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 400);
            }, 5000);
        }

        // Show toast for session messages
        @if(session('success'))
            showToast('{{ session('success') }}');
        @endif
        @if(session('error'))
            showToast('{{ session('error') }}', 'error');
        @endif
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
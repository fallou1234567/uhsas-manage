<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Administration') — UHSAS
    </title>

    <link rel="icon" type="image/jpeg" href="{{ asset('asset/images/logo-uhsas.jpeg') }}">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {

            /* =========================
               UHSAS COLORS
            ========================= */

            --uhsas-green: #075B32;
            --uhsas-dark-green: #043D23;
            --uhsas-light-green: #0B7040;

            --uhsas-gold: #D6A52E;
            --uhsas-gold-light: #F0C85A;

            --uhsas-background: #F4F7F3;
            --uhsas-white: #FFFFFF;

            --uhsas-text: #1F2A23;
            --uhsas-muted: #718078;

            --uhsas-border: #E4EAE5;

            --sidebar-width: 260px;
            --topbar-height: 76px;

        }


        /* =========================
           RESET
        ========================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {

            min-height: 100vh;

            background: var(--uhsas-background);

            color: var(--uhsas-text);

            font-family:
                'Inter',
                Arial,
                Helvetica,
                sans-serif;

            font-size: 14px;

        }


        button,
        input,
        select,
        textarea {

            font-family: inherit;

        }


        a {
            text-decoration: none;
            color: inherit;
        }


        /* =========================
           ADMIN WRAPPER
        ========================= */

        .admin-wrapper {

            min-height: 100vh;

            display: flex;

        }


        /* =========================
           SIDEBAR
        ========================= */

        .admin-sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: var(--sidebar-width);
            height: 100vh;

            z-index: 1000;

            display: flex;
            flex-direction: column;

            background:
                linear-gradient(180deg,
                    var(--uhsas-dark-green) 0%,
                    var(--uhsas-green) 100%);

            color: white;

            overflow-y: auto;

            transition:
                transform .3s ease,
                width .3s ease;

        }


        /* petit motif décoratif */

        .admin-sidebar::before {

            content: '';

            position: absolute;

            width: 240px;
            height: 240px;

            top: -130px;
            right: -130px;

            border-radius: 50%;

            border: 1px solid rgba(240, 200, 90, .12);

            pointer-events: none;

        }


        .admin-sidebar::after {

            content: '';

            position: absolute;

            width: 180px;
            height: 180px;

            bottom: -100px;
            left: -100px;

            border-radius: 50%;

            border: 1px solid rgba(240, 200, 90, .10);

            pointer-events: none;

        }


        /* =========================
           BRAND
        ========================= */

        .sidebar-brand {

            position: relative;

            z-index: 2;

            height: 125px;

            padding: 22px 20px;

            display: flex;
            align-items: center;

            gap: 13px;

            border-bottom:
                1px solid rgba(255, 255, 255, .08);

        }


        .sidebar-logo {

            width: 62px;
            height: 62px;

            flex-shrink: 0;

            object-fit: contain;

            border-radius: 50%;

            background: white;

            padding: 4px;

        }


        .sidebar-brand-text {

            min-width: 0;

        }


        .sidebar-brand-title {

            font-size: 19px;

            font-weight: 800;

            letter-spacing: 1px;

            color: white;

        }


        .sidebar-brand-subtitle {

            margin-top: 4px;

            color:
                rgba(255, 255, 255, .60);

            font-size: 9px;

            font-weight: 600;

            letter-spacing: 1px;

            text-transform: uppercase;

            line-height: 1.4;

        }


        /* =========================
           NAVIGATION
        ========================= */

        .sidebar-navigation {

            position: relative;

            z-index: 2;

            flex: 1;

            padding: 22px 13px;

        }


        .sidebar-section-title {

            padding:
                0 13px 10px;

            color:
                rgba(255, 255, 255, .38);

            font-size: 9px;

            font-weight: 700;

            letter-spacing: 1.5px;

            text-transform: uppercase;

        }


        .sidebar-menu {

            list-style: none;

            display: flex;
            flex-direction: column;

            gap: 4px;

        }


        .sidebar-menu-item {
            list-style: none;
        }


        .sidebar-link {

            position: relative;

            min-height: 47px;

            padding: 0 13px;

            display: flex;

            align-items: center;

            gap: 12px;

            border-radius: 11px;

            color:
                rgba(255, 255, 255, .72);

            font-size: 13px;

            font-weight: 500;

            transition:
                background .2s ease,
                color .2s ease,
                transform .2s ease;

        }


        .sidebar-link:hover {

            color: white;

            background:
                rgba(255, 255, 255, .07);

            transform: translateX(2px);

        }


        .sidebar-link.active {

            color: white;

            background:
                rgba(255, 255, 255, .11);

            font-weight: 700;

            box-shadow:
                inset 0 0 0 1px rgba(255, 255, 255, .04);

        }


        .sidebar-link.active::before {

            content: '';

            position: absolute;

            left: 0;

            top: 9px;
            bottom: 9px;

            width: 3px;

            border-radius: 0 5px 5px 0;

            background: var(--uhsas-gold);

        }


        .sidebar-icon {

            width: 21px;
            height: 21px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            color:
                currentColor;

        }


        .sidebar-icon svg {

            width: 19px;
            height: 19px;

            stroke: currentColor;

        }


        .sidebar-link.active .sidebar-icon {

            color: var(--uhsas-gold-light);

        }


        /* =========================
           SIDEBAR BADGE
        ========================= */

        .sidebar-badge {

            margin-left: auto;

            min-width: 21px;
            height: 21px;

            padding: 0 6px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background:
                rgba(214, 165, 46, .18);

            color:
                var(--uhsas-gold-light);

            font-size: 9px;

            font-weight: 700;

        }


        /* =========================
           SIDEBAR FOOTER
        ========================= */

        .sidebar-footer {

            position: relative;

            z-index: 2;

            padding: 14px;

            border-top:
                1px solid rgba(255, 255, 255, .08);

        }


        .admin-profile {

            padding: 11px;

            display: flex;

            align-items: center;

            gap: 10px;

            border-radius: 12px;

            background:
                rgba(255, 255, 255, .06);

        }


        .admin-avatar {

            width: 37px;
            height: 37px;

            flex-shrink: 0;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            background:
                var(--uhsas-gold);

            color:
                var(--uhsas-dark-green);

            font-size: 13px;

            font-weight: 800;

        }


        .admin-profile-info {

            min-width: 0;

            flex: 1;

        }


        .admin-profile-name {

            color: white;

            font-size: 11px;

            font-weight: 700;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;

        }


        .admin-profile-role {

            margin-top: 3px;

            color:
                rgba(255, 255, 255, .45);

            font-size: 9px;

        }


        .logout-button {

            width: 34px;
            height: 34px;

            border: none;

            border-radius: 9px;

            display: flex;

            align-items: center;
            justify-content: center;

            cursor: pointer;

            background:
                rgba(255, 255, 255, .06);

            color:
                rgba(255, 255, 255, .65);

            transition: .2s ease;

        }


        .logout-button:hover {

            background:
                rgba(214, 165, 46, .15);

            color:
                var(--uhsas-gold-light);

        }


        .logout-button svg {

            width: 17px;
            height: 17px;

        }


        /* =========================
           MAIN
        ========================= */

        .admin-main {

            width: calc(100% - var(--sidebar-width));

            margin-left: var(--sidebar-width);

            min-height: 100vh;

        }


        /* =========================
           TOPBAR
        ========================= */

        .admin-topbar {

            position: sticky;

            top: 0;

            z-index: 900;

            height: var(--topbar-height);

            padding: 0 30px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background:
                rgba(255, 255, 255, .94);

            border-bottom:
                1px solid var(--uhsas-border);

            backdrop-filter:
                blur(12px);

        }


        .topbar-left {

            display: flex;

            align-items: center;

            gap: 14px;

        }


        .mobile-menu-button {

            display: none;

            width: 40px;
            height: 40px;

            border: 1px solid var(--uhsas-border);

            border-radius: 10px;

            background: white;

            color: var(--uhsas-green);

            cursor: pointer;

            align-items: center;
            justify-content: center;

        }


        .mobile-menu-button svg {

            width: 20px;
            height: 20px;

        }


        .topbar-page-title {

            font-size: 17px;

            font-weight: 700;

            color:
                var(--uhsas-dark-green);

        }


        .topbar-page-subtitle {

            margin-top: 2px;

            color:
                var(--uhsas-muted);

            font-size: 11px;

        }


        .topbar-right {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        /* notification */

        .notification-button {

            position: relative;

            width: 42px;
            height: 42px;

            display: flex;

            align-items: center;
            justify-content: center;

            border: 1px solid var(--uhsas-border);

            border-radius: 11px;

            background: white;

            color:
                var(--uhsas-muted);

            cursor: pointer;

            transition: .2s ease;

        }


        .notification-button:hover {

            color: var(--uhsas-green);

            border-color:
                rgba(7, 91, 50, .25);

        }


        .notification-button svg {

            width: 19px;
            height: 19px;

        }


        .notification-dot {

            position: absolute;

            top: 9px;
            right: 9px;

            width: 6px;
            height: 6px;

            border-radius: 50%;

            background:
                var(--uhsas-gold);

            border: 1px solid white;

        }


        /* user topbar */

        .topbar-user {

            display: flex;

            align-items: center;

            gap: 9px;

            padding-left: 10px;

            border-left:
                1px solid var(--uhsas-border);

        }


        .topbar-avatar {

            width: 39px;
            height: 39px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                var(--uhsas-green);

            color: white;

            font-size: 12px;

            font-weight: 800;

        }


        .topbar-user-info {

            line-height: 1.2;

        }


        .topbar-user-name {

            color:
                var(--uhsas-text);

            font-size: 11px;

            font-weight: 700;

        }


        .topbar-user-role {

            margin-top: 3px;

            color:
                var(--uhsas-muted);

            font-size: 9px;

        }


        /* =========================
           PAGE CONTENT
        ========================= */

        .admin-content {

            padding: 30px;

            max-width: 1600px;

            margin: 0 auto;

        }


        /* =========================
           FLASH MESSAGES
        ========================= */

        .alert {

            position: relative;

            margin-bottom: 20px;

            padding: 13px 16px;

            border-radius: 12px;

            display: flex;

            align-items: center;

            gap: 10px;

            font-size: 13px;

            font-weight: 500;

        }


        .alert-success {

            color: #14532D;

            background: #ECFDF3;

            border:
                1px solid #BBF7D0;

        }


        .alert-error {

            color: #991B1B;

            background: #FEF2F2;

            border:
                1px solid #FECACA;

        }


        .alert-warning {

            color: #92400E;

            background: #FFFBEB;

            border:
                1px solid #FDE68A;

        }


        /* =========================
           OVERLAY MOBILE
        ========================= */

        .sidebar-overlay {

            display: none;

            position: fixed;

            inset: 0;

            z-index: 999;

            background:
                rgba(0, 0, 0, .45);

        }


        .sidebar-overlay.active {

            display: block;

        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1000px) {

            :root {
                --sidebar-width: 235px;
            }

            .admin-content {
                padding: 25px;
            }

            .admin-topbar {
                padding: 0 25px;
            }

        }


        @media (max-width: 800px) {

            .admin-sidebar {

                transform:
                    translateX(-100%);

                box-shadow:
                    10px 0 40px rgba(0, 0, 0, .18);

            }


            .admin-sidebar.mobile-open {

                transform:
                    translateX(0);

            }


            .admin-main {

                width: 100%;

                margin-left: 0;

            }


            .mobile-menu-button {

                display: flex;

            }


            .admin-topbar {

                padding: 0 18px;

            }


            .admin-content {

                padding: 20px 18px;

            }


            .topbar-user-info {

                display: none;

            }

        }


        @media (max-width: 500px) {

            :root {
                --topbar-height: 68px;
            }


            .admin-topbar {

                padding:
                    0 13px;

            }


            .topbar-page-title {

                font-size: 14px;

            }


            .topbar-page-subtitle {

                display: none;

            }


            .notification-button {

                width: 37px;
                height: 37px;

            }


            .topbar-avatar {

                width: 35px;
                height: 35px;

            }


            .admin-content {

                padding:
                    17px 13px;

            }

        }
    </style>

    @stack('styles')

</head>


<body>


    <div class="admin-wrapper">


        {{-- =====================================================
        SIDEBAR
    ====================================================== --}}

        <aside class="admin-sidebar" id="adminSidebar">


            {{-- BRAND --}}

            <div class="sidebar-brand">

                <img src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="UHSAS" class="sidebar-logo">

                <div class="sidebar-brand-text">

                    <div class="sidebar-brand-title">
                        UHSAS
                    </div>

                    <div class="sidebar-brand-subtitle">
                        Administration
                    </div>

                </div>

            </div>


            {{-- NAVIGATION --}}

            <nav class="sidebar-navigation">


                <div class="sidebar-section-title">
                    Principal
                </div>


                <ul class="sidebar-menu">


                    {{-- DASHBOARD --}}

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.dashboard') }}"
                            class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <span class="sidebar-icon">

                                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">

                                    <rect x="3" y="3" width="7" height="7" />

                                    <rect x="14" y="3" width="7" height="7" />

                                    <rect x="3" y="14" width="7" height="7" />

                                    <rect x="14" y="14" width="7" height="7" />

                                </svg>

                            </span>

                            <span>
                                Tableau de bord
                            </span>

                        </a>

                    </li>


                    {{-- MEMBRES --}}
                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.members.index') }}"
                            class="sidebar-link {{ request()->routeIs('admin.members.*') ? 'active' : '' }}">

                            <span class="sidebar-icon">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round">

                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />

                                    <circle cx="9" cy="7" r="4" />

                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />

                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />

                                </svg>

                            </span>

                            <span class="flex-1">
                                Membres
                            </span>

                            @if (isset($pendingMembersCount) && $pendingMembersCount > 0)
                                <span class="sidebar-badge">
                                    {{ $pendingMembersCount }}
                                </span>
                            @endif

                        </a>

                    </li>


                    {{-- COTISATIONS --}}

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.contributions.index') }}"
                            class="sidebar-link {{ request()->routeIs('admin.contributions.*') ? 'active' : '' }}">

                            <span class="sidebar-icon">

                                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">

                                    <rect x="3" y="5" width="18" height="14" rx="2" />

                                    <path d="M3 10h18" />

                                    <path d="M7 15h2" />

                                </svg>

                            </span>

                            <span>
                                Cotisations
                            </span>

                        </a>

                    </li>


                </ul>


                <div class="sidebar-section-title" style="margin-top: 27px;">
                    Configuration
                </div>


                <ul class="sidebar-menu">


                    {{-- LOCALISATION --}}

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.locations.regions') }}"
                            class="sidebar-link {{ request()->routeIs('admin.locations.*') ? 'active' : '' }}">

                            <span class="sidebar-icon">

                                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">

                                    <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" />

                                    <circle cx="12" cy="10" r="2.5" />

                                </svg>

                            </span>

                            <span>
                                Localisation
                            </span>

                        </a>

                    </li>


                    {{-- PROFESSIONS --}}

                    <li class="sidebar-menu-item">

                        <a href="{{ route('admin.professions.index') }}"
                            class="sidebar-link {{ request()->routeIs('admin.professions.*') ? 'active' : '' }}">

                            <span class="sidebar-icon">

                                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">

                                    <path d="M3 21h18" />

                                    <path d="M5 21V9l7-5 7 5v12" />

                                    <path d="M9 21v-7h6v7" />

                                    <path d="M9 9h.01" />

                                    <path d="M12 9h.01" />

                                    <path d="M15 9h.01" />

                                </svg>

                            </span>

                            <span>
                                Professions
                            </span>

                        </a>

                    </li>


                    {{-- RAPPORTS --}}

                    <li class="sidebar-menu-item">

                        <a href=""
                            class="sidebar-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">

                            <span class="sidebar-icon">

                                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round">

                                    <path d="M4 19V5" />

                                    <path d="M4 19h17" />

                                    <path d="m7 15 4-4 3 2 5-6" />

                                </svg>

                            </span>

                            <span>
                                Rapports
                            </span>

                        </a>

                    </li>


                </ul>


            </nav>


            {{-- SIDEBAR FOOTER --}}

            <div class="sidebar-footer">

                <div class="admin-profile">


                    <div class="admin-avatar">

                        @auth

                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        @else
                            A

                        @endauth

                    </div>


                    <div class="admin-profile-info">

                        <div class="admin-profile-name">

                            @auth
                                {{ auth()->user()->name ?? 'Administrateur' }}
                            @else
                                Administrateur
                            @endauth

                        </div>

                        <div class="admin-profile-role">
                            Administrateur UHSAS
                        </div>

                    </div>


                    @auth

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit" class="logout-button" title="Déconnexion">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                                    stroke-linecap="round" stroke-linejoin="round">

                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />

                                    <polyline points="16 17 21 12 16 7" />

                                    <line x1="21" y1="12" x2="9" y2="12" />

                                </svg>

                            </button>

                        </form>

                    @endauth


                </div>

            </div>


        </aside>


        {{-- MOBILE OVERLAY --}}

        <div class="sidebar-overlay" id="sidebarOverlay"></div>


        {{-- =====================================================
        MAIN
    ====================================================== --}}

        <main class="admin-main">


            {{-- TOPBAR --}}

            <header class="admin-topbar">


                <div class="topbar-left">


                    {{-- MOBILE MENU --}}

                    <button type="button" class="mobile-menu-button" id="mobileMenuButton"
                        aria-label="Ouvrir le menu">

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round">

                            <line x1="4" y1="6" x2="20" y2="6" />

                            <line x1="4" y1="12" x2="20" y2="12" />

                            <line x1="4" y1="18" x2="20" y2="18" />

                        </svg>

                    </button>


                    <div>

                        <div class="topbar-page-title">

                            @yield('page-title', 'Tableau de bord')

                        </div>

                        <div class="topbar-page-subtitle">

                            Administration UHSAS

                        </div>

                    </div>


                </div>


                <div class="topbar-right">


                    {{-- NOTIFICATION --}}

                    <button type="button" class="notification-button" title="Notifications">

                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                            stroke-linecap="round" stroke-linejoin="round">

                            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9" />

                            <path d="M10 21h4" />

                        </svg>

                        <span class="notification-dot"></span>

                    </button>


                    {{-- USER --}}

                    <div class="topbar-user">


                        <div class="topbar-avatar">

                            @auth

                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                            @else
                                A

                            @endauth

                        </div>


                        <div class="topbar-user-info">

                            <div class="topbar-user-name">

                                @auth
                                    {{ auth()->user()->name ?? 'Administrateur' }}
                                @else
                                    Administrateur
                                @endauth

                            </div>

                            <div class="topbar-user-role">
                                Administration
                            </div>

                        </div>


                    </div>


                </div>


            </header>


            {{-- CONTENT --}}

            <div class="admin-content">


                {{-- SUCCESS --}}

                @if (session('success'))
                    <div class="alert alert-success">

                        ✓

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>
                @endif


                {{-- ERROR --}}

                @if (session('error'))
                    <div class="alert alert-error">

                        !

                        <span>
                            {{ session('error') }}
                        </span>

                    </div>
                @endif


                {{-- WARNING --}}

                @if (session('warning'))
                    <div class="alert alert-warning">

                        !

                        <span>
                            {{ session('warning') }}
                        </span>

                    </div>
                @endif


                @yield('content')


            </div>


        </main>


    </div>


    {{-- =========================================================
    JAVASCRIPT
========================================================= --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {


            const sidebar =
                document.getElementById('adminSidebar');

            const overlay =
                document.getElementById('sidebarOverlay');

            const menuButton =
                document.getElementById('mobileMenuButton');


            function openSidebar() {

                if (!sidebar) return;

                sidebar.classList.add('mobile-open');

                overlay?.classList.add('active');

                document.body.style.overflow = 'hidden';

            }


            function closeSidebar() {

                if (!sidebar) return;

                sidebar.classList.remove('mobile-open');

                overlay?.classList.remove('active');

                document.body.style.overflow = '';

            }


            menuButton?.addEventListener(
                'click',
                openSidebar
            );


            overlay?.addEventListener(
                'click',
                closeSidebar
            );


            document
                .querySelectorAll('.sidebar-link')
                .forEach(function(link) {

                    link.addEventListener(
                        'click',
                        function() {

                            if (
                                window.innerWidth <= 800
                            ) {

                                closeSidebar();

                            }

                        }
                    );

                });


            window.addEventListener(
                'resize',
                function() {

                    if (
                        window.innerWidth > 800
                    ) {

                        closeSidebar();

                    }

                }
            );


        });
    </script>


    @stack('scripts')

</body>

</html>

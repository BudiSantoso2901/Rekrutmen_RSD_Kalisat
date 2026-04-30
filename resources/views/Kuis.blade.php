<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Tes Kompetensi — RSD Kalisat</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        /* ══════════════════════════════════════════
   CSS VARIABLES & RESET
══════════════════════════════════════════ */
        :root {
            --primary: #0d6e4e;
            --primary-light: #14a372;
            --primary-pale: #e4f7f0;
            --accent: #f4a827;
            --accent-light: #fde9b8;
            --danger: #e85d5d;
            --text-dark: #1a2e25;
            --text-mid: #3d5246;
            --text-muted: #7a9488;
            --bg: #f5faf7;
            --white: #ffffff;
            --border: #c8e6d8;
            --shadow: 0 4px 24px rgba(13, 110, 78, 0.10);
            --shadow-lg: 0 12px 48px rgba(13, 110, 78, 0.16);
            --radius: 16px;
            --radius-sm: 8px;
            --radius-xl: 32px;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html {
            scroll-behavior: smooth;
            font-size: 16px
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: var(--text-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        button {
            cursor: pointer;
            border: none;
            background: none;
            font-family: inherit
        }

        /* ══════════════════════════════════════════
   BACKGROUND DECORATION
══════════════════════════════════════════ */
        .bg-deco {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .bg-deco::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(20, 163, 114, .12), transparent 70%);
            top: -200px;
            right: -200px;
        }

        .bg-deco::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(244, 168, 39, .10), transparent 70%);
            bottom: -100px;
            left: -100px;
        }

        .bg-dots {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            background-image: radial-gradient(circle, var(--border) 1px, transparent 1px);
            background-size: 32px 32px;
            opacity: .6;
        }

        /* ══════════════════════════════════════════
   SCREENS WRAPPER
══════════════════════════════════════════ */
        .screen {
            display: none;
            min-height: 100vh;
            position: relative;
            z-index: 1;
            animation: screenIn .5s cubic-bezier(.4, 0, .2, 1) both;
        }

        .screen.active {
            display: flex;
            flex-direction: column;
        }

        @keyframes screenIn {
            from {
                opacity: 0;
                transform: translateY(16px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        /* ══════════════════════════════════════════
   HEADER BAR
══════════════════════════════════════════ */
        .topbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
            flex-shrink: 0;
        }

        .topbar-brand {
            display: flex;
            align-items: center;
            gap: 12px
        }

        .brand-mark {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(13, 110, 78, .3);
        }

        .brand-title {
            font-weight: 800;
            font-size: 1rem;
            color: var(--primary)
        }

        .brand-sub {
            font-size: .72rem;
            color: var(--text-muted);
            font-weight: 500
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--primary-pale);
            border-radius: 999px;
            padding: 6px 14px 6px 6px;
        }

        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: .9rem;
            font-weight: 700;
        }

        .user-name {
            font-size: .88rem;
            font-weight: 700;
            color: var(--primary)
        }

        /* ══════════════════════════════════════════
   SCREEN 1 — WELCOME / LOGIN
══════════════════════════════════════════ */
        #screen-welcome {
            align-items: center;
            justify-content: center;
            padding: 24px;
            min-height: 100vh;
        }

        .welcome-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            padding: 56px 48px;
            max-width: 520px;
            width: 100%;
            text-align: center;
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary), var(--primary-light), var(--accent));
        }

        .welcome-icon {
            width: 96px;
            height: 96px;
            border-radius: 28px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.8rem;
            color: #fff;
            margin: 0 auto 28px;
            box-shadow: 0 12px 32px rgba(13, 110, 78, .3);
            animation: iconFloat 4s ease-in-out infinite;
        }

        @keyframes iconFloat {

            0%,
            100% {
                transform: translateY(0) rotate(0deg)
            }

            50% {
                transform: translateY(-8px) rotate(3deg)
            }
        }

        .welcome-tag {
            display: inline-block;
            background: var(--accent-light);
            color: #92650a;
            font-size: .75rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 5px 16px;
            border-radius: 999px;
            margin-bottom: 16px;
        }

        .welcome-card h1 {
            font-family: 'Fraunces', serif;
            font-size: 2rem;
            color: var(--text-dark);
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .welcome-card h1 em {
            color: var(--primary-light);
            font-style: normal
        }

        .welcome-card p {
            color: var(--text-muted);
            font-size: .95rem;
            margin-bottom: 32px;
            line-height: 1.7
        }

        .form-group {
            text-align: left;
            margin-bottom: 18px
        }

        .form-label {
            display: block;
            font-weight: 700;
            font-size: .85rem;
            color: var(--text-mid);
            margin-bottom: 8px;
        }

        .form-label i {
            margin-right: 6px;
            color: var(--primary-light)
        }

        .form-input {
            width: 100%;
            padding: 13px 16px;
            border: 2px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: 'Outfit', sans-serif;
            font-size: .95rem;
            color: var(--text-dark);
            background: var(--bg);
            transition: all .25s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: var(--primary-light);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(20, 163, 114, .12)
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 28px;
            text-align: left;
        }

        .info-chip {
            background: var(--primary-pale);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 14px;
        }

        .info-chip-label {
            font-size: .72rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px
        }

        .info-chip-val {
            font-size: .95rem;
            font-weight: 700;
            color: var(--primary)
        }

        .info-chip-val i {
            margin-right: 6px
        }

        .btn-start {
            width: 100%;
            padding: 16px;
            border-radius: var(--radius);
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            font-weight: 800;
            font-size: 1.05rem;
            box-shadow: 0 6px 24px rgba(13, 110, 78, .35);
            transition: all .3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-start:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 36px rgba(13, 110, 78, .45)
        }

        .btn-start:active {
            transform: translateY(0)
        }

        .disclaimer {
            margin-top: 20px;
            font-size: .78rem;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .disclaimer i {
            color: var(--primary-light)
        }

        /* ══════════════════════════════════════════
   SCREEN 2 — QUIZ
══════════════════════════════════════════ */
        #screen-quiz {
            flex-direction: column
        }

        .quiz-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 24px;
            padding: 28px 32px;
            flex: 1;
            max-width: 1280px;
            width: 100%;
            margin: 0 auto;
            align-items: start;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            background: var(--white);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: sticky;
            top: 88px;
        }

        .sidebar-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            padding: 20px;
            color: #fff;
        }

        .sidebar-title {
            font-weight: 800;
            font-size: 1rem;
            margin-bottom: 4px
        }

        .sidebar-sub {
            font-size: .78rem;
            opacity: .85
        }

        /* Timer */
        .timer-wrap {
            padding: 20px;
            border-bottom: 1px solid var(--border);
            text-align: center;
        }

        .timer-label {
            font-size: .72rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px
        }

        .timer-display {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .timer-block {
            background: var(--primary-pale);
            border: 2px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 10px 14px;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            min-width: 52px;
            text-align: center;
            font-variant-numeric: tabular-nums;
            transition: background .3s, color .3s, border-color .3s;
        }

        .timer-block.warning {
            background: #fff3e0;
            color: #e65100;
            border-color: #ffcc80
        }

        .timer-block.danger {
            background: #fce4e4;
            color: var(--danger);
            border-color: #f7a0a0;
            animation: timerPulse 1s ease-in-out infinite
        }

        .timer-sep {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--text-muted);
            margin: 0 2px;
            line-height: 1
        }

        @keyframes timerPulse {

            0%,
            100% {
                transform: scale(1)
            }

            50% {
                transform: scale(1.05)
            }
        }

        /* Progress */
        .progress-section {
            padding: 20px;
            border-bottom: 1px solid var(--border)
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: .8rem;
            font-weight: 600;
            color: var(--text-mid);
            margin-bottom: 10px;
        }

        .progress-bar {
            height: 8px;
            background: var(--border);
            border-radius: 999px;
            overflow: hidden
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            border-radius: 999px;
            transition: width .5s cubic-bezier(.4, 0, .2, 1);
        }

        /* Question Map */
        .qmap-section {
            padding: 16px 20px 20px
        }

        .qmap-label {
            font-size: .78rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px
        }

        .qmap-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
        }

        .qmap-btn {
            aspect-ratio: 1;
            border-radius: var(--radius-sm);
            font-size: .82rem;
            font-weight: 700;
            background: var(--bg);
            border: 2px solid var(--border);
            color: var(--text-muted);
            transition: all .2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qmap-btn:hover {
            border-color: var(--primary-light);
            color: var(--primary);
            background: var(--primary-pale)
        }

        .qmap-btn.answered {
            background: var(--primary-pale);
            border-color: var(--primary-light);
            color: var(--primary)
        }

        .qmap-btn.current {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(13, 110, 78, .35)
        }

        .qmap-btn.flagged {
            background: var(--accent-light);
            border-color: var(--accent);
            color: #92650a
        }

        .qmap-btn.answered.flagged {
            background: linear-gradient(135deg, var(--primary-pale), var(--accent-light))
        }

        /* Legend */
        .qmap-legend {
            margin-top: 14px;
            display: flex;
            flex-wrap: wrap;
            gap: 8px
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: .72rem;
            color: var(--text-muted);
            font-weight: 500
        }

        .legend-dot {
            width: 12px;
            height: 12px;
            border-radius: 4px;
            border: 2px solid
        }

        .ld-current {
            background: var(--primary);
            border-color: var(--primary)
        }

        .ld-answered {
            background: var(--primary-pale);
            border-color: var(--primary-light)
        }

        .ld-flagged {
            background: var(--accent-light);
            border-color: var(--accent)
        }

        .ld-empty {
            background: var(--bg);
            border-color: var(--border)
        }

        /* ── MAIN CONTENT ── */
        .quiz-main {
            display: flex;
            flex-direction: column;
            gap: 20px
        }

        /* Question Card */
        .question-card {
            background: var(--white);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .qcard-header {
            padding: 20px 28px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--primary-pale);
        }

        .qcard-num {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .qnum-badge {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--primary);
            color: #fff;
            font-weight: 800;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(13, 110, 78, .3);
        }

        .qnum-info span {
            display: block
        }

        .qnum-info .qnum-label {
            font-size: .72rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px
        }

        .qnum-info .qnum-val {
            font-weight: 800;
            color: var(--text-dark);
            font-size: 1rem
        }

        .qcard-actions {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .btn-flag {
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 8px 16px;
            border-radius: 999px;
            font-size: .82rem;
            font-weight: 700;
            background: var(--white);
            border: 2px solid var(--border);
            color: var(--text-muted);
            transition: all .25s ease;
        }

        .btn-flag:hover {
            border-color: var(--accent);
            color: var(--accent);
            background: var(--accent-light)
        }

        .btn-flag.flagged {
            background: var(--accent-light);
            border-color: var(--accent);
            color: #92650a
        }

        .btn-flag i {
            transition: transform .3s
        }

        .btn-flag.flagged i {
            transform: scale(1.3)
        }

        .qcard-category {
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 999px;
        }

        .cat-medis {
            background: #dbeafe;
            color: #1d4ed8
        }

        .cat-umum {
            background: var(--primary-pale);
            color: var(--primary)
        }

        .cat-hukum {
            background: #ede9fe;
            color: #6d28d9
        }

        /* Question Body */
        .qcard-body {
            padding: 32px 28px
        }

        .question-text {
            font-size: 1.1rem;
            line-height: 1.75;
            color: var(--text-dark);
            margin-bottom: 28px;
            font-weight: 500;
        }

        .question-text strong {
            color: var(--primary);
            font-weight: 800
        }

        .question-img {
            width: 100%;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            margin-bottom: 24px;
            object-fit: cover;
            max-height: 200px;
            background: var(--primary-pale);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: var(--border);
            padding: 40px;
            text-align: center;
        }

        /* Options */
        .options-list {
            display: flex;
            flex-direction: column;
            gap: 12px
        }

        .option-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 16px 18px;
            border-radius: var(--radius);
            border: 2px solid var(--border);
            cursor: pointer;
            transition: all .25s cubic-bezier(.4, 0, .2, 1);
            position: relative;
            overflow: hidden;
            background: var(--white);
        }

        .option-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--primary-pale), transparent);
            opacity: 0;
            transition: opacity .25s;
        }

        .option-item:hover {
            border-color: var(--primary-light);
            transform: translateX(4px);
            box-shadow: var(--shadow)
        }

        .option-item:hover::before {
            opacity: 1
        }

        .option-item.selected {
            border-color: var(--primary);
            background: var(--primary-pale);
            box-shadow: 0 4px 20px rgba(13, 110, 78, .15);
            transform: translateX(4px);
        }

        .option-item.selected::before {
            opacity: 1
        }

        .option-item.correct {
            border-color: #22c55e;
            background: #f0fdf4
        }

        .option-item.incorrect {
            border-color: var(--danger);
            background: #fef2f2
        }

        .option-key {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 10px;
            background: var(--bg);
            border: 2px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: .92rem;
            color: var(--text-muted);
            transition: all .25s;
        }

        .option-item.selected .option-key {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff
        }

        .option-item.correct .option-key {
            background: #22c55e;
            border-color: #22c55e;
            color: #fff
        }

        .option-item.incorrect .option-key {
            background: var(--danger);
            border-color: var(--danger);
            color: #fff
        }

        .option-text {
            font-size: .95rem;
            line-height: 1.6;
            color: var(--text-dark);
            padding-top: 8px;
            flex: 1;
            font-weight: 500
        }

        .option-item.selected .option-text {
            color: var(--primary);
            font-weight: 600
        }

        .option-check {
            margin-left: auto;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: .75rem;
            flex-shrink: 0;
            animation: checkPop .3s cubic-bezier(.34, 1.56, .64, 1);
        }

        .option-item.selected .option-check {
            display: flex
        }

        @keyframes checkPop {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* Navigation */
        .quiz-nav {
            background: var(--white);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            padding: 20px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
        }

        .nav-left,
        .nav-right {
            display: flex;
            gap: 10px
        }

        .btn-nav {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 22px;
            border-radius: var(--radius-sm);
            font-weight: 700;
            font-size: .9rem;
            transition: all .25s ease;
            border: 2px solid transparent;
        }

        .btn-prev {
            background: var(--bg);
            border-color: var(--border);
            color: var(--text-mid);
        }

        .btn-prev:hover {
            background: var(--primary-pale);
            border-color: var(--primary-light);
            color: var(--primary)
        }

        .btn-next {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            box-shadow: 0 4px 16px rgba(13, 110, 78, .3);
        }

        .btn-next:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(13, 110, 78, .4)
        }

        .btn-submit {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: var(--radius-sm);
            background: linear-gradient(135deg, var(--accent), #f5b800);
            color: #fff;
            font-weight: 800;
            font-size: .92rem;
            box-shadow: 0 4px 16px rgba(244, 168, 39, .4);
            transition: all .25s ease;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 28px rgba(244, 168, 39, .5)
        }

        .btn-nav:disabled {
            opacity: .4;
            cursor: not-allowed;
            transform: none !important
        }

        /* answered stats */
        .nav-stats {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap
        }

        .nstat {
            text-align: center
        }

        .nstat-num {
            display: block;
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--primary);
            line-height: 1
        }

        .nstat-label {
            font-size: .7rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px
        }

        .nstat-divider {
            width: 1px;
            height: 28px;
            background: var(--border)
        }

        /* ══════════════════════════════════════════
   MODAL CONFIRM SUBMIT
══════════════════════════════════════════ */
        .modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 500;
            background: rgba(13, 110, 78, .25);
            backdrop-filter: blur(6px);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .modal-overlay.show {
            display: flex;
            animation: fadeIn .3s ease
        }

        @keyframes fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        .modal {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            max-width: 440px;
            width: 100%;
            overflow: hidden;
            animation: modalPop .4s cubic-bezier(.34, 1.56, .64, 1);
        }

        @keyframes modalPop {
            from {
                transform: scale(.8);
                opacity: 0
            }

            to {
                transform: scale(1);
                opacity: 1
            }
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            padding: 28px;
            text-align: center;
            color: #fff;
        }

        .modal-header-icon {
            font-size: 3rem;
            margin-bottom: 12px;
            display: block
        }

        .modal-header h2 {
            font-family: 'Fraunces', serif;
            font-size: 1.6rem
        }

        .modal-body {
            padding: 28px
        }

        .modal-summary {
            background: var(--primary-pale);
            border-radius: var(--radius);
            border: 1px solid var(--border);
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 16px;
            text-align: center;
            margin-bottom: 20px;
        }

        .ms-item .ms-num {
            display: block;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1
        }

        .ms-item .ms-label {
            font-size: .75rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px
        }

        .ms-item.warn .ms-num {
            color: var(--accent)
        }

        .modal-warn {
            display: flex;
            gap: 10px;
            align-items: flex-start;
            background: var(--accent-light);
            border-radius: var(--radius-sm);
            padding: 14px;
            font-size: .88rem;
            color: #92650a;
            font-weight: 500;
            margin-bottom: 24px;
        }

        .modal-warn i {
            margin-top: 2px;
            flex-shrink: 0
        }

        .modal-buttons {
            display: flex;
            gap: 12px
        }

        .btn-cancel {
            flex: 1;
            padding: 14px;
            border-radius: var(--radius-sm);
            background: var(--bg);
            border: 2px solid var(--border);
            color: var(--text-mid);
            font-weight: 700;
            font-size: .92rem;
            transition: all .25s;
        }

        .btn-cancel:hover {
            border-color: var(--primary-light);
            color: var(--primary)
        }

        .btn-confirm {
            flex: 2;
            padding: 14px;
            border-radius: var(--radius-sm);
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            font-weight: 800;
            font-size: .92rem;
            box-shadow: 0 4px 16px rgba(13, 110, 78, .3);
            transition: all .25s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-confirm:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 28px rgba(13, 110, 78, .4)
        }

        /* ══════════════════════════════════════════
   SCREEN 3 — RESULT
══════════════════════════════════════════ */
        #screen-result {
            align-items: center;
            justify-content: center;
            padding: 24px;
            min-height: 100vh;
        }

        .result-wrap {
            max-width: 780px;
            width: 100%
        }

        .result-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .result-header {
            padding: 48px 40px;
            text-align: center;
            background: linear-gradient(135deg, var(--primary-dark, #0a4d37), var(--primary), var(--primary-light));
            position: relative;
            overflow: hidden;
        }

        .result-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 30% 50%, rgba(255, 255, 255, .12), transparent 60%);
        }

        .result-trophy {
            font-size: 5rem;
            margin-bottom: 16px;
            display: block;
            animation: trophyFloat 3s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes trophyFloat {

            0%,
            100% {
                transform: translateY(0) rotate(-5deg)
            }

            50% {
                transform: translateY(-10px) rotate(5deg)
            }
        }

        .result-header h1 {
            font-family: 'Fraunces', serif;
            font-size: 2rem;
            color: #fff;
            margin-bottom: 6px;
            position: relative;
            z-index: 1;
        }

        .result-header p {
            color: rgba(255, 255, 255, .85);
            font-size: 1rem;
            position: relative;
            z-index: 1
        }

        /* Score Circle */
        .score-circle-wrap {
            display: flex;
            justify-content: center;
            padding: 40px 40px 20px;
        }

        .score-circle {
            position: relative;
            width: 180px;
            height: 180px;
            filter: drop-shadow(0 8px 24px rgba(13, 110, 78, .2));
        }

        .score-circle svg {
            transform: rotate(-90deg)
        }

        .score-bg {
            fill: none;
            stroke: var(--border);
            stroke-width: 12
        }

        .score-fill {
            fill: none;
            stroke-width: 12;
            stroke-linecap: round;
            stroke: url(#scoreGrad);
            stroke-dasharray: 502;
            stroke-dashoffset: 502;
            transition: stroke-dashoffset 1.5s cubic-bezier(.4, 0, .2, 1) .5s;
        }

        .score-text {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .score-num {
            font-family: 'Fraunces', serif;
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
        }

        .score-label {
            font-size: .75rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px
        }

        .score-status {
            font-size: .8rem;
            font-weight: 800;
            padding: 3px 12px;
            border-radius: 999px;
            margin-top: 6px;
        }

        .status-lulus {
            background: #dcfce7;
            color: #16a34a
        }

        .status-gagal {
            background: #fee2e2;
            color: #dc2626
        }

        .result-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
            border-top: 1px solid var(--border);
        }

        .rstat {
            padding: 24px 16px;
            text-align: center;
            border-right: 1px solid var(--border);
        }

        .rstat:last-child {
            border-right: none
        }

        .rstat-icon {
            font-size: 1.4rem;
            margin-bottom: 8px;
            display: block
        }

        .rstat-num {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-dark);
            display: block;
            line-height: 1;
            margin-bottom: 4px
        }

        .rstat-label {
            font-size: .72rem;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px
        }

        .rstat.green .rstat-num {
            color: #16a34a
        }

        .rstat.red .rstat-num {
            color: var(--danger)
        }

        .rstat.blue .rstat-num {
            color: #2563eb
        }

        .rstat.yellow .rstat-num {
            color: #d97706
        }

        .result-actions {
            padding: 32px 40px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-result {
            flex: 1;
            min-width: 140px;
            padding: 14px;
            border-radius: var(--radius);
            font-weight: 700;
            font-size: .92rem;
            transition: all .25s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-review {
            background: var(--bg);
            border: 2px solid var(--border);
            color: var(--text-mid)
        }

        .btn-review:hover {
            border-color: var(--primary-light);
            color: var(--primary);
            background: var(--primary-pale)
        }

        .btn-finish {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            box-shadow: 0 4px 16px rgba(13, 110, 78, .3);
        }

        .btn-finish:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(13, 110, 78, .45)
        }

        /* Confetti */
        .confetti-container {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 999;
            overflow: hidden;
        }

        .confetti-piece {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 2px;
            opacity: 0;
            animation: confettiFall var(--dur) ease-in var(--delay) forwards;
        }

        @keyframes confettiFall {
            0% {
                opacity: 1;
                top: -20px;
                transform: rotate(0deg) translateX(0)
            }

            100% {
                opacity: 0;
                top: 110vh;
                transform: rotate(720deg) translateX(var(--drift))
            }
        }

        /* ══════════════════════════════════════════
   TOAST NOTIFICATION
══════════════════════════════════════════ */
        .toast-container {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow-lg);
            border-left: 4px solid var(--primary);
            padding: 14px 18px;
            min-width: 280px;
            max-width: 360px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: toastIn .4s cubic-bezier(.34, 1.56, .64, 1);
            font-size: .9rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .toast.warn {
            border-left-color: var(--accent)
        }

        .toast.error {
            border-left-color: var(--danger)
        }

        .toast i {
            font-size: 1.1rem
        }

        .toast.primary i {
            color: var(--primary)
        }

        .toast.warn i {
            color: var(--accent)
        }

        .toast.error i {
            color: var(--danger)
        }

        .toast.fade-out {
            animation: toastOut .3s ease forwards
        }

        @keyframes toastIn {
            from {
                opacity: 0;
                transform: translateX(40px)
            }

            to {
                opacity: 1;
                transform: translateX(0)
            }
        }

        @keyframes toastOut {
            from {
                opacity: 1;
                transform: translateX(0)
            }

            to {
                opacity: 0;
                transform: translateX(40px)
            }
        }

        /* ══════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════ */
        @media(max-width:1024px) {
            .quiz-layout {
                grid-template-columns: 260px 1fr;
                gap: 18px;
                padding: 20px 20px
            }
        }

        @media(max-width:768px) {
            .quiz-layout {
                grid-template-columns: 1fr;
                padding: 16px
            }

            .sidebar {
                position: relative;
                top: auto
            }

            .topbar {
                padding: 0 16px
            }

            .welcome-card {
                padding: 36px 24px
            }

            .result-stats {
                grid-template-columns: 1fr 1fr
            }

            .rstat:nth-child(2) {
                border-right: none
            }

            .rstat:nth-child(3) {
                border-top: 1px solid var(--border);
                border-right: 1px solid var(--border)
            }

            .rstat:nth-child(4) {
                border-top: 1px solid var(--border)
            }

            .result-actions {
                padding: 24px
            }

            .qcard-body {
                padding: 24px 20px
            }

            .quiz-nav {
                padding: 16px 20px
            }

            .info-grid {
                grid-template-columns: 1fr
            }

            .modal-summary {
                grid-template-columns: 1fr 1fr 1fr
            }
        }

        @media(max-width:480px) {
            .question-text {
                font-size: 1rem
            }

            .topbar-right .topbar-user .user-name {
                display: none
            }

            .result-header {
                padding: 32px 24px
            }

            .result-header h1 {
                font-size: 1.5rem
            }

            .score-circle {
                width: 140px;
                height: 140px
            }

            .score-num {
                font-size: 2.4rem
            }

            .btn-nav span {
                display: none
            }

            .nav-stats {
                display: none
            }
        }
    </style>
</head>

<body>

    <div class="bg-deco"></div>
    <div class="bg-dots"></div>

    <!-- ═══════════════════════════
     SCREEN 1 — WELCOME
═══════════════════════════ -->
    <div class="screen active" id="screen-welcome">
        <div style="padding:24px;flex:1;display:flex;align-items:center;justify-content:center">
            <div class="welcome-card">
                <div class="welcome-icon"><i class="fa-solid fa-brain"></i></div>
                <div class="welcome-tag">Tes Kompetensi Rekrutmen</div>
                <h1>Tes Seleksi<br><em>RSD Kalisat</em></h1>
                <p>Selamat datang di portal tes kompetensi. Pastikan Anda dalam kondisi siap dan koneksi internet stabil
                    sebelum memulai ujian.</p>

                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-id-card"></i>Nama Lengkap</label>
                    <input type="text" class="form-input" id="pesertaNama" placeholder="Masukkan nama sesuai KTP"
                        autocomplete="off" />
                </div>
                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-hashtag"></i>Nomor Peserta</label>
                    <input type="text" class="form-input" id="pesertaNo" placeholder="Contoh: RSD-2025-0001"
                        autocomplete="off" />
                </div>

                <div class="info-grid">
                    <div class="info-chip">
                        <div class="info-chip-label">Jumlah Soal</div>
                        <div class="info-chip-val"><i class="fa-solid fa-list-check"></i>20 Soal</div>
                    </div>
                    <div class="info-chip">
                        <div class="info-chip-label">Durasi</div>
                        <div class="info-chip-val"><i class="fa-solid fa-clock"></i>30 Menit</div>
                    </div>
                    <div class="info-chip">
                        <div class="info-chip-label">Nilai Lulus</div>
                        <div class="info-chip-val"><i class="fa-solid fa-star"></i>70 / 100</div>
                    </div>
                    <div class="info-chip">
                        <div class="info-chip-label">Jenis Soal</div>
                        <div class="info-chip-val"><i class="fa-solid fa-check-double"></i>Pilihan Ganda</div>
                    </div>
                </div>

                <button class="btn-start" id="btnStart">
                    <i class="fa-solid fa-play"></i> Mulai Tes Sekarang
                </button>
                <p class="disclaimer">
                    <i class="fa-solid fa-shield-halved"></i>
                    Pastikan data yang Anda masukkan sudah benar
                </p>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════
     SCREEN 2 — QUIZ
═══════════════════════════ -->
    <div class="screen" id="screen-quiz">
        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-brand">
                <div class="brand-mark"><i class="fa-solid fa-heart-pulse"></i></div>
                <div>
                    <div class="brand-title">RSD Kalisat</div>
                    <div class="brand-sub">Tes Kompetensi Pegawai</div>
                </div>
            </div>
            <div class="topbar-right">
                <div class="topbar-user">
                    <div class="user-avatar" id="userAvatarTop">P</div>
                    <div class="user-name" id="userNameTop">Peserta</div>
                </div>
            </div>
        </div>

        <!-- Layout -->
        <div class="quiz-layout">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-title"><i class="fa-solid fa-clipboard-list"></i> Panel Ujian</div>
                    <div class="sidebar-sub" id="pesertaInfoSidebar">—</div>
                </div>

                <!-- Timer -->
                <div class="timer-wrap">
                    <div class="timer-label"><i class="fa-regular fa-clock"></i> Sisa Waktu</div>
                    <div class="timer-display">
                        <div class="timer-block" id="timerMin">30</div>
                        <div class="timer-sep">:</div>
                        <div class="timer-block" id="timerSec">00</div>
                    </div>
                </div>

                <!-- Progress -->
                <div class="progress-section">
                    <div class="progress-label">
                        <span>Progress Pengerjaan</span>
                        <span id="progressText">0 / 20</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill" style="width:0%"></div>
                    </div>
                </div>

                <!-- Question Map -->
                <div class="qmap-section">
                    <div class="qmap-label">Navigasi Soal</div>
                    <div class="qmap-grid" id="qmapGrid"></div>
                    <div class="qmap-legend">
                        <div class="legend-item">
                            <div class="legend-dot ld-current"></div>Aktif
                        </div>
                        <div class="legend-item">
                            <div class="legend-dot ld-answered"></div>Dijawab
                        </div>
                        <div class="legend-item">
                            <div class="legend-dot ld-flagged"></div>Ditandai
                        </div>
                        <div class="legend-item">
                            <div class="legend-dot ld-empty"></div>Belum
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main -->
            <div class="quiz-main">
                <!-- Question Card -->
                <div class="question-card">
                    <div class="qcard-header">
                        <div class="qcard-num">
                            <div class="qnum-badge" id="qBadgeNum">1</div>
                            <div class="qnum-info">
                                <span class="qnum-label">Soal ke</span>
                                <span class="qnum-val" id="qNumVal">1 dari 20</span>
                            </div>
                        </div>
                        <div class="qcard-actions">
                            <span class="qcard-category cat-umum" id="qCategory">Umum</span>
                            <button class="btn-flag" id="btnFlag">
                                <i class="fa-regular fa-flag"></i>
                                <span>Tandai</span>
                            </button>
                        </div>
                    </div>

                    <div class="qcard-body">
                        <div class="question-text" id="questionText">
                            Memuat soal...
                        </div>
                        <div class="options-list" id="optionsList"></div>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="quiz-nav">
                    <div class="nav-left">
                        <button class="btn-nav btn-prev" id="btnPrev">
                            <i class="fa-solid fa-chevron-left"></i>
                            <span>Sebelumnya</span>
                        </button>
                    </div>
                    <div class="nav-stats">
                        <div class="nstat">
                            <span class="nstat-num" id="statAnswered">0</span>
                            <span class="nstat-label">Dijawab</span>
                        </div>
                        <div class="nstat-divider"></div>
                        <div class="nstat">
                            <span class="nstat-num" id="statUnanswered">20</span>
                            <span class="nstat-label">Belum</span>
                        </div>
                        <div class="nstat-divider"></div>
                        <div class="nstat">
                            <span class="nstat-num" id="statFlagged">0</span>
                            <span class="nstat-label">Ditandai</span>
                        </div>
                    </div>
                    <div class="nav-right">
                        <button class="btn-nav btn-next" id="btnNext">
                            <span>Selanjutnya</span>
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                        <button class="btn-submit" id="btnSubmit" style="display:none">
                            <i class="fa-solid fa-paper-plane"></i>
                            <span>Kumpulkan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════
     MODAL KONFIRMASI
═══════════════════════════ -->
    <div class="modal-overlay" id="modalConfirm">
        <div class="modal">
            <div class="modal-header">
                <span class="modal-header-icon">📋</span>
                <h2>Kumpulkan Jawaban?</h2>
            </div>
            <div class="modal-body">
                <div class="modal-summary">
                    <div class="ms-item">
                        <span class="ms-num" id="mSumTotal">20</span>
                        <span class="ms-label">Total Soal</span>
                    </div>
                    <div class="ms-item">
                        <span class="ms-num" id="mSumAnswered">0</span>
                        <span class="ms-label">Dijawab</span>
                    </div>
                    <div class="ms-item warn">
                        <span class="ms-num" id="mSumSkipped">0</span>
                        <span class="ms-label">Belum</span>
                    </div>
                </div>
                <div class="modal-warn" id="modalWarnText" style="display:none">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>Masih ada soal yang belum dijawab. Pastikan Anda telah memeriksa kembali semua jawaban.</span>
                </div>
                <div class="modal-buttons">
                    <button class="btn-cancel" id="btnModalCancel">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </button>
                    <button class="btn-confirm" id="btnModalConfirm">
                        <i class="fa-solid fa-check"></i> Ya, Kumpulkan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════
     SCREEN 3 — RESULT
═══════════════════════════ -->
    <div class="screen" id="screen-result">
        <div style="padding:24px;flex:1;display:flex;align-items:center;justify-content:center">
            <div class="result-wrap">
                <div class="result-card">
                    <div class="result-header">
                        <span class="result-trophy" id="resultEmoji">🏆</span>
                        <h1 id="resultTitle">Selamat!</h1>
                        <p id="resultSubtitle">Anda telah menyelesaikan tes kompetensi</p>
                    </div>

                    <div class="score-circle-wrap">
                        <div class="score-circle">
                            <svg width="180" height="180" viewBox="0 0 180 180">
                                <defs>
                                    <linearGradient id="scoreGrad" x1="0%" y1="0%" x2="100%"
                                        y2="0%">
                                        <stop offset="0%" style="stop-color:#0d6e4e" />
                                        <stop offset="100%" style="stop-color:#14a372" />
                                    </linearGradient>
                                </defs>
                                <circle class="score-bg" cx="90" cy="90" r="80" />
                                <circle class="score-fill" id="scoreFill" cx="90" cy="90" r="80" />
                            </svg>
                            <div class="score-text">
                                <div class="score-num" id="scoreNum">0</div>
                                <div class="score-label">Nilai</div>
                                <div class="score-status" id="scoreStatus">—</div>
                            </div>
                        </div>
                    </div>

                    <div class="result-stats">
                        <div class="rstat green">
                            <span class="rstat-icon">✅</span>
                            <span class="rstat-num" id="rStatBenar">0</span>
                            <span class="rstat-label">Benar</span>
                        </div>
                        <div class="rstat red">
                            <span class="rstat-icon">❌</span>
                            <span class="rstat-num" id="rStatSalah">0</span>
                            <span class="rstat-label">Salah</span>
                        </div>
                        <div class="rstat blue">
                            <span class="rstat-icon">⏭️</span>
                            <span class="rstat-num" id="rStatSkip">0</span>
                            <span class="rstat-label">Dilewati</span>
                        </div>
                        <div class="rstat yellow">
                            <span class="rstat-icon">⏱️</span>
                            <span class="rstat-num" id="rStatTime">30:00</span>
                            <span class="rstat-label">Waktu Tersisa</span>
                        </div>
                    </div>

                    <div class="result-actions">
                        <button class="btn-result btn-review" id="btnReview">
                            <i class="fa-solid fa-magnifying-glass"></i> Review Jawaban
                        </button>
                        <button class="btn-result btn-finish" onclick="window.location.reload()">
                            <i class="fa-solid fa-house"></i> Kembali ke Beranda
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confetti -->
    <div class="confetti-container" id="confettiContainer"></div>

    <!-- Toast -->
    <div class="toast-container" id="toastContainer"></div>

    <script>
        /* ══════════════════════════════════════════
       QUESTION BANK — 20 Soal
    ══════════════════════════════════════════ */
        const QUESTIONS = [{
                id: 1,
                category: 'Umum',
                cat: 'cat-umum',
                text: 'Rumah Sakit Daerah (RSD) Kalisat berkomitmen untuk memberikan pelayanan kesehatan yang berkualitas. Apa landasan hukum utama penyelenggaraan rumah sakit di Indonesia?',
                options: ['UU No. 44 Tahun 2009 tentang Rumah Sakit', 'UU No. 36 Tahun 2009 tentang Kesehatan',
                    'PP No. 47 Tahun 2016 tentang Fasilitas Kesehatan', 'Permenkes No. 72 Tahun 2016'
                ],
                answer: 0
            },
            {
                id: 2,
                category: 'Medis',
                cat: 'cat-medis',
                text: 'Dalam pelayanan keperawatan, prinsip <strong>asuhan keperawatan berbasis bukti (evidence-based nursing)</strong> mengutamakan penggunaan:',
                options: ['Pengalaman pribadi perawat semata', 'Kebijakan rumah sakit tanpa referensi ilmiah',
                    'Hasil penelitian ilmiah terkini dalam praktik klinis',
                    'Instruksi dokter secara mutlak tanpa evaluasi'
                ],
                answer: 2
            },
            {
                id: 3,
                category: 'Umum',
                cat: 'cat-umum',
                text: 'Sikap profesional yang wajib dimiliki seorang pegawai rumah sakit dalam berinteraksi dengan pasien adalah:',
                options: ['Bersikap acuh dan menjaga jarak agar profesional',
                    'Empati, komunikatif, dan menghormati hak pasien',
                    'Mengutamakan kepentingan pribadi di atas kepentingan pasien',
                    'Tidak perlu komunikasi aktif jika tugas sudah selesai'
                ],
                answer: 1
            },
            {
                id: 4,
                category: 'Medis',
                cat: 'cat-medis',
                text: 'Tanda-tanda vital (vital signs) yang diukur secara rutin pada pasien meliputi:',
                options: ['Berat badan, tinggi badan, lingkar kepala', 'Tekanan darah, nadi, suhu, dan frekuensi napas',
                    'Kadar gula darah, kolesterol, dan hemoglobin', 'GCS, pupil, dan refleks tendon'
                ],
                answer: 1
            },
            {
                id: 5,
                category: 'Hukum',
                cat: 'cat-hukum',
                text: 'Hak pasien yang dijamin dalam UU No. 44 Tahun 2009 tentang Rumah Sakit antara lain adalah:',
                options: ['Memilih dokter tanpa batasan apapun',
                    'Menolak tindakan medis setelah mendapatkan penjelasan',
                    'Mendapatkan layanan gratis tanpa syarat', 'Mengakses rekam medis kapan saja tanpa izin'
                ],
                answer: 1
            },
            {
                id: 6,
                category: 'Umum',
                cat: 'cat-umum',
                text: 'Program Keselamatan Pasien (Patient Safety) di rumah sakit bertujuan untuk:',
                options: ['Mengurangi biaya operasional rumah sakit', 'Meningkatkan jumlah kunjungan pasien',
                    'Mencegah, mengurangi, dan mengatasi insiden keselamatan pasien',
                    'Mempercepat proses administrasi pendaftaran'
                ],
                answer: 2
            },
            {
                id: 7,
                category: 'Medis',
                cat: 'cat-medis',
                text: 'Hand hygiene (kebersihan tangan) menurut WHO dilakukan pada berapa momen (five moments)?',
                options: ['3 momen', '4 momen', '5 momen', '6 momen'],
                answer: 2
            },
            {
                id: 8,
                category: 'Umum',
                cat: 'cat-umum',
                text: 'Rekam medis pasien bersifat rahasia dan hanya dapat dibuka untuk kepentingan tertentu. Waktu penyimpanan rekam medis pasien rawat inap sekurang-kurangnya adalah:',
                options: ['2 tahun sejak tanggal terakhir berobat', '5 tahun sejak tanggal terakhir berobat',
                    '10 tahun sejak tanggal terakhir berobat', 'Seumur hidup pasien'
                ],
                answer: 1
            },
            {
                id: 9,
                category: 'Medis',
                cat: 'cat-medis',
                text: 'Infeksi yang diperoleh pasien selama dalam perawatan di rumah sakit dan tidak sedang dalam masa inkubasi saat masuk disebut:',
                options: ['Infeksi Menular Seksual (IMS)', 'Healthcare-Associated Infections (HAIs)',
                    'Infeksi Oportunistik', 'Infeksi Nosokomial Stadium Lanjut'
                ],
                answer: 1
            },
            {
                id: 10,
                category: 'Hukum',
                cat: 'cat-hukum',
                text: 'Apabila terjadi konflik kepentingan antara kepentingan pasien dan kebijakan institusi, maka seorang tenaga kesehatan profesional harus:',
                options: ['Mengikuti kebijakan institusi sepenuhnya', 'Mengikuti arahan rekan sejawat senior',
                    'Mengutamakan keselamatan dan kepentingan terbaik pasien',
                    'Meminta keluarga pasien untuk memutuskan'
                ],
                answer: 2
            },
            {
                id: 11,
                category: 'Umum',
                cat: 'cat-umum',
                text: 'Sistem rujukan pelayanan kesehatan di Indonesia menggunakan konsep berjenjang. Berikut urutan yang benar dari primer ke tersier:',
                options: ['RS → Puskesmas → Klinik Spesialis',
                    'Puskesmas → RS Umum Daerah → RS Rujukan Regional/Nasional',
                    'Klinik → Puskesmas → Rumah Sakit Kelas A', 'Dokter keluarga → Puskesmas → Apotek'
                ],
                answer: 1
            },
            {
                id: 12,
                category: 'Medis',
                cat: 'cat-medis',
                text: 'Tindakan Bantuan Hidup Dasar (BHD) pada dewasa dimulai dengan urutan yang benar adalah:',
                options: ['Airway – Breathing – Circulation (A-B-C)', 'Breathing – Airway – Circulation (B-A-C)',
                    'Circulation – Airway – Breathing (C-A-B)', 'Defibrillation – Airway – Breathing (D-A-B)'
                ],
                answer: 2
            },
            {
                id: 13,
                category: 'Umum',
                cat: 'cat-umum',
                text: 'Nilai inti (core values) dari pelayanan publik yang baik mencakup hal-hal berikut, KECUALI:',
                options: ['Integritas dan transparansi', 'Akuntabilitas', 'Diskriminasi berdasarkan status sosial',
                    'Profesionalisme'
                ],
                answer: 2
            },
            {
                id: 14,
                category: 'Hukum',
                cat: 'cat-hukum',
                text: 'Informed Consent (persetujuan tindakan medis) wajib diperoleh sebelum tindakan medis karena:',
                options: ['Merupakan syarat administratif belaka',
                    'Menghormati otonomi pasien atas tubuh dan kesehatannya', 'Mempercepat proses tindakan medis',
                    'Menghindari tagihan yang lebih tinggi'
                ],
                answer: 1
            },
            {
                id: 15,
                category: 'Medis',
                cat: 'cat-medis',
                text: 'Alat Pelindung Diri (APD) minimal yang digunakan saat berhadapan dengan pasien infeksius melalui droplet adalah:',
                options: ['Sarung tangan lateks saja', 'Masker N95 dan sarung tangan saja',
                    'Masker bedah, sarung tangan, dan pelindung wajah', 'Gaun bedah lengkap tanpa masker'
                ],
                answer: 2
            },
            {
                id: 16,
                category: 'Umum',
                cat: 'cat-umum',
                text: 'Akreditasi rumah sakit di Indonesia dilaksanakan oleh lembaga yang bernama:',
                options: ['Kementerian Kesehatan RI', 'BPOM (Badan Pengawas Obat dan Makanan)',
                    'KARS (Komisi Akreditasi Rumah Sakit)', 'IDI (Ikatan Dokter Indonesia)'
                ],
                answer: 2
            },
            {
                id: 17,
                category: 'Umum',
                cat: 'cat-umum',
                text: 'Program JKN (Jaminan Kesehatan Nasional) diselenggarakan oleh:',
                options: ['PT Askes (Persero)', 'Kementerian Kesehatan RI', 'BPJS Kesehatan',
                    'Dinas Kesehatan Provinsi'],
                answer: 2
            },
            {
                id: 18,
                category: 'Medis',
                cat: 'cat-medis',
                text: 'Pembuangan limbah medis infeksius (jarum suntik bekas, perban berdarah) yang benar adalah:',
                options: ['Dibuang bersama sampah domestik biasa',
                    'Ditempatkan di kantong kuning dan dikelola sebagai B3', 'Dibakar sendiri di area terbuka',
                    'Dipendam di tanah pada area tertentu'
                ],
                answer: 1
            },
            {
                id: 19,
                category: 'Hukum',
                cat: 'cat-hukum',
                text: 'Tindakan Keperawatan mandiri yang dapat dilakukan perawat tanpa instruksi dokter dilandasi oleh:',
                options: ['Kebijakan kepala ruangan', 'Standar Prosedur Operasional (SPO) keperawatan yang berlaku',
                    'Pengalaman pribadi perawat senior', 'Permintaan keluarga pasien'
                ],
                answer: 1
            },
            {
                id: 20,
                category: 'Umum',
                cat: 'cat-umum',
                text: 'Keterbukaan, kejujuran, dan tidak menyalahgunakan wewenang jabatan merupakan penerapan nilai:',
                options: ['Profesionalisme tinggi', 'Integritas dan Anti-Korupsi', 'Kompetensi teknis',
                    'Efisiensi birokrasi'
                ],
                answer: 1
            }
        ];

        /* ══════════════════════════════════════════
           STATE
        ══════════════════════════════════════════ */
        const state = {
            currentQ: 0,
            answers: new Array(QUESTIONS.length).fill(null),
            flagged: new Array(QUESTIONS.length).fill(false),
            timerTotal: 30 * 60, // 30 menit
            timerLeft: 30 * 60,
            timerInterval: null,
            pesertaNama: '',
            pesertaNo: '',
            startTime: null,
            finished: false,
        };

        /* ══════════════════════════════════════════
           DOM REFS
        ══════════════════════════════════════════ */
        const screens = {
            welcome: document.getElementById('screen-welcome'),
            quiz: document.getElementById('screen-quiz'),
            result: document.getElementById('screen-result'),
        };

        /* ══════════════════════════════════════════
           UTILS
        ══════════════════════════════════════════ */
        function showScreen(name) {
            Object.values(screens).forEach(s => {
                s.classList.remove('active');
                s.style.display = 'none'
            });
            screens[name].style.display = 'flex';
            // trigger reflow for animation
            void screens[name].offsetWidth;
            screens[name].classList.add('active');
        }

        function showToast(msg, type = 'primary', dur = 3000) {
            const icons = {
                primary: 'fa-check-circle',
                warn: 'fa-triangle-exclamation',
                error: 'fa-circle-xmark'
            };
            const t = document.createElement('div');
            t.className = `toast ${type}`;
            t.innerHTML = `<i class="fa-solid ${icons[type]||icons.primary}"></i> ${msg}`;
            document.getElementById('toastContainer').appendChild(t);
            setTimeout(() => {
                t.classList.add('fade-out');
                setTimeout(() => t.remove(), 400);
            }, dur);
        }

        function pad2(n) {
            return String(n).padStart(2, '0')
        }

        /* ══════════════════════════════════════════
           WELCOME → START
        ══════════════════════════════════════════ */
        document.getElementById('btnStart').addEventListener('click', () => {
            const nama = document.getElementById('pesertaNama').value.trim();
            const no = document.getElementById('pesertaNo').value.trim();
            if (!nama) {
                showToast('Nama lengkap wajib diisi!', 'error');
                document.getElementById('pesertaNama').focus();
                return;
            }
            if (!no) {
                showToast('Nomor peserta wajib diisi!', 'error');
                document.getElementById('pesertaNo').focus();
                return;
            }
            state.pesertaNama = nama;
            state.pesertaNo = no;

            // set topbar
            document.getElementById('userAvatarTop').textContent = nama.charAt(0).toUpperCase();
            document.getElementById('userNameTop').textContent = nama.split(' ')[0];
            document.getElementById('pesertaInfoSidebar').textContent = `${no} — ${nama.split(' ')[0]}`;

            buildQMap();
            renderQuestion();
            startTimer();
            showScreen('quiz');
            showToast('Tes dimulai! Semangat 💪');
        });

        /* ══════════════════════════════════════════
           TIMER
        ══════════════════════════════════════════ */
        function startTimer() {
            state.startTime = Date.now();
            state.timerInterval = setInterval(() => {
                state.timerLeft--;
                updateTimerDisplay();
                if (state.timerLeft <= 0) {
                    clearInterval(state.timerInterval);
                    autoSubmit();
                }
            }, 1000);
        }

        function updateTimerDisplay() {
            const m = Math.floor(state.timerLeft / 60);
            const s = state.timerLeft % 60;
            const mEl = document.getElementById('timerMin');
            const sEl = document.getElementById('timerSec');
            mEl.textContent = pad2(m);
            sEl.textContent = pad2(s);
            const isWarn = state.timerLeft <= 600;
            const isDanger = state.timerLeft <= 180;
            [mEl, sEl].forEach(el => {
                el.classList.toggle('warning', isWarn && !isDanger);
                el.classList.toggle('danger', isDanger);
            });
        }

        function autoSubmit() {
            showToast('Waktu habis! Jawaban dikumpulkan otomatis.', 'warn', 4000);
            finishQuiz();
        }

        /* ══════════════════════════════════════════
           BUILD QUESTION MAP
        ══════════════════════════════════════════ */
        function buildQMap() {
            const grid = document.getElementById('qmapGrid');
            grid.innerHTML = '';
            QUESTIONS.forEach((_, i) => {
                const btn = document.createElement('button');
                btn.className = 'qmap-btn';
                btn.textContent = i + 1;
                btn.addEventListener('click', () => {
                    state.currentQ = i;
                    renderQuestion();
                    updateQMap();
                });
                grid.appendChild(btn);
            });
        }

        function updateQMap() {
            const btns = document.querySelectorAll('.qmap-btn');
            btns.forEach((btn, i) => {
                btn.className = 'qmap-btn';
                if (state.answers[i] !== null) btn.classList.add('answered');
                if (state.flagged[i]) btn.classList.add('flagged');
                if (i === state.currentQ) btn.classList.add('current');
            });
            // progress
            const answered = state.answers.filter(a => a !== null).length;
            const pct = (answered / QUESTIONS.length) * 100;
            document.getElementById('progressFill').style.width = pct + '%';
            document.getElementById('progressText').textContent = `${answered} / ${QUESTIONS.length}`;
            // nav stats
            document.getElementById('statAnswered').textContent = answered;
            document.getElementById('statUnanswered').textContent = QUESTIONS.length - answered;
            document.getElementById('statFlagged').textContent = state.flagged.filter(Boolean).length;
        }

        /* ══════════════════════════════════════════
           RENDER QUESTION
        ══════════════════════════════════════════ */
        function renderQuestion() {
            const q = QUESTIONS[state.currentQ];
            const i = state.currentQ;

            document.getElementById('qBadgeNum').textContent = i + 1;
            document.getElementById('qNumVal').textContent = `${i+1} dari ${QUESTIONS.length}`;
            document.getElementById('questionText').innerHTML = q.text;

            // Category badge
            const catEl = document.getElementById('qCategory');
            catEl.className = 'qcard-category ' + q.cat;
            catEl.textContent = q.category;

            // Flag btn
            const flagBtn = document.getElementById('btnFlag');
            flagBtn.classList.toggle('flagged', state.flagged[i]);
            flagBtn.innerHTML = state.flagged[i] ?
                '<i class="fa-solid fa-flag"></i><span>Ditandai</span>' :
                '<i class="fa-regular fa-flag"></i><span>Tandai</span>';

            // Options
            const list = document.getElementById('optionsList');
            list.innerHTML = '';
            const keys = ['A', 'B', 'C', 'D'];
            q.options.forEach((opt, oi) => {
                const item = document.createElement('div');
                item.className = 'option-item' + (state.answers[i] === oi ? ' selected' : '');
                item.innerHTML = `
      <div class="option-key">${keys[oi]}</div>
      <div class="option-text">${opt}</div>
      <div class="option-check"><i class="fa-solid fa-check"></i></div>
    `;
                item.addEventListener('click', () => selectAnswer(i, oi));
                list.appendChild(item);
            });

            // Nav buttons
            document.getElementById('btnPrev').disabled = (i === 0);
            const isLast = (i === QUESTIONS.length - 1);
            document.getElementById('btnNext').style.display = isLast ? 'none' : 'flex';
            document.getElementById('btnSubmit').style.display = isLast ? 'flex' : 'none';

            updateQMap();
            // animate in
            document.querySelector('.question-card').style.animation = 'none';
            void document.querySelector('.question-card').offsetWidth;
            document.querySelector('.question-card').style.animation = 'screenIn .35s ease both';
        }

        /* ══════════════════════════════════════════
           SELECT ANSWER
        ══════════════════════════════════════════ */
        function selectAnswer(qIdx, optIdx) {
            if (state.finished) return;
            const wasNew = state.answers[qIdx] === null;
            state.answers[qIdx] = optIdx;

            // update UI without full re-render
            document.querySelectorAll('.option-item').forEach((el, i) => {
                el.classList.toggle('selected', i === optIdx);
            });
            updateQMap();
            if (wasNew) showToast('Jawaban tersimpan ✓', 'primary', 1500);
        }

        /* ══════════════════════════════════════════
           FLAG
        ══════════════════════════════════════════ */
        document.getElementById('btnFlag').addEventListener('click', () => {
            const i = state.currentQ;
            state.flagged[i] = !state.flagged[i];
            const flagBtn = document.getElementById('btnFlag');
            flagBtn.classList.toggle('flagged', state.flagged[i]);
            flagBtn.innerHTML = state.flagged[i] ?
                '<i class="fa-solid fa-flag"></i><span>Ditandai</span>' :
                '<i class="fa-regular fa-flag"></i><span>Tandai</span>';
            updateQMap();
            showToast(state.flagged[i] ? 'Soal ditandai untuk ditinjau kembali 🚩' : 'Tanda dihapus', 'warn', 1500);
        });

        /* ══════════════════════════════════════════
           NAVIGATION
        ══════════════════════════════════════════ */
        document.getElementById('btnPrev').addEventListener('click', () => {
            if (state.currentQ > 0) {
                state.currentQ--;
                renderQuestion();
            }
        });
        document.getElementById('btnNext').addEventListener('click', () => {
            if (state.currentQ < QUESTIONS.length - 1) {
                state.currentQ++;
                renderQuestion();
            }
        });

        /* ══════════════════════════════════════════
           SUBMIT
        ══════════════════════════════════════════ */
        document.getElementById('btnSubmit').addEventListener('click', () => openModal());

        function openModal() {
            const answered = state.answers.filter(a => a !== null).length;
            const skipped = QUESTIONS.length - answered;
            document.getElementById('mSumTotal').textContent = QUESTIONS.length;
            document.getElementById('mSumAnswered').textContent = answered;
            document.getElementById('mSumSkipped').textContent = skipped;
            const warnEl = document.getElementById('modalWarnText');
            warnEl.style.display = skipped > 0 ? 'flex' : 'none';
            document.getElementById('modalConfirm').classList.add('show');
        }

        document.getElementById('btnModalCancel').addEventListener('click', () => {
            document.getElementById('modalConfirm').classList.remove('show');
        });
        document.getElementById('btnModalConfirm').addEventListener('click', () => {
            document.getElementById('modalConfirm').classList.remove('show');
            finishQuiz();
        });

        /* ══════════════════════════════════════════
           FINISH QUIZ
        ══════════════════════════════════════════ */
        function finishQuiz() {
            state.finished = true;
            clearInterval(state.timerInterval);

            const benar = state.answers.filter((a, i) => a === QUESTIONS[i].answer).length;
            const salah = state.answers.filter((a, i) => a !== null && a !== QUESTIONS[i].answer).length;
            const skip = state.answers.filter(a => a === null).length;
            const nilai = Math.round((benar / QUESTIONS.length) * 100);
            const lulus = nilai >= 70;

            document.getElementById('resultTitle').textContent = lulus ? `Selamat, ${state.pesertaNama.split(' ')[0]}!` :
                `Tetap Semangat!`;
            document.getElementById('resultSubtitle').textContent = lulus ? 'Anda berhasil melewati batas nilai kelulusan' :
                'Anda belum memenuhi nilai kelulusan minimum';
            document.getElementById('resultEmoji').textContent = lulus ? '🏆' : '💪';

            document.getElementById('rStatBenar').textContent = benar;
            document.getElementById('rStatSalah').textContent = salah;
            document.getElementById('rStatSkip').textContent = skip;
            const m = Math.floor(state.timerLeft / 60),
                s = state.timerLeft % 60;
            document.getElementById('rStatTime').textContent = `${pad2(m)}:${pad2(s)}`;

            const statusEl = document.getElementById('scoreStatus');
            statusEl.textContent = lulus ? 'LULUS' : 'TIDAK LULUS';
            statusEl.className = 'score-status ' + (lulus ? 'status-lulus' : 'status-gagal');

            showScreen('result');

            // animate score
            let cur = 0;
            const scoreNumEl = document.getElementById('scoreNum');
            const step = nilai / 60;
            const interval = setInterval(() => {
                cur = Math.min(cur + step, nilai);
                scoreNumEl.textContent = Math.floor(cur);
                if (cur >= nilai) clearInterval(interval);
            }, 16);

            // SVG arc
            const circumference = 2 * Math.PI * 80;
            const fill = document.getElementById('scoreFill');
            setTimeout(() => {
                fill.style.strokeDashoffset = circumference - (nilai / 100) * circumference;
            }, 300);

            if (lulus) spawnConfetti();
            showToast(lulus ? `Nilai Anda: ${nilai} — Selamat!` : `Nilai Anda: ${nilai} — Terus berlatih`, lulus ?
                'primary' : 'warn', 5000);
        }

        /* ══════════════════════════════════════════
           CONFETTI
        ══════════════════════════════════════════ */
        function spawnConfetti() {
            const colors = ['#0d6e4e', '#14a372', '#f4a827', '#e4f7f0', '#fde9b8', '#fff'];
            const container = document.getElementById('confettiContainer');
            for (let i = 0; i < 80; i++) {
                const el = document.createElement('div');
                el.className = 'confetti-piece';
                el.style.cssText = `
      left:${Math.random()*100}%;
      background:${colors[Math.floor(Math.random()*colors.length)]};
      width:${6+Math.random()*8}px;
      height:${6+Math.random()*8}px;
      border-radius:${Math.random()>.5?'50%':'2px'};
      --dur:${2+Math.random()*3}s;
      --delay:${Math.random()*2}s;
      --drift:${(Math.random()-.5)*200}px;
    `;
                container.appendChild(el);
                setTimeout(() => el.remove(), (2 + 3 + 2) * 1000);
            }
        }

        /* ══════════════════════════════════════════
           REVIEW (simple - go back to quiz)
        ══════════════════════════════════════════ */
        document.getElementById('btnReview').addEventListener('click', () => {
            showScreen('quiz');
            renderQuestion();
        });

        /* ══════════════════════════════════════════
           INIT
        ══════════════════════════════════════════ */
        showScreen('welcome');
    </script>
</body>

</html>

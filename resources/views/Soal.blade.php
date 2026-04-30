<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengisian Kuis — Sistem Rekrutmen RSD</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Fraunces:wght@600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.5/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>
    <style>
        /* ══════════════════════════════════════════════
   ROOT TOKENS
══════════════════════════════════════════════ */
        :root {
            --primary: #0d6e4e;
            --primary-light: #14a372;
            --primary-pale: #e4f7f0;
            --primary-dark: #09503a;
            --accent: #f4a827;
            --accent-light: #fde9b8;
            --accent-dark: #c4830d;
            --danger: #e85d5d;
            --danger-light: #fdf0f0;
            --text-dark: #1a2e25;
            --text-mid: #3d5246;
            --text-muted: #7a9488;
            --bg: #f0f7f4;
            --white: #ffffff;
            --border: #c8e6d8;
            --border-mid: #a3d4be;
            --shadow: 0 2px 16px rgba(13, 110, 78, 0.08);
            --shadow-md: 0 6px 28px rgba(13, 110, 78, 0.12);
            --shadow-lg: 0 16px 56px rgba(13, 110, 78, 0.16);
            --radius: 18px;
            --radius-sm: 10px;
            --radius-xs: 6px;
            --radius-xl: 28px;
            --font: 'Plus Jakarta Sans', sans-serif;
            --font-display: 'Fraunces', serif;
            --ease: cubic-bezier(.4, 0, .2, 1);
        }

        /* ══════════════════════════════════════════════
   RESET & BASE
══════════════════════════════════════════════ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html {
            scroll-behavior: smooth;
            -webkit-text-size-adjust: 100%
        }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--text-dark);
            min-height: 100vh;
            overflow-x: hidden;
            line-height: 1.6;
        }

        ::selection {
            background: var(--primary-pale);
            color: var(--primary)
        }

        ::-webkit-scrollbar {
            width: 5px;
            height: 5px
        }

        ::-webkit-scrollbar-track {
            background: var(--primary-pale)
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-mid);
            border-radius: 99px
        }

        /* ══════════════════════════════════════════════
   BACKGROUND PATTERN
══════════════════════════════════════════════ */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                radial-gradient(circle at 15% 20%, rgba(13, 110, 78, .06) 0%, transparent 50%),
                radial-gradient(circle at 85% 80%, rgba(244, 168, 39, .07) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(20, 163, 114, .04) 0%, transparent 70%);
            pointer-events: none;
        }

        /* ══════════════════════════════════════════════
   LAYOUT
══════════════════════════════════════════════ */
        .page {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh
        }

        /* ── Top Nav ── */
        .topnav {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 24px;
            height: 60px;
            display: flex;
            align-items: center;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 12px rgba(13, 110, 78, .07);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none
        }

        .nav-logo {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 10px rgba(13, 110, 78, .3);
        }

        .nav-logo svg {
            width: 18px;
            height: 18px;
            fill: #fff
        }

        .nav-title {
            font-family: var(--font-display);
            font-size: 17px;
            color: var(--primary);
            letter-spacing: -.3px
        }

        .nav-sub {
            font-size: 11px;
            color: var(--text-muted);
            margin-left: 2px
        }

        .nav-divider {
            width: 1px;
            height: 24px;
            background: var(--border)
        }

        .nav-breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--text-muted)
        }

        .nav-breadcrumb .sep {
            color: var(--border-mid)
        }

        .nav-breadcrumb .cur {
            color: var(--primary);
            font-weight: 600
        }

        .nav-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 10px
        }

        .nav-badge {
            background: var(--primary-pale);
            border: 1px solid var(--border);
            border-radius: var(--radius-xs);
            padding: 5px 11px;
            font-size: 12px;
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
        }

        /* ── Main Layout ── */
        .main-wrap {
            flex: 1;
            display: grid;
            grid-template-columns: 260px 1fr 300px;
            gap: 0;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
            padding: 24px 20px;
            gap: 20px;
        }

        /* ══════════════════════════════════════════════
   LEFT PANEL — SOAL LIST
══════════════════════════════════════════════ */
        .panel-left {
            display: flex;
            flex-direction: column;
            gap: 12px
        }

        .panel-header {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px;
            box-shadow: var(--shadow);
        }

        .panel-header h2 {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 7px
        }

        .panel-header h2 .icon {
            font-size: 16px
        }

        .btn-add-soal {
            width: 100%;
            padding: 11px;
            border-radius: var(--radius-sm);
            background: var(--primary);
            color: #fff;
            border: none;
            cursor: pointer;
            font-family: var(--font);
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            transition: all .2s var(--ease);
        }

        .btn-add-soal:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(13, 110, 78, .28)
        }

        .soal-list {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 10px;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            gap: 6px;
            max-height: calc(100vh - 180px);
            overflow-y: auto;
        }

        .soal-list:empty::after {
            content: 'Belum ada soal. Klik "+ Tambah Soal" untuk memulai.';
            font-size: 12px;
            color: var(--text-muted);
            text-align: center;
            padding: 20px 10px;
            display: block;
        }

        .soal-item {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 10px 12px;
            border-radius: var(--radius-xs);
            border: 1.5px solid transparent;
            cursor: pointer;
            transition: all .18s var(--ease);
            background: var(--white);
            position: relative;
        }

        .soal-item:hover {
            background: var(--primary-pale);
            border-color: var(--border)
        }

        .soal-item.active {
            background: var(--primary-pale);
            border-color: var(--primary)
        }

        .soal-item.sortable-ghost {
            opacity: .4;
            background: var(--primary-pale)
        }

        .drag-handle {
            color: var(--border-mid);
            font-size: 13px;
            cursor: grab;
            display: flex;
            flex-direction: column;
            gap: 2px;
            align-items: center;
            flex-shrink: 0;
        }

        .drag-handle:active {
            cursor: grabbing
        }

        .drag-handle span {
            display: block;
            width: 12px;
            height: 1.5px;
            background: currentColor;
            border-radius: 1px
        }

        .soal-item-num {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            background: var(--primary);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .soal-item.active .soal-item-num {
            background: var(--primary-dark)
        }

        .soal-item-text {
            font-size: 12px;
            color: var(--text-mid);
            flex: 1;
            line-height: 1.4;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical
        }

        .soal-item-cat {
            font-size: 10px;
            color: var(--text-muted);
            margin-top: 2px
        }

        .soal-item-status {
            flex-shrink: 0;
            font-size: 14px
        }

        .soal-item-del {
            flex-shrink: 0;
            width: 22px;
            height: 22px;
            border-radius: 4px;
            background: none;
            border: 1px solid transparent;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .15s;
            opacity: 0;
        }

        .soal-item:hover .soal-item-del {
            opacity: 1
        }

        .soal-item-del:hover {
            background: var(--danger-light);
            border-color: #f0c5c5;
            color: var(--danger)
        }

        /* ══════════════════════════════════════════════
   CENTER PANEL — EDITOR
══════════════════════════════════════════════ */
        .panel-center {
            display: flex;
            flex-direction: column;
            gap: 16px
        }

        .editor-header {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 18px 22px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .editor-header-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(13, 110, 78, .25);
        }

        .editor-header-text h2 {
            font-family: var(--font-display);
            font-size: 19px;
            color: var(--primary);
            letter-spacing: -.2px
        }

        .editor-header-text p {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 1px
        }

        .editor-actions {
            margin-left: auto;
            display: flex;
            gap: 8px
        }

        .editor-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
            animation: fadeSlideIn .28s var(--ease);
        }

        @keyframes fadeSlideIn {
            from {
                opacity: 0;
                transform: translateY(10px)
            }

            to {
                opacity: 1;
                transform: none
            }
        }

        /* ── Section Title ── */
        .section-title {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: .8px;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border)
        }

        /* ── Form Fields ── */
        .field-group {
            margin-bottom: 18px
        }

        .field-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-mid);
            margin-bottom: 6px;
        }

        .field-label .req {
            color: var(--danger);
            margin-left: 2px
        }

        .field-label .char-count {
            font-size: 11px;
            font-weight: 400;
            color: var(--text-muted)
        }

        .field-hint {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 5px
        }

        textarea,
        input[type=text],
        select {
            width: 100%;
            font-family: var(--font);
            font-size: 13px;
            color: var(--text-dark);
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 11px 14px;
            outline: none;
            transition: all .2s var(--ease);
            resize: vertical;
        }

        textarea:focus,
        input[type=text]:focus,
        select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(20, 163, 114, .12);
            background: var(--white);
        }

        textarea::placeholder,
        input::placeholder {
            color: var(--text-muted);
            font-size: 13px
        }

        textarea {
            min-height: 90px;
            line-height: 1.6
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%237a9488' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px
        }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        .field-row.three {
            grid-template-columns: 1fr 1fr 1fr
        }

        /* ── Difficulty Radio ── */
        .diff-group {
            display: flex;
            gap: 8px
        }

        .diff-option {
            flex: 1;
            padding: 10px 8px;
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--border);
            cursor: pointer;
            text-align: center;
            transition: all .18s var(--ease);
            position: relative;
            overflow: hidden;
        }

        .diff-option input {
            position: absolute;
            opacity: 0;
            inset: 0
        }

        .diff-option .d-icon {
            font-size: 18px;
            display: block;
            margin-bottom: 4px
        }

        .diff-option .d-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted)
        }

        .diff-option .d-sub {
            font-size: 10px;
            color: var(--text-muted);
            margin-top: 1px
        }

        .diff-option:hover {
            border-color: var(--border-mid);
            background: var(--primary-pale)
        }

        .diff-option.selected-easy {
            border-color: #14a372;
            background: #e4f7f0
        }

        .diff-option.selected-easy .d-label {
            color: var(--primary)
        }

        .diff-option.selected-medium {
            border-color: var(--accent);
            background: var(--accent-light)
        }

        .diff-option.selected-medium .d-label {
            color: var(--accent-dark)
        }

        .diff-option.selected-hard {
            border-color: var(--danger);
            background: var(--danger-light)
        }

        .diff-option.selected-hard .d-label {
            color: var(--danger)
        }

        /* ── Options Builder ── */
        .options-builder {
            display: flex;
            flex-direction: column;
            gap: 10px
        }

        .option-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 14px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            background: var(--white);
            transition: all .2s var(--ease);
            position: relative;
        }

        .option-item:hover {
            border-color: var(--border-mid);
            box-shadow: 0 2px 10px rgba(13, 110, 78, .07)
        }

        .option-item.is-correct {
            border-color: var(--primary);
            background: var(--primary-pale)
        }

        .option-item.drag-ghost {
            opacity: .35
        }

        .opt-drag {
            color: var(--border-mid);
            cursor: grab;
            padding-top: 3px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .opt-drag:active {
            cursor: grabbing
        }

        .opt-drag span {
            display: block;
            width: 10px;
            height: 1.5px;
            background: currentColor;
            border-radius: 1px
        }

        .opt-letter-badge {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            flex-shrink: 0;
            background: var(--primary-pale);
            color: var(--primary);
            border: 1.5px solid var(--border);
            transition: all .15s;
        }

        .option-item.is-correct .opt-letter-badge {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary)
        }

        .opt-input {
            flex: 1;
            border: none;
            outline: none;
            padding: 5px 0;
            font-family: var(--font);
            font-size: 13px;
            color: var(--text-dark);
            background: transparent;
            resize: none;
            min-height: 30px;
            line-height: 1.5;
        }

        .opt-input::placeholder {
            color: var(--text-muted)
        }

        .opt-controls {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0
        }

        .btn-correct {
            padding: 5px 10px;
            border-radius: 6px;
            border: 1.5px solid var(--border);
            background: var(--white);
            font-family: var(--font);
            font-size: 11px;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
            transition: all .15s;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .btn-correct:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-pale)
        }

        .option-item.is-correct .btn-correct {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary)
        }

        .btn-del-opt {
            width: 26px;
            height: 26px;
            border-radius: 6px;
            border: 1.5px solid transparent;
            background: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .15s;
        }

        .btn-del-opt:hover {
            background: var(--danger-light);
            border-color: #f0c5c5;
            color: var(--danger)
        }

        .btn-del-opt:disabled {
            opacity: .3;
            cursor: not-allowed
        }

        .correct-indicator {
            position: absolute;
            top: -1px;
            right: -1px;
            background: var(--primary);
            color: #fff;
            font-size: 9px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 0 var(--radius-sm) 0 6px;
            opacity: 0;
            transition: opacity .15s;
        }

        .option-item.is-correct .correct-indicator {
            opacity: 1
        }

        .btn-add-option {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px;
            border-radius: var(--radius-sm);
            border: 1.5px dashed var(--border);
            background: none;
            color: var(--text-muted);
            cursor: pointer;
            font-family: var(--font);
            font-size: 13px;
            transition: all .18s var(--ease);
            width: 100%;
        }

        .btn-add-option:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-pale)
        }

        /* ── Explanation ── */
        .explanation-wrap {
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            overflow: hidden;
        }

        .explanation-header {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            background: var(--primary-pale);
            font-size: 12px;
            font-weight: 600;
            color: var(--text-mid);
            cursor: pointer;
            border-bottom: 1px solid var(--border);
            user-select: none;
        }

        .explanation-header .toggle-icon {
            margin-left: auto;
            font-size: 11px;
            color: var(--text-muted);
            transition: transform .2s
        }

        .explanation-wrap.open .toggle-icon {
            transform: rotate(180deg)
        }

        .explanation-body {
            display: none;
            padding: 12px 14px
        }

        .explanation-wrap.open .explanation-body {
            display: block
        }

        /* ── Tags / Media toggles ── */
        .toggle-chips {
            display: flex;
            gap: 6px;
            flex-wrap: wrap
        }

        .toggle-chip {
            padding: 6px 13px;
            border-radius: 99px;
            border: 1.5px solid var(--border);
            background: var(--white);
            font-family: var(--font);
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
            transition: all .15s var(--ease);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .toggle-chip:hover {
            border-color: var(--primary);
            color: var(--primary)
        }

        .toggle-chip.active {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff
        }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            font-family: var(--font);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            border: 1.5px solid transparent;
            transition: all .2s var(--ease);
            outline: none;
        }

        .btn-sm {
            padding: 7px 14px;
            font-size: 12px
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary)
        }

        .btn-primary:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(13, 110, 78, .28)
        }

        .btn-primary:active {
            transform: none
        }

        .btn-outline {
            background: var(--white);
            color: var(--text-mid);
            border-color: var(--border)
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-pale)
        }

        .btn-accent {
            background: var(--accent);
            color: var(--text-dark);
            border-color: var(--accent)
        }

        .btn-accent:hover {
            background: var(--accent-dark);
            color: #fff;
            transform: translateY(-1px)
        }

        .btn-ghost {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-family: var(--font);
            font-size: 13px;
            font-weight: 600;
            padding: 8px 12px;
            border-radius: var(--radius-xs);
            transition: all .15s;
            display: inline-flex;
            align-items: center;
            gap: 6px
        }

        .btn-ghost:hover {
            background: var(--primary-pale);
            color: var(--primary)
        }

        /* ── Save bar ── */
        .save-bar {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 14px 20px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .save-bar .unsaved-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
            animation: blink 1.5s infinite
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .3
            }
        }

        .save-bar .save-info {
            font-size: 13px;
            color: var(--text-mid)
        }

        .save-bar .save-info strong {
            color: var(--text-dark)
        }

        .save-bar .save-actions {
            margin-left: auto;
            display: flex;
            gap: 8px
        }

        /* ══════════════════════════════════════════════
   RIGHT PANEL — PREVIEW + SETTINGS
══════════════════════════════════════════════ */
        .panel-right {
            display: flex;
            flex-direction: column;
            gap: 12px
        }

        /* ── Quiz Settings ── */
        .settings-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 18px;
            box-shadow: var(--shadow);
        }

        .settings-card h3 {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 7px
        }

        .settings-card h3 .sicon {
            font-size: 16px
        }

        .settings-field {
            margin-bottom: 12px
        }

        .settings-field label {
            font-size: 11px;
            font-weight: 600;
            color: var(--text-muted);
            display: block;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: .4px
        }

        .settings-field input,
        .settings-field select,
        .settings-field textarea {
            font-size: 12px;
            padding: 8px 12px
        }

        .settings-field textarea {
            min-height: 60px;
            resize: none
        }

        .toggle-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 9px 0;
            border-bottom: 1px solid var(--primary-pale);
        }

        .toggle-row:last-child {
            border-bottom: none
        }

        .toggle-row .t-label {
            font-size: 12px;
            color: var(--text-mid);
            font-weight: 500
        }

        .toggle-row .t-sub {
            font-size: 10px;
            color: var(--text-muted)
        }

        /* Toggle switch */
        .toggle-switch {
            position: relative;
            width: 38px;
            height: 22px;
            flex-shrink: 0
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute
        }

        .toggle-track {
            position: absolute;
            inset: 0;
            border-radius: 11px;
            background: var(--border);
            cursor: pointer;
            transition: background .2s;
        }

        .toggle-switch input:checked+.toggle-track {
            background: var(--primary)
        }

        .toggle-track::before {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #fff;
            top: 3px;
            left: 3px;
            transition: transform .2s var(--ease);
            box-shadow: 0 1px 4px rgba(0, 0, 0, .2);
        }

        .toggle-switch input:checked+.toggle-track::before {
            transform: translateX(16px)
        }

        /* ── Preview Card ── */
        .preview-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 18px;
            box-shadow: var(--shadow);
            flex: 1;
        }

        .preview-card h3 {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 7px
        }

        .preview-soal {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 14px;
            font-size: 12px;
        }

        .prev-q-badge {
            display: inline-block;
            background: var(--primary);
            color: #fff;
            border-radius: 5px;
            padding: 3px 10px;
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .prev-q-text {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            line-height: 1.5;
            margin-bottom: 12px
        }

        .prev-options {
            display: flex;
            flex-direction: column;
            gap: 6px
        }

        .prev-opt {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 10px;
            border-radius: 6px;
            border: 1.5px solid var(--border);
            background: var(--white);
            font-size: 12px;
            color: var(--text-mid);
        }

        .prev-opt.is-correct {
            border-color: var(--primary);
            background: var(--primary-pale);
            color: var(--primary);
            font-weight: 600
        }

        .prev-opt-letter {
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: var(--primary-pale);
            color: var(--primary);
            font-size: 10px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .prev-opt.is-correct .prev-opt-letter {
            background: var(--primary);
            color: #fff
        }

        /* ── Stats Card ── */
        .stats-mini {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px 18px;
            box-shadow: var(--shadow);
        }

        .stats-mini h3 {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 7px
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px
        }

        .stat-mini-item {
            background: var(--primary-pale);
            border-radius: var(--radius-xs);
            padding: 10px 12px;
            text-align: center;
        }

        .stat-mini-val {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary)
        }

        .stat-mini-lbl {
            font-size: 10px;
            color: var(--text-muted);
            margin-top: 2px
        }

        /* ══════════════════════════════════════════════
   EMPTY STATE
══════════════════════════════════════════════ */
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            animation: fadeSlideIn .3s var(--ease);
        }

        .empty-state .es-icon {
            font-size: 48px;
            margin-bottom: 14px;
            display: block;
            opacity: .7
        }

        .empty-state h3 {
            font-family: var(--font-display);
            font-size: 18px;
            color: var(--primary);
            margin-bottom: 6px
        }

        .empty-state p {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.6;
            max-width: 280px;
            margin: 0 auto 20px
        }

        /* ══════════════════════════════════════════════
   PROGRESS STEPPER (top of editor)
══════════════════════════════════════════════ */
        .stepper {
            display: flex;
            align-items: center;
            gap: 0;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 14px 20px;
            box-shadow: var(--shadow);
            overflow-x: auto;
        }

        .step-item {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .step-circle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            border: 2px solid var(--border);
            color: var(--text-muted);
            background: var(--white);
            transition: all .2s;
            flex-shrink: 0;
        }

        .step-item.done .step-circle {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff
        }

        .step-item.active .step-circle {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-pale)
        }

        .step-text {
            font-size: 12px;
            font-weight: 500;
            color: var(--text-muted)
        }

        .step-item.done .step-text,
        .step-item.active .step-text {
            color: var(--primary)
        }

        .step-connector {
            width: 24px;
            height: 2px;
            background: var(--border);
            margin: 0 4px;
            flex-shrink: 0
        }

        .step-item.done~.step-connector,
        .step-item.done+.step-connector {
            background: var(--primary)
        }

        /* ══════════════════════════════════════════════
   RESPONSIVE
══════════════════════════════════════════════ */
        @media(max-width:1100px) {
            .main-wrap {
                grid-template-columns: 220px 1fr;
                grid-template-rows: auto auto
            }

            .panel-right {
                grid-column: 1/-1;
                grid-row: 3
            }

            .stats-grid {
                grid-template-columns: repeat(4, 1fr)
            }
        }

        @media(max-width:700px) {
            .main-wrap {
                grid-template-columns: 1fr;
                padding: 12px
            }

            .panel-left {
                display: none
            }

            .field-row,
            .field-row.three {
                grid-template-columns: 1fr
            }

            .topnav {
                padding: 0 14px
            }

            .nav-breadcrumb {
                display: none
            }
        }

        /* ══════════════════════════════════════════════
   ANIMATIONS
══════════════════════════════════════════════ */
        @keyframes popIn {
            0% {
                transform: scale(.85) translateY(6px);
                opacity: 0
            }

            70% {
                transform: scale(1.03)
            }

            100% {
                transform: scale(1) translateY(0);
                opacity: 1
            }
        }

        .pop-in {
            animation: popIn .22s var(--ease)
        }

        /* ══════════════════════════════════════════════
   NOTYF OVERRIDE
══════════════════════════════════════════════ */
        .notyf__toast {
            border-radius: var(--radius-sm) !important;
            font-family: var(--font) !important
        }
    </style>
</head>

<body>

    <div class="page">

        <!-- ─── TOP NAV ─── -->
        <nav class="topnav">
            <a class="nav-brand" href="#">
                <div class="nav-logo">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zm-7 3a1 1 0 011 1v3h3a1 1 0 010 2h-3v3a1 1 0 01-2 0v-3H8a1 1 0 010-2h3V7a1 1 0 011-1z" />
                    </svg>
                </div>
                <div>
                    <div class="nav-title">RSD Rekrutmen</div>
                </div>
            </a>
            <div class="nav-divider"></div>
            <div class="nav-breadcrumb">
                <span>Admin</span>
                <span class="sep">›</span>
                <span>Bank Soal</span>
                <span class="sep">›</span>
                <span class="cur">Pengisian Kuis</span>
            </div>
            <div class="nav-right">
                <div class="nav-badge" id="soalCountBadge">📋 0 Soal</div>
                <button class="btn btn-sm btn-outline" onclick="previewQuiz()">👁 Preview</button>
                <button class="btn btn-sm btn-primary" onclick="publishQuiz()">🚀 Terbitkan</button>
                <div class="nav-avatar" title="Admin">AD</div>
            </div>
        </nav>

        <!-- ─── MAIN LAYOUT ─── -->
        <div class="main-wrap">

            <!-- ══ LEFT: SOAL LIST ══ -->
            <aside class="panel-left">
                <div class="panel-header">
                    <h2><span class="icon">📋</span> Daftar Soal</h2>
                    <button class="btn-add-soal" onclick="addNewSoal()">
                        <span style="font-size:16px">＋</span> Tambah Soal
                    </button>
                </div>
                <div class="soal-list" id="soalList"></div>
            </aside>

            <!-- ══ CENTER: EDITOR ══ -->
            <div class="panel-center">

                <!-- Stepper -->
                <div class="stepper">
                    <div class="step-item done" id="step1">
                        <div class="step-circle">1</div>
                        <div class="step-text">Info Kuis</div>
                    </div>
                    <div class="step-connector"></div>
                    <div class="step-item active" id="step2">
                        <div class="step-circle">2</div>
                        <div class="step-text">Buat Soal</div>
                    </div>
                    <div class="step-connector"></div>
                    <div class="step-item" id="step3">
                        <div class="step-circle">3</div>
                        <div class="step-text">Tinjau &amp; Terbitkan</div>
                    </div>
                </div>

                <!-- Editor Header -->
                <div class="editor-header">
                    <div class="editor-header-icon">✏️</div>
                    <div class="editor-header-text">
                        <h2>Editor Soal</h2>
                        <p>Isi detail soal pilihan ganda di bawah ini</p>
                    </div>
                    <div class="editor-actions">
                        <button class="btn btn-sm btn-ghost" onclick="duplicateSoal()" id="btnDuplicate">⧉
                            Duplikat</button>
                        <button class="btn btn-sm btn-ghost" onclick="clearEditor()" id="btnClear">↺ Reset</button>
                    </div>
                </div>

                <!-- Editor Main -->
                <div id="editorArea">

                    <!-- Empty State -->
                    <div class="editor-card" id="emptyState">
                        <div class="empty-state">
                            <span class="es-icon">📝</span>
                            <h3>Mulai Buat Soal</h3>
                            <p>Klik tombol <strong>"+ Tambah Soal"</strong> di panel kiri untuk membuat soal pertama,
                                atau gunakan tombol di bawah.</p>
                            <button class="btn btn-primary" onclick="addNewSoal()">＋ Buat Soal Pertama</button>
                        </div>
                    </div>

                    <!-- Editor Form (hidden initially) -->
                    <div id="editorForm" style="display:none;display:flex;flex-direction:column;gap:16px">

                        <!-- Card 1: Informasi Soal -->
                        <div class="editor-card">
                            <div class="section-title">Informasi Soal</div>

                            <div class="field-row three">
                                <div class="field-group" style="margin-bottom:0">
                                    <div class="field-label">Kategori <span class="req">*</span></div>
                                    <select id="fKategori" onchange="updatePreview()">
                                        <option value="">-- Pilih --</option>
                                        <option>Pengetahuan Umum RS</option>
                                        <option>Keselamatan Pasien</option>
                                        <option>Prosedur Klinis</option>
                                        <option>Regulasi Kesehatan</option>
                                        <option>Rekam Medis</option>
                                        <option>PPI &amp; Keselamatan Kerja</option>
                                        <option>Farmasi Klinik</option>
                                        <option>Etika &amp; Hukum Medis</option>
                                        <option>Manajemen &amp; Akreditasi</option>
                                        <option>Gawat Darurat</option>
                                        <option>Keperawatan</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                                <div class="field-group" style="margin-bottom:0">
                                    <div class="field-label">Poin <span class="req">*</span></div>
                                    <select id="fPoin" onchange="markUnsaved()">
                                        <option value="5">5 poin</option>
                                        <option value="10" selected>10 poin</option>
                                        <option value="15">15 poin</option>
                                        <option value="20">20 poin</option>
                                    </select>
                                </div>
                                <div class="field-group" style="margin-bottom:0">
                                    <div class="field-label">Batas Waktu</div>
                                    <select id="fWaktu" onchange="markUnsaved()">
                                        <option value="0">Tanpa batas</option>
                                        <option value="30">30 detik</option>
                                        <option value="60">60 detik</option>
                                        <option value="90">90 detik</option>
                                        <option value="120">2 menit</option>
                                    </select>
                                </div>
                            </div>

                            <div style="margin-top:14px">
                                <div class="field-label">Tingkat Kesulitan <span class="req">*</span></div>
                                <div class="diff-group">
                                    <div class="diff-option" id="diffEasy" onclick="setDiff('easy')">
                                        <input type="radio" name="difficulty" value="easy">
                                        <span class="d-icon">🟢</span>
                                        <div class="d-label">Mudah</div>
                                        <div class="d-sub">Dasar</div>
                                    </div>
                                    <div class="diff-option" id="diffMedium" onclick="setDiff('medium')">
                                        <input type="radio" name="difficulty" value="medium">
                                        <span class="d-icon">🟡</span>
                                        <div class="d-label">Sedang</div>
                                        <div class="d-sub">Menengah</div>
                                    </div>
                                    <div class="diff-option" id="diffHard" onclick="setDiff('hard')">
                                        <input type="radio" name="difficulty" value="hard">
                                        <span class="d-icon">🔴</span>
                                        <div class="d-label">Sulit</div>
                                        <div class="d-sub">Lanjutan</div>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:14px">
                                <div class="field-label">Tag / Label</div>
                                <div class="toggle-chips" id="tagChips">
                                    <button type="button" class="toggle-chip" onclick="toggleTag(this,'UKMPPD')">📚
                                        UKMPPD</button>
                                    <button type="button" class="toggle-chip"
                                        onclick="toggleTag(this,'Kompetensi')">🏥 Kompetensi</button>
                                    <button type="button" class="toggle-chip"
                                        onclick="toggleTag(this,'Regulasi')">⚖️ Regulasi</button>
                                    <button type="button" class="toggle-chip" onclick="toggleTag(this,'Praktik')">🩺
                                        Praktik</button>
                                    <button type="button" class="toggle-chip" onclick="toggleTag(this,'Etika')">🤝
                                        Etika</button>
                                    <button type="button" class="toggle-chip" onclick="toggleTag(this,'Farmasi')">💊
                                        Farmasi</button>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Pertanyaan -->
                        <div class="editor-card">
                            <div class="section-title">Pertanyaan</div>

                            <div class="field-group">
                                <div class="field-label">
                                    Teks Soal <span class="req">*</span>
                                    <span class="char-count" id="qCharCount">0 / 500 karakter</span>
                                </div>
                                <textarea id="fSoal" placeholder="Tuliskan pertanyaan di sini... Gunakan kalimat yang jelas dan tidak ambigu."
                                    maxlength="500" oninput="onSoalInput()" rows="4"></textarea>
                                <div class="field-hint">💡 Gunakan kalimat yang jelas, hindari kata negatif ganda
                                    (seperti "bukan tidak..."). Soal harus fokus pada satu konsep.</div>
                            </div>

                            <div>
                                <div class="field-label">Lampiran (Opsional)</div>
                                <div class="toggle-chips">
                                    <button type="button" class="toggle-chip"
                                        onclick="toggleAttach(this,'gambar')">🖼 Gambar</button>
                                    <button type="button" class="toggle-chip"
                                        onclick="toggleAttach(this,'tabel')">📊 Tabel Data</button>
                                    <button type="button" class="toggle-chip"
                                        onclick="toggleAttach(this,'kasus')">📋 Vignette/Kasus</button>
                                </div>
                            </div>

                            <!-- Vignette area (shows when toggled) -->
                            <div id="vignetteArea" style="display:none;margin-top:12px">
                                <div class="field-label">Teks Vignette / Skenario Kasus</div>
                                <textarea id="fVignette"
                                    placeholder="Tulis skenario kasus pasien di sini. Contoh: Seorang pasien laki-laki 45 tahun datang ke IGD dengan keluhan nyeri dada sejak 2 jam yang lalu..."
                                    rows="5" oninput="markUnsaved()"></textarea>
                            </div>
                        </div>

                        <!-- Card 3: Pilihan Jawaban -->
                        <div class="editor-card">
                            <div class="section-title" style="justify-content:space-between">
                                <span style="display:flex;align-items:center;gap:8px">
                                    Pilihan Jawaban
                                    <span style="font-size:11px;font-weight:400;color:var(--text-muted)">(seret untuk
                                        urutkan)</span>
                                </span>
                            </div>
                            <div class="options-builder" id="optionsBuilder"></div>
                            <div style="margin-top:10px">
                                <button type="button" class="btn-add-option" id="btnAddOption"
                                    onclick="addOption()">
                                    <span style="font-size:16px">＋</span> Tambah Pilihan
                                </button>
                            </div>
                            <div
                                style="margin-top:10px;padding:10px 13px;background:var(--accent-light);border-radius:var(--radius-xs);font-size:12px;color:var(--accent-dark);display:flex;align-items:center;gap:7px">
                                <span>💡</span>
                                <span>Klik <strong>"Tandai Benar"</strong> pada pilihan yang merupakan jawaban yang
                                    benar. Pastikan hanya ada <strong>satu jawaban benar</strong>.</span>
                            </div>
                        </div>

                        <!-- Card 4: Pembahasan -->
                        <div class="editor-card">
                            <div class="section-title">Pembahasan &amp; Referensi</div>
                            <div class="explanation-wrap open" id="explanationWrap">
                                <div class="explanation-header" onclick="toggleExplanation()">
                                    <span>💡</span>
                                    <span>Pembahasan Jawaban</span>
                                    <span class="toggle-icon">▲</span>
                                </div>
                                <div class="explanation-body">
                                    <div class="field-group" style="margin-bottom:12px">
                                        <div class="field-label">Penjelasan Jawaban <span class="req">*</span>
                                        </div>
                                        <textarea id="fPembahasan"
                                            placeholder="Jelaskan mengapa jawaban tersebut benar, dan mengapa pilihan lain kurang tepat. Pembahasan yang baik membantu peserta belajar dari kesalahan."
                                            rows="4" oninput="markUnsaved()"></textarea>
                                        <div class="field-hint">Pembahasan akan ditampilkan kepada peserta setelah
                                            menjawab soal.</div>
                                    </div>
                                    <div class="field-row">
                                        <div class="field-group" style="margin-bottom:0">
                                            <div class="field-label">Referensi</div>
                                            <input type="text" id="fReferensi"
                                                placeholder="cth: Kemenkes RI, 2023" oninput="markUnsaved()">
                                        </div>
                                        <div class="field-group" style="margin-bottom:0">
                                            <div class="field-label">Halaman / Pasal</div>
                                            <input type="text" id="fHalaman" placeholder="cth: Pasal 14, Hal. 32"
                                                oninput="markUnsaved()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Save Bar -->
                        <div class="save-bar" id="saveBar">
                            <span class="unsaved-dot" id="unsavedDot" style="display:none"></span>
                            <span class="save-info" id="saveInfo">Soal belum disimpan</span>
                            <div class="save-actions">
                                <button class="btn btn-sm btn-outline" onclick="saveSoalDraft()">💾 Simpan
                                    Draft</button>
                                <button class="btn btn-sm btn-primary" onclick="saveSoal()">✓ Simpan Soal</button>
                            </div>
                        </div>

                    </div><!-- /editorForm -->
                </div><!-- /editorArea -->
            </div><!-- /panel-center -->

            <!-- ══ RIGHT: SETTINGS + PREVIEW ══ -->
            <div class="panel-right">

                <!-- Quiz Info -->
                <div class="settings-card">
                    <h3><span class="sicon">⚙️</span> Pengaturan Kuis</h3>
                    <div class="settings-field">
                        <label>Nama Kuis</label>
                        <input type="text" id="sNama" value="Tes Kompetensi Rekrutmen RSD"
                            oninput="markUnsaved()">
                    </div>
                    <div class="settings-field">
                        <label>Deskripsi</label>
                        <textarea id="sDeskripsi" placeholder="Deskripsi kuis..." oninput="markUnsaved()">Tes kompetensi untuk seleksi pegawai baru RSD mencakup pengetahuan klinis, regulasi, dan etika pelayanan kesehatan.</textarea>
                    </div>
                    <div class="field-row">
                        <div class="settings-field" style="margin-bottom:0">
                            <label>Durasi (menit)</label>
                            <input type="text" id="sDurasi" value="30" oninput="markUnsaved()">
                        </div>
                        <div class="settings-field" style="margin-bottom:0">
                            <label>Nilai Lulus (%)</label>
                            <input type="text" id="sLulus" value="70" oninput="markUnsaved()">
                        </div>
                    </div>
                    <div style="margin-top:14px">
                        <div class="toggle-row">
                            <div>
                                <div class="t-label">Acak Urutan Soal</div>
                                <div class="t-sub">Soal tampil acak tiap peserta</div>
                            </div>
                            <label class="toggle-switch"><input type="checkbox" checked
                                    onchange="markUnsaved()"><span class="toggle-track"></span></label>
                        </div>
                        <div class="toggle-row">
                            <div>
                                <div class="t-label">Acak Pilihan Jawaban</div>
                                <div class="t-sub">Opsi A-D diacak tiap soal</div>
                            </div>
                            <label class="toggle-switch"><input type="checkbox" checked
                                    onchange="markUnsaved()"><span class="toggle-track"></span></label>
                        </div>
                        <div class="toggle-row">
                            <div>
                                <div class="t-label">Tampilkan Pembahasan</div>
                                <div class="t-sub">Setelah menjawab tiap soal</div>
                            </div>
                            <label class="toggle-switch"><input type="checkbox" checked
                                    onchange="markUnsaved()"><span class="toggle-track"></span></label>
                        </div>
                        <div class="toggle-row">
                            <div>
                                <div class="t-label">Kuis Aktif</div>
                                <div class="t-sub">Peserta dapat mengakses kuis</div>
                            </div>
                            <label class="toggle-switch"><input type="checkbox" onchange="markUnsaved()"><span
                                    class="toggle-track"></span></label>
                        </div>
                    </div>
                </div>

                <!-- Preview -->
                <div class="preview-card">
                    <h3><span>👁</span> Pratinjau Soal</h3>
                    <div class="preview-soal" id="previewArea">
                        <div style="text-align:center;padding:20px 10px;font-size:12px;color:var(--text-muted)">
                            Pratinjau akan muncul saat soal sedang diedit
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="stats-mini">
                    <h3><span>📊</span> Statistik Bank Soal</h3>
                    <div class="stats-grid">
                        <div class="stat-mini-item">
                            <div class="stat-mini-val" id="statTotal">0</div>
                            <div class="stat-mini-lbl">Total Soal</div>
                        </div>
                        <div class="stat-mini-item">
                            <div class="stat-mini-val" id="statEasy">0</div>
                            <div class="stat-mini-lbl">Mudah</div>
                        </div>
                        <div class="stat-mini-item">
                            <div class="stat-mini-val" id="statMedium">0</div>
                            <div class="stat-mini-lbl">Sedang</div>
                        </div>
                        <div class="stat-mini-item">
                            <div class="stat-mini-val" id="statHard">0</div>
                            <div class="stat-mini-lbl">Sulit</div>
                        </div>
                    </div>
                    <div style="margin-top:10px">
                        <div
                            style="display:flex;justify-content:space-between;font-size:11px;color:var(--text-muted);margin-bottom:4px">
                            <span>Total Poin</span>
                            <span id="statPoin" style="font-weight:600;color:var(--primary)">0 poin</span>
                        </div>
                        <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--text-muted)">
                            <span>Kategori Tercakup</span>
                            <span id="statKat" style="font-weight:600;color:var(--primary)">0 kategori</span>
                        </div>
                    </div>
                </div>

            </div><!-- /panel-right -->
        </div><!-- /main-wrap -->
    </div><!-- /page -->

    <script>
        /* ═══════════════════════════════════════════
       STATE
    ═══════════════════════════════════════════ */
        let soalBank = [];
        let currentSoalId = null;
        let currentOptions = [];
        let currentDiff = 'medium';
        let correctIndex = -1;
        let unsaved = false;
        let activeTags = [];

        const notyf = new Notyf({
            duration: 2800,
            position: {
                x: 'right',
                y: 'top'
            },
            types: [{
                    type: 'success',
                    background: '#0d6e4e'
                },
                {
                    type: 'error',
                    background: '#e85d5d'
                }
            ]
        });

        const LETTERS = ['A', 'B', 'C', 'D', 'E'];

        /* ═══════════════════════════════════════════
           INIT
        ═══════════════════════════════════════════ */
        window.addEventListener('DOMContentLoaded', () => {
            // Load sample soal
            const samples = [{
                    id: 1,
                    kategori: 'Keselamatan Pasien',
                    poin: 10,
                    diff: 'medium',
                    soal: 'Prinsip "Do No Harm" dalam etika medis mengharuskan tenaga kesehatan untuk mengutamakan apa?',
                    options: ['Keuntungan finansial RS', 'Keselamatan dan kesejahteraan pasien',
                        'Efisiensi waktu pelayanan', 'Kepuasan dokter senior'
                    ],
                    correct: 1,
                    pembahasan: 'Nonmaleficence atau "Do No Harm" adalah prinsip dasar etika medis.',
                    referensi: 'Beauchamp & Childress, 2019',
                    halaman: 'Hal. 150',
                    tags: ['Etika'],
                    saved: true
                },
                {
                    id: 2,
                    kategori: 'Prosedur Klinis',
                    poin: 10,
                    diff: 'easy',
                    soal: 'Prosedur cuci tangan WHO yang benar terdiri dari berapa langkah?',
                    options: ['4 langkah', '5 langkah', '6 langkah', '7 langkah'],
                    correct: 2,
                    pembahasan: 'WHO menetapkan 6 langkah cuci tangan yang harus dilakukan minimal 20 detik.',
                    referensi: 'WHO Hand Hygiene Guidelines',
                    halaman: '',
                    tags: ['Praktik'],
                    saved: true
                }
            ];
            samples.forEach(s => soalBank.push(s));
            renderSoalList();
            updateStats();
        });

        /* ═══════════════════════════════════════════
           SOAL LIST
        ═══════════════════════════════════════════ */
        function renderSoalList() {
            const list = document.getElementById('soalList');
            list.innerHTML = '';
            if (!soalBank.length) {
                updateBadge();
                return;
            }

            soalBank.forEach((s, i) => {
                const el = document.createElement('div');
                el.className = 'soal-item' + (s.id === currentSoalId ? ' active' : '');
                el.dataset.id = s.id;
                el.innerHTML = `
      <div class="drag-handle"><span></span><span></span><span></span></div>
      <div class="soal-item-num">${i+1}</div>
      <div style="flex:1;min-width:0">
        <div class="soal-item-text">${s.soal || '(Soal belum diisi)'}</div>
        <div class="soal-item-cat">${s.kategori || '—'} · ${s.poin} poin</div>
      </div>
      <div class="soal-item-status">${s.saved ? '✅' : '⏳'}</div>
      <button class="soal-item-del" onclick="deleteSoal(event,${s.id})">✕</button>
    `;
                el.addEventListener('click', (e) => {
                    if (e.target.classList.contains('soal-item-del')) return;
                    loadSoal(s.id);
                });
                list.appendChild(el);
            });

            // Sortable
            if (window._sortable) window._sortable.destroy();
            window._sortable = new Sortable(list, {
                animation: 150,
                handle: '.drag-handle',
                ghostClass: 'sortable-ghost',
                onEnd: () => {
                    const ids = [...list.querySelectorAll('.soal-item')].map(el => Number(el.dataset.id));
                    soalBank = ids.map(id => soalBank.find(s => s.id === id));
                    renderSoalList();
                    updateStats();
                }
            });

            updateBadge();
        }

        function updateBadge() {
            document.getElementById('soalCountBadge').textContent = '📋 ' + soalBank.length + ' Soal';
        }

        /* ═══════════════════════════════════════════
           ADD / LOAD / DELETE SOAL
        ═══════════════════════════════════════════ */
        function addNewSoal() {
            if (unsaved && currentSoalId) {
                Swal.fire({
                    title: 'Simpan perubahan?',
                    text: 'Soal aktif belum disimpan. Simpan sebelum beralih?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Simpan Dulu',
                    cancelButtonText: 'Abaikan',
                    confirmButtonColor: '#0d6e4e',
                    cancelButtonColor: '#7a9488'
                }).then(r => {
                    if (r.isConfirmed) saveSoal(false);
                    createNewSoal();
                });
                return;
            }
            createNewSoal();
        }

        function createNewSoal() {
            const id = Date.now();
            const newSoal = {
                id,
                kategori: '',
                poin: 10,
                diff: 'medium',
                soal: '',
                options: ['', '', '', ''],
                correct: 0,
                pembahasan: '',
                referensi: '',
                halaman: '',
                tags: [],
                saved: false
            };
            soalBank.push(newSoal);
            loadSoal(id);
            renderSoalList();
            updateStats();
            notyf.success('Soal baru ditambahkan!');
        }

        function loadSoal(id) {
            const s = soalBank.find(x => x.id === id);
            if (!s) return;
            currentSoalId = id;
            currentDiff = s.diff || 'medium';
            correctIndex = s.correct;
            activeTags = [...(s.tags || [])];

            document.getElementById('fKategori').value = s.kategori || '';
            document.getElementById('fPoin').value = s.poin || 10;
            document.getElementById('fWaktu').value = s.waktu || 0;
            document.getElementById('fSoal').value = s.soal || '';
            document.getElementById('fPembahasan').value = s.pembahasan || '';
            document.getElementById('fReferensi').value = s.referensi || '';
            document.getElementById('fHalaman').value = s.halaman || '';
            updateCharCount();

            setDiff(currentDiff, false);
            renderTagChips();

            currentOptions = [...(s.options || ['', '', '', ''])];
            renderOptions();
            updatePreview();
            showEditor();
            markSaved();

            document.querySelectorAll('.soal-item').forEach(el => {
                el.classList.toggle('active', Number(el.dataset.id) === id);
            });
        }

        function deleteSoal(e, id) {
            e.stopPropagation();
            Swal.fire({
                title: 'Hapus soal ini?',
                text: 'Tindakan ini tidak dapat dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#e85d5d',
                cancelButtonColor: '#7a9488'
            }).then(r => {
                if (r.isConfirmed) {
                    soalBank = soalBank.filter(s => s.id !== id);
                    if (currentSoalId === id) {
                        currentSoalId = null;
                        hideEditor();
                    }
                    renderSoalList();
                    updateStats();
                    notyf.error('Soal dihapus.');
                }
            });
        }

        function duplicateSoal() {
            if (!currentSoalId) {
                notyf.error('Tidak ada soal aktif.');
                return;
            }
            const orig = soalBank.find(s => s.id === currentSoalId);
            if (!orig) return;
            const copy = {
                ...orig,
                id: Date.now(),
                soal: '(Salinan) ' + orig.soal,
                saved: false
            };
            soalBank.push(copy);
            renderSoalList();
            updateStats();
            loadSoal(copy.id);
            notyf.success('Soal berhasil diduplikat!');
        }

        /* ═══════════════════════════════════════════
           EDITOR SHOW/HIDE
        ═══════════════════════════════════════════ */
        function showEditor() {
            document.getElementById('emptyState').style.display = 'none';
            const f = document.getElementById('editorForm');
            f.style.display = 'flex';
            f.style.flexDirection = 'column';
            f.style.gap = '16px';
            f.classList.add('pop-in');
            setTimeout(() => f.classList.remove('pop-in'), 300);
        }

        function hideEditor() {
            document.getElementById('emptyState').style.display = 'block';
            document.getElementById('editorForm').style.display = 'none';
        }

        /* ═══════════════════════════════════════════
           OPTIONS
        ═══════════════════════════════════════════ */
        function renderOptions() {
            const builder = document.getElementById('optionsBuilder');
            builder.innerHTML = '';
            currentOptions.forEach((opt, i) => {
                const el = createOptionEl(opt, i, i === correctIndex);
                builder.appendChild(el);
            });
            // Sortable options
            if (window._optSortable) window._optSortable.destroy();
            window._optSortable = new Sortable(builder, {
                animation: 150,
                handle: '.opt-drag',
                ghostClass: 'drag-ghost',
                onEnd: evt => {
                    const moved = currentOptions.splice(evt.oldIndex, 1)[0];
                    currentOptions.splice(evt.newIndex, 0, moved);
                    if (correctIndex === evt.oldIndex) correctIndex = evt.newIndex;
                    else if (evt.oldIndex < correctIndex && evt.newIndex >= correctIndex) correctIndex--;
                    else if (evt.oldIndex > correctIndex && evt.newIndex <= correctIndex) correctIndex++;
                    renderOptions();
                    updatePreview();
                    markUnsaved();
                }
            });

            // Show/hide add button
            document.getElementById('btnAddOption').style.display = currentOptions.length >= 5 ? 'none' : '';
        }

        function createOptionEl(text, idx, isCorrect) {
            const div = document.createElement('div');
            div.className = 'option-item' + (isCorrect ? ' is-correct' : '') + ' pop-in';
            div.dataset.idx = idx;
            div.innerHTML = `
    <div class="opt-drag"><span></span><span></span><span></span></div>
    <div class="opt-letter-badge">${LETTERS[idx]}</div>
    <textarea class="opt-input" rows="1" placeholder="Tulis pilihan jawaban ${LETTERS[idx]}..." oninput="onOptInput(${idx},this)">${text}</textarea>
    <div class="opt-controls">
      <button type="button" class="btn-correct" onclick="setCorrect(${idx})">
        ${isCorrect ? '✓ Benar' : '○ Tandai Benar'}
      </button>
      <button type="button" class="btn-del-opt" onclick="removeOption(${idx})" ${currentOptions.length <= 2 ? 'disabled' : ''} title="Hapus pilihan">✕</button>
    </div>
    <div class="correct-indicator">✓ BENAR</div>
  `;
            // Auto-resize textarea
            const ta = div.querySelector('.opt-input');
            ta.addEventListener('input', () => {
                ta.style.height = 'auto';
                ta.style.height = ta.scrollHeight + 'px';
            });
            setTimeout(() => {
                ta.style.height = 'auto';
                ta.style.height = ta.scrollHeight + 'px';
            }, 10);
            return div;
        }

        function onOptInput(idx, el) {
            currentOptions[idx] = el.value;
            updatePreview();
            markUnsaved();
        }

        function setCorrect(idx) {
            correctIndex = idx;
            renderOptions();
            updatePreview();
            markUnsaved();
        }

        function addOption() {
            if (currentOptions.length >= 5) {
                notyf.error('Maksimal 5 pilihan jawaban.');
                return;
            }
            currentOptions.push('');
            renderOptions();
            markUnsaved();
            // Focus new input
            setTimeout(() => {
                const inputs = document.querySelectorAll('.opt-input');
                if (inputs.length) inputs[inputs.length - 1].focus();
            }, 100);
        }

        function removeOption(idx) {
            if (currentOptions.length <= 2) {
                notyf.error('Minimal 2 pilihan jawaban.');
                return;
            }
            currentOptions.splice(idx, 1);
            if (correctIndex === idx) correctIndex = 0;
            else if (correctIndex > idx) correctIndex--;
            renderOptions();
            updatePreview();
            markUnsaved();
        }

        /* ═══════════════════════════════════════════
           DIFFICULTY
        ═══════════════════════════════════════════ */
        function setDiff(val, doUpdate = true) {
            currentDiff = val;
            ['easy', 'medium', 'hard'].forEach(d => {
                const el = document.getElementById('diff' + d.charAt(0).toUpperCase() + d.slice(1));
                el.className = 'diff-option' + (d === val ? ' selected-' + d : '');
            });
            if (doUpdate) markUnsaved();
        }

        /* ═══════════════════════════════════════════
           TAGS
        ═══════════════════════════════════════════ */
        function toggleTag(el, tag) {
            const idx = activeTags.indexOf(tag);
            if (idx >= 0) {
                activeTags.splice(idx, 1);
                el.classList.remove('active');
            } else {
                activeTags.push(tag);
                el.classList.add('active');
            }
            markUnsaved();
        }

        function renderTagChips() {
            document.querySelectorAll('#tagChips .toggle-chip').forEach(chip => {
                const tag = chip.getAttribute('onclick').match(/'([^']+)'\)/)?.[1];
                if (tag) chip.classList.toggle('active', activeTags.includes(tag));
            });
        }

        /* ═══════════════════════════════════════════
           CHAR COUNT
        ═══════════════════════════════════════════ */
        function updateCharCount() {
            const val = document.getElementById('fSoal').value.length;
            const cc = document.getElementById('qCharCount');
            cc.textContent = val + ' / 500 karakter';
            cc.style.color = val > 450 ? 'var(--accent-dark)' : val > 490 ? 'var(--danger)' : 'var(--text-muted)';
        }

        function onSoalInput() {
            updateCharCount();
            updatePreview();
            markUnsaved();
        }

        /* ═══════════════════════════════════════════
           UNSAVED STATE
        ═══════════════════════════════════════════ */
        function markUnsaved() {
            unsaved = true;
            document.getElementById('unsavedDot').style.display = '';
            document.getElementById('saveInfo').innerHTML = '⚠ Ada perubahan yang belum disimpan';
        }

        function markSaved() {
            unsaved = false;
            document.getElementById('unsavedDot').style.display = 'none';
            document.getElementById('saveInfo').innerHTML = '✅ Tersimpan';
        }

        /* ═══════════════════════════════════════════
           SAVE
        ═══════════════════════════════════════════ */
        function validateForm() {
            const soal = document.getElementById('fSoal').value.trim();
            const kat = document.getElementById('fKategori').value;
            const pembahasan = document.getElementById('fPembahasan').value.trim();
            const filledOpts = currentOptions.filter(o => o.trim());
            const errors = [];
            if (!kat) errors.push('Pilih kategori soal');
            if (!soal) errors.push('Teks soal tidak boleh kosong');
            if (filledOpts.length < 2) errors.push('Isi minimal 2 pilihan jawaban');
            if (correctIndex < 0 || !currentOptions[correctIndex]?.trim()) errors.push('Tentukan jawaban yang benar');
            if (!pembahasan) errors.push('Isi pembahasan jawaban');
            return errors;
        }

        function saveSoal(notify = true) {
            const errors = validateForm();
            if (errors.length) {
                Swal.fire({
                    title: 'Soal belum lengkap',
                    html: '<ul style="text-align:left;padding-left:20px;margin-top:6px">' + errors.map(e =>
                        `<li style="margin:4px 0;font-size:13px">${e}</li>`).join('') + '</ul>',
                    icon: 'warning',
                    confirmButtonColor: '#0d6e4e'
                });
                return;
            }
            saveToBank(true);
            if (notify) notyf.success('Soal berhasil disimpan! ✓');
        }

        function saveSoalDraft() {
            saveToBank(false);
            notyf.open({
                type: 'warning',
                message: 'Draft disimpan 💾',
                background: '#f4a827'
            });
        }

        function saveToBank(saved) {
            const idx = soalBank.findIndex(s => s.id === currentSoalId);
            if (idx < 0) return;
            soalBank[idx] = {
                id: currentSoalId,
                kategori: document.getElementById('fKategori').value,
                poin: Number(document.getElementById('fPoin').value),
                waktu: Number(document.getElementById('fWaktu').value),
                diff: currentDiff,
                soal: document.getElementById('fSoal').value.trim(),
                options: [...currentOptions],
                correct: correctIndex,
                pembahasan: document.getElementById('fPembahasan').value.trim(),
                referensi: document.getElementById('fReferensi').value.trim(),
                halaman: document.getElementById('fHalaman').value.trim(),
                tags: [...activeTags],
                saved
            };
            markSaved();
            renderSoalList();
            updateStats();
        }

        function clearEditor() {
            Swal.fire({
                title: 'Reset editor?',
                text: 'Semua perubahan pada soal ini akan dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Reset',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#e85d5d',
                cancelButtonColor: '#7a9488'
            }).then(r => {
                if (r.isConfirmed && currentSoalId) {
                    const s = soalBank.find(x => x.id === currentSoalId);
                    if (s) loadSoal(s.id);
                    else hideEditor();
                }
            });
        }

        /* ═══════════════════════════════════════════
           PREVIEW
        ═══════════════════════════════════════════ */
        function updatePreview() {
            const soal = document.getElementById('fSoal')?.value?.trim() || '';
            const area = document.getElementById('previewArea');
            if (!soal && !currentOptions.some(o => o.trim())) {
                area.innerHTML =
                    '<div style="text-align:center;padding:20px 10px;font-size:12px;color:var(--text-muted)">Pratinjau akan muncul saat soal sedang diedit</div>';
                return;
            }
            const optsHtml = currentOptions.map((opt, i) => {
                if (!opt.trim()) return '';
                return `<div class="prev-opt ${i===correctIndex?'is-correct':''}">
      <div class="prev-opt-letter">${LETTERS[i]}</div>
      <span>${opt || '—'}</span>
      ${i===correctIndex?'<span style="margin-left:auto;font-size:11px;font-weight:700">✓</span>':''}
    </div>`;
            }).join('');
            area.innerHTML = `
    <div class="prev-q-badge">Soal</div>
    <div class="prev-q-text">${soal || '(Soal belum diisi)'}</div>
    <div class="prev-options">${optsHtml || '<div style="font-size:12px;color:var(--text-muted)">Pilihan belum diisi</div>'}</div>
  `;
        }

        /* ═══════════════════════════════════════════
           STATS
        ═══════════════════════════════════════════ */
        function updateStats() {
            const saved = soalBank.filter(s => s.saved);
            const easy = saved.filter(s => s.diff === 'easy').length;
            const med = saved.filter(s => s.diff === 'medium').length;
            const hard = saved.filter(s => s.diff === 'hard').length;
            const totalPts = saved.reduce((a, s) => a + s.poin, 0);
            const cats = new Set(saved.map(s => s.kategori).filter(Boolean));
            document.getElementById('statTotal').textContent = soalBank.length;
            document.getElementById('statEasy').textContent = easy;
            document.getElementById('statMedium').textContent = med;
            document.getElementById('statHard').textContent = hard;
            document.getElementById('statPoin').textContent = totalPts + ' poin';
            document.getElementById('statKat').textContent = cats.size + ' kategori';
        }

        /* ═══════════════════════════════════════════
           EXPLANATION TOGGLE
        ═══════════════════════════════════════════ */
        function toggleExplanation() {
            document.getElementById('explanationWrap').classList.toggle('open');
        }

        /* ═══════════════════════════════════════════
           ATTACHMENT
        ═══════════════════════════════════════════ */
        function toggleAttach(el, type) {
            el.classList.toggle('active');
            if (type === 'kasus') {
                document.getElementById('vignetteArea').style.display = el.classList.contains('active') ? 'block' : 'none';
            }
        }

        /* ═══════════════════════════════════════════
           PUBLISH / PREVIEW
        ═══════════════════════════════════════════ */
        function publishQuiz() {
            const savedCount = soalBank.filter(s => s.saved).length;
            if (!savedCount) {
                notyf.error('Belum ada soal yang disimpan!');
                return;
            }
            Swal.fire({
                title: 'Terbitkan Kuis?',
                html: `<p>Kuis akan diterbitkan dengan <strong>${savedCount} soal</strong>.<br>Peserta dapat mulai mengakses setelah kuis diaktifkan di pengaturan.</p>`,
                icon: 'success',
                showCancelButton: true,
                confirmButtonText: 'Ya, Terbitkan 🚀',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#0d6e4e',
                cancelButtonColor: '#7a9488'
            }).then(r => {
                if (r.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil Diterbitkan! 🎉',
                        html: `<p>Kuis <strong>${document.getElementById('sNama').value}</strong> berhasil diterbitkan.</p><p style="margin-top:8px;font-size:13px;color:#7a9488">Aktifkan toggle "Kuis Aktif" di pengaturan untuk membuka akses peserta.</p>`,
                        icon: 'success',
                        confirmButtonColor: '#0d6e4e'
                    });
                }
            });
        }

        function previewQuiz() {
            const savedCount = soalBank.filter(s => s.saved).length;
            Swal.fire({
                title: 'Preview Kuis',
                html: `<div style="text-align:left;font-size:13px">
      <p><strong>Nama:</strong> ${document.getElementById('sNama').value}</p>
      <p style="margin-top:6px"><strong>Total soal tersimpan:</strong> ${savedCount} soal</p>
      <p style="margin-top:6px"><strong>Durasi:</strong> ${document.getElementById('sDurasi').value} menit</p>
      <p style="margin-top:6px"><strong>Nilai lulus:</strong> ${document.getElementById('sLulus').value}%</p>
      <p style="margin-top:10px;color:#7a9488">Buka file <em>rsd-rekrutmen-kuis.html</em> untuk preview tampilan peserta.</p>
    </div>`,
                icon: 'info',
                confirmButtonColor: '#0d6e4e',
                confirmButtonText: 'Mengerti'
            });
        }

        /* ═══════════════════════════════════════════
           AUTO-LOAD FIRST SOAL
        ═══════════════════════════════════════════ */
        setTimeout(() => {
            if (soalBank.length) loadSoal(soalBank[0].id);
        }, 100);
    </script>
</body>

</html>

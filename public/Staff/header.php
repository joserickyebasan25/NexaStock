<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexaStock | Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: radial-gradient(circle at top left, #1e1b4b, #0f172a, #020617);
            min-height: 100vh;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }
        .sidebar-active {
            background: linear-gradient(90deg, rgba(139, 92, 246, 0.2) 0%, transparent 100%);
            border-left: 4px solid #8b5cf6;
            color: #ddd6fe;
        }
        .hover-3d:hover {
            transform: translateY(-5px) scale(1.02);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="text-slate-200 font-sans">
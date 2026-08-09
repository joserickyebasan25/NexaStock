<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEXAStock</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css">
    <script src=" https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p8Oe3YvM5Q3F4B+0kzzyrZoI3c1Yz5q3JDK0aGyWm8JKlZC0pm1OzT5t8CjJoYK9z1K4Tc4G3X+vHg9r3XvE6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </script>
</head>
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    .loader-ring {
        width: 54px;
        height: 54px;
        border: 3px solid rgba(255, 255, 255, 0.12);
        border-top-color: #38bdf8;
        border-radius: 9999px;
        animation: spin 0.85s linear infinite;
    }
    .loading-bar {
        width: 45%;
        animation: loading-progress 1.35s ease-in-out infinite;
    }
    #loginTransition.show {
        display: flex;
        animation: fade-in 0.3s ease forwards;
    }
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    @keyframes loading-progress {
        0% { transform: translateX(-110%); }
        55% { transform: translateX(75%); }
        100% { transform: translateX(230%); }
    }
    @keyframes fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
<body class="bg-sky-100 text-gray-800">

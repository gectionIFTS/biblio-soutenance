<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            color: #333;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color:rgba(173, 173, 176, 0.73);
            flex-direction: column;
        }

        .glass-container {
            background: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .glass-container a {
            color: #007bff;
            text-decoration: none;
            transition: 0.3s;
        }

        .glass-container a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .button-return {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background:rgb(17, 17, 17);
            color: white;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(106, 104, 104, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .button-return:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>
    <div class="glass-container">
    <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
        <h2>Bienvenue</h2>
        
        <div>
            {{ $slot }}
        </div>
    </div>

    <a href="{{ url()->previous() }}" class="button-return">Retour</a>
</body>
</html>

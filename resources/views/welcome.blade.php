<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter & S'inscrire</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            background-color:rgb(255, 255, 255);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative;
        }

        /* Logo en haut à gauche avec une taille encore plus réduite */
        .logo-container {
            position: absolute;
            top: 5px; /* Encore plus haut */
            left: 10px;
        }

        .logo-container a {
            display: block;
        }

        .logo-container x-application-logo {
            width: 35px; /* Réduction de la taille */
            height: 35px;
        }

        .title-container {
            background:rgb(36, 34, 209);
            padding: 20px 40px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgb(0, 0, 0);
            margin-bottom: 20px;
            text-align: center;
        }

        .title {
            font-size: 26px;
            font-weight: bold;
            color: #fff;
            margin: 0;
        }

        .bottom-section {
            background: #fff;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgb(0, 0, 0);
            display: inline-block;
        }

        .buttons-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 10px;
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            border-radius: 8px;
            background-color: #28a745;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: bold;
            box-shadow: 0 3px 8px rgb(0, 0, 0);
        }

        .button:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .footer {
            font-size: 14px;
            color: #333;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <!-- Logo en haut à gauche avec une taille encore plus réduite -->
    <div class="logo-container">
        <a href="/">
            <x-application-logo class="w-9 h-9 fill-current text-gray-500" />
        </a>
    </div>

    <div class="title-container">
        <div class="title">Nous vous souhaitons la bienvenue à la bibliothèque de l'IFTS</div>
    </div>

    <div class="bottom-section">
        <div class="buttons-container">
            <a href="{{ route('login') }}" class="button">Connexion</a>
            <a href="{{ route('register') }}" class="button">S'inscrire</a>
        </div>
        <div class="footer">Plateforme de Gestion des Documents de Soutenance</div>
    </div>

</body>
</html>

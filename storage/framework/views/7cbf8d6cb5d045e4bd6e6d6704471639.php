<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Se connecter & S'inscrire</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #e0f7fa, #80deea);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 20px;
      overflow-x: hidden;
    }

    .apropos-button {
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 10px 20px;
      background: linear-gradient(135deg, #007bff, #0056b3);
      color: white;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      font-weight: bold;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      z-index: 1000;
    }

    .apropos-button:hover {
      transform: scale(1.05);
    }

    .iftstext {
      text-align: center;
      margin-top: 80px;
      margin-bottom: 30px;
    }

    .iftstext .blue {
      color: #0003b1;
      font-size: 1.4rem;
      font-weight: 600;
      font-family: Georgia, serif;
    }

    .iftstext .orange {
      color: #ff8c00;
      font-size: 1.6rem;
      font-weight: 700;
    }

    .iftstext .black {
      color: #000;
      font-size: 0.9rem;
      font-family: 'Times New Roman', Times, serif;
    }

    .welcome-section {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 20px;
      max-width: 1200px;
      width: 100%;
    }

    .welcome-image {
      width: 100%;
      max-width: 400px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
    }

    .title-container {
      background: linear-gradient(135deg, #3949ab, #5c6bc0);
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(34, 34, 36, 0.6);
      color: #fff;
      font-size: 1.4rem;
      text-align: center;
      margin-bottom: 20px;
    }

    .bottom-section {
      background: white;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .buttons-container {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
      margin-bottom: 10px;
    }

    .button {
      padding: 12px 24px;
      font-size: 1rem;
      text-decoration: none;
      color: white;
      border-radius: 30px;
      background: linear-gradient(135deg, #43a047, #388e3c);
      transition: transform 0.3s ease;
      font-weight: bold;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .button:hover {
      transform: translateY(-3px);
    }

    .footer {
      font-size: 0.8rem;
      color: #555;
      margin-top: 10px;
    }

    /* MODAL */
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      align-items: center;
      justify-content: center;
      padding: 20px;
      animation: fadeIn 0.3s ease;
    }

    .modal-content {
      background: white;
      padding: 25px;
      border-radius: 20px;
      width: 100%;
      max-width: 600px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
      position: relative;
      animation: slideUp 0.4s ease;
    }

    .modal-content h2 {
      font-family: 'Times New Roman', Times, serif;
      margin-bottom: 15px;
    }

    .modal-content p {
      text-align: justify;
      font-family: 'Times New Roman', Times, serif;
      font-size: 1rem;
      line-height: 1.6;
    }

    .close {
      color: #333;
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover {
      color: #e53935;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes slideUp {
      from { transform: translateY(50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
  </style>
</head>
<body>

  <button class="apropos-button" onclick="document.getElementById('aproposModal').style.display='flex'">À propos</button>

  <div class="iftstext">
    <div class="blue">INSTITUT DE FORMATION TECHNIQUE SUPERIEURE</div>
    <div class="orange">I F T S</div>
    <div class="black">Institution privée agréée par l’Etat (Arrêté N°01/007/METFPA/CAB/SG/CPO)</div>
  </div>

  <div class="welcome-section">
    <img src="<?php echo e(asset('images/loscar.png')); ?>" alt="Loscar" class="welcome-image" />

    <div style="flex: 1; min-width: 280px; max-width: 500px;">
      <div class="title-container">
        Nous vous souhaitons la bienvenue<br />à la bibliothèque de l'IFTS
      </div>

      <div class="bottom-section">
        <div class="buttons-container">
          <a href="<?php echo e(route('login')); ?>" class="button">Connexion</a>
          <a href="<?php echo e(route('register')); ?>" class="button">S'inscrire</a>
        </div>
        <div class="footer">Plateforme de Gestion des Documents de Soutenance • © 2025 IFTS</div>
      </div>
    </div>
  </div>

  <!-- MODALE -->
  <div id="aproposModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="document.getElementById('aproposModal').style.display='none'">&times;</span>
      <h2>Plateforme MemorySpace</h2>
      <p>
        Bienvenue sur la plateforme de gestion des documents de soutenance de l’IFTS.<br>
        Ici, vous pouvez consulter les documents en toute simplicité.<br><br>
        Si vous êtes étudiant de cet établissement, approchez le bibliothécaire pour accéder directement aux documents.<br>
        Si vous êtes un étudiant externe, vous pouvez faire une demande d’accès après consultation des descriptions.<br><br>
        Pour commencer, veuillez vous connecter ou créer un compte.
      </p>
    </div>
  </div>

  <script>
    // Fermer le modal en cliquant à l’extérieur
    window.onclick = function(event) {
      var modal = document.getElementById('aproposModal');
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>
</html>
<?php /**PATH C:\Users\carlo\Desktop\IFTS PROJET DE FIN D'ETUDE\bibliotogo\resources\views/welcome.blade.php ENDPATH**/ ?>
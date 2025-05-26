<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture du Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(220, 220, 220);
            color: #333;
            margin: 0;
            padding: 0;
            user-select: none; /* Empêche la sélection de texte */
        }

        .content-container {
            margin-top: 50px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(31, 8, 205, 0.7);
            text-align: center;
        }

        .pdf-container {
            width: 100%;
            height: 600px;
            border: none;
        }
    </style>

    <script>
        // Bloquer le clic droit
        document.addEventListener('contextmenu', event => event.preventDefault());

        // Bloquer les raccourcis clavier pour la console et l'enregistrement
        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey && (event.key === 's' || event.key === 'u' || event.key === 'p')) {
                event.preventDefault();
            }
            if (event.key === 'F12' || (event.ctrlKey && event.shiftKey && event.key === 'I')) {
                event.preventDefault();
            }
        });

        // Désactiver le glisser-déposer
        document.addEventListener('dragstart', event => event.preventDefault());
        document.addEventListener('drop', event => event.preventDefault());

        // Désactiver l'inspection d'élément via DevTools
        (function() {
            let devtools = false;
            setInterval(() => {
                if (window.outerHeight - window.innerHeight > 200 || window.outerWidth - window.innerWidth > 200) {
                    document.body.innerHTML = "<h1 style='text-align:center; margin-top:20%; color:red;'>L'accès à cette page est interdit</h1>";
                }
            }, 1000);
        })();
    </script>
</head>
<body>

    <div class="content-container">
        <h1>Lecture du Document</h1>

        <!-- Affichage du PDF -->
        <iframe class="pdf-container" src="<?php echo e(Storage::url($document->chemin_fichier)); ?>#toolbar=0"></iframe>
    </div>

</body>
</html>
<?php /**PATH C:\Users\carlo\Desktop\IFTS PROJET DE FIN D'ETUDE\bibliotogo\resources\views/layouts/documents/lecture.blade.php ENDPATH**/ ?>
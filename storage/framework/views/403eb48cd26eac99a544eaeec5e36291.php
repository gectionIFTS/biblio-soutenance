<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importer des utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-gray-100">
    <div class="navbar-container">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="container">
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <main class="main-content">
            <div class=" mx-auto bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold text-center text-gray-700 mb-5">Importer des utilisateurs</h2>

                <?php if(session('success')): ?>
                    <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <form id="uploadForm" method="POST" enctype="multipart/form-data" action="<?php echo e(route('import.users')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" id="dropzone" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div id="dropzone-content" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Cliquez ou glissez-déposez</span></p>
                                <p class="text-xs text-gray-500">Formats acceptés : XLSX, XLS, CSV</p>
                            </div>
                            <input id="dropzone-file" type="file" name="file" class="hidden" accept=".xlsx, .xls, .csv" required />
                        </label>
                    </div>

                    <p id="file-name" class="text-center text-gray-600 mt-2 hidden"></p>
                    <div id="previewTable" class="mt-8 bg-white shadow-md rounded-lg p-6 hidden">
                        <h2 class="text-xl font-bold text-gray-700 mb-4">Aperçu des utilisateurs</h2>
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">Nom</th>
                                    <th class="border px-4 py-2">Prenoms</th>
                                    <th class="border px-4 py-2">Matricules</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 w-full mt-4">
                            Confirmer l'importation
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
    <script>
        const fileInput = document.getElementById('dropzone-file');
        const dropzone = document.getElementById('dropzone');
        const tableBody = document.getElementById('tableBody');
        const previewTable = document.getElementById('previewTable');
        let usersData = [];

        // ✅ Gestion du Drag & Drop
        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('bg-gray-200');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('bg-gray-200');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('bg-gray-200');
            if (e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                handleFileSelect();
            }
        });

        fileInput.addEventListener('change', handleFileSelect);

        function handleFileSelect() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const reader = new FileReader();
                reader.onload = function(event) {
                    const data = new Uint8Array(event.target.result);
                    processExcelData(data);
                };
                reader.readAsArrayBuffer(file); // ✅ Lire en binaire
            }
        }

        function processExcelData(data) {
            const workbook = XLSX.read(data, { type: "array" });
            const sheetName = workbook.SheetNames[0]; // Première feuille
            const sheet = workbook.Sheets[sheetName];
            const jsonData = XLSX.utils.sheet_to_json(sheet, { header: 1 });

            tableBody.innerHTML = ""; // Vider le tableau avant d'ajouter des nouvelles données
            usersData = [];

            jsonData.forEach((row, index) => {
                if (index > 0 && row.length >= 2) { // Ignorer l'en-tête
                    usersData.push({
                        id: index,
                        nom: row[0] || '',
                        prenom: row[1] || '',
                        matricule: row[2] || ''
                    });

                    const rowHtml = `<tr>
                        <td class='border px-4 py-2'>${index}</td>
                        <td class='border px-4 py-2'>${row[0] || ''}</td>
                        <td class='border px-4 py-2'>${row[1] || ''}</td>
                        <td class='border px-4 py-2'>${row[2] || ''}</td>
                    </tr>`;
                    tableBody.innerHTML += rowHtml;
                }
            });

            previewTable.classList.remove("hidden"); // Afficher l'aperçu
        }
    </script>

</body>
</html>
<?php /**PATH C:\Users\SENMOSDEV\Documents\carlos\gestiondoc6\resources\views/importations/import.blade.php ENDPATH**/ ?>
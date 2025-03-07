<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Documents</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .bg-custom {
            background-color: rgba(100, 99, 99, 0.69);
            position: relative;
        }
        .content {
            position: relative;
            z-index: 1;
            padding: 2rem;
            background: rgb(255, 255, 255);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .modal {
            transition: opacity 0.3s ease-in-out;
        }
        .modal-backdrop {
            backdrop-filter: blur(5px);
        }
        .btn {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .input-search {
            border: 2px solidrgb(224, 218, 218); /* Noir foncé */
            background-color:rgb(235, 201, 201);
            color:rgb(7, 7, 7);
        }
        .select-search {
            border: 2px solidrgb(230, 217, 217); /* Noir foncé */
            background-color:rgb(240, 201, 201);
            color:rgb(0, 0, 0);
        }
    </style>
</head>
<body class="bg-custom min-h-screen flex items-center justify-center p-6">
    <!-- Bouton Retour (déplacé en haut, juste au-dessus de la page principale) -->
    <div class="fixed top-4 left-4">
        <a href="<?php echo e(route('adminDashboard')); ?>" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-700 transition btn">
            ⬅ Retour
        </a>
    </div>

    <div class="content container mx-auto px-4 py-8">
        <div>
            <a href="/">
                <?php if (isset($component)) { $__componentOriginal8892e718f3d0d7a916180885c6f012e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8892e718f3d0d7a916180885c6f012e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.application-logo','data' => ['class' => 'w-20 h-20 fill-current text-gray-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-20 h-20 fill-current text-gray-500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $attributes = $__attributesOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $component = $__componentOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__componentOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
            </a>
        </div>
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">📄 Liste des Documents</h2>
        <ul class="space-y-4">
        <div class="filter-container">
            <form method="GET" action="/documentss" class="flex items-center gap-4">
                <input type="text" name="search" placeholder="Rechercher un document..." class="input-search p-2 rounded w-3/4 sm:w-1/2" value="<?php echo e(request('search')); ?>">
                <select name="filiere" class="select-search p-2 rounded w-auto">
                    <option value="">Toutes les filières</option>
                    <option value="genie-electrique" <?php echo e(request('filiere') == 'genie-electrique' ? 'selected' : ''); ?>>Génie électrique</option>
                    <option value="genie-civil" <?php echo e(request('filiere') == 'genie-civil' ? 'selected' : ''); ?>>Génie civil</option>
                </select>
                <input type="text" name="directeur" placeholder="Nom du directeur" class="input-search p-2 rounded w-auto" value="<?php echo e(request('directeur')); ?>">
                <input type="text" name="annee" placeholder="Année" class="input-search p-2 rounded w-auto" value="<?php echo e(request('annee')); ?>">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition btn">Rechercher</button>
                <a href="/documentss" class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition btn">Actualiser</a>
            </form>
        </div>
            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="p-4 bg-white rounded-lg shadow-md flex items-center justify-between hover:shadow-lg transition-shadow">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900"><?php echo e($document->titre); ?></h3>
                    <p class="text-gray-700 text-sm"><?php echo e($document->description); ?></p>
                </div>
                <div class="flex items-center space-x-4">
                    <?php if($document->photo): ?>
                        <img src="<?php echo e(Storage::url($document->photo)); ?>" 
                             alt="Photo de <?php echo e($document->titre); ?>" 
                             class="w-12 h-12 object-cover rounded-md border border-gray-300">
                    <?php else: ?>
                        <span class="text-gray-500">❌ Pas de photo</span>
                    <?php endif; ?>
                    <a href="<?php echo e(Storage::url($document->document)); ?>" class="text-blue-600 hover:text-blue-800 font-semibold btn" download="true">📥 Télécharger</a>
                    <a href="<?php echo e(route('documents.edit', $document->id)); ?>" class="text-yellow-500 hover:text-yellow-700 font-semibold btn">✏ Modifier</a>
                    <!-- Bouton Lire -->
                    <a href="<?php echo e(Storage::url($document->document)); ?>" target="_blank" class="text-green-600 hover:text-green-800 font-semibold btn">📖 Lire</a>
                    <button data-modal-target="popup-modal-<?php echo e($document->id); ?>" data-modal-toggle="popup-modal-<?php echo e($document->id); ?>" class="text-red-500 hover:text-red-700 font-semibold btn">🗑 Supprimer</button>
                </div>
            </li>

            <!-- Modal de confirmation -->
            <div id="popup-modal-<?php echo e($document->id); ?>" tabindex="-1" class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50 modal-backdrop">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96 modal">
                    <h3 class="text-lg font-semibold text-gray-900">Voulez-vous vraiment supprimer ce document ?</h3>
                    <div class="mt-4 flex justify-end space-x-4">
                        <form method="POST" action="<?php echo e(route('documents.destroy', $document->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-800 btn">Oui, je suis sûr</button>
                        </form>
                        <button data-modal-hide="popup-modal-<?php echo e($document->id); ?>" class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400 btn">Annuler</button>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <?php if($documents->isEmpty()): ?>
            <p class="text-center text-gray-500 mt-4">Aucun document disponible.</p>
        <?php endif; ?>

        <div class="mt-6 flex justify-center">
            <?php echo e($documents->links()); ?>

        </div>
    </div>

    <script>
        document.querySelectorAll('[data-modal-toggle]').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById(this.dataset.modalTarget).classList.remove('hidden');
            });
        });

        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', function () {
                this.closest('div[id^="popup-modal"]').classList.add('hidden');
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\gestiondoc5\gestiondoc5\resources\views/layouts/documents/index.blade.php ENDPATH**/ ?>
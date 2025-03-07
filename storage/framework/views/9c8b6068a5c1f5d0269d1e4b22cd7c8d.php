<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Document de Soutenance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color:rgba(90, 88, 88, 0.68);
        }
        .content {
            position: relative;
            background: rgb(255, 255, 255);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgb(0, 0, 0, 0.1);
        }
        input, textarea, select {
            background-color: rgba(0, 44, 189, 0.31);
            border: 1px solid rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen p-4">
    <div class="content w-full max-w-3xl">
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
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">✏️ Modifier un Document de Soutenance</h2>

        <form action="<?php echo e(route('documents.update', $document->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="titre" class="block text-sm font-semibold text-gray-700">📌 Titre du document</label>
                    <input type="text" id="titre" name="titre" value="<?php echo e($document->titre); ?>" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                </div>
                <div>
                    <label for="auteur" class="block text-sm font-semibold text-gray-700">✍️ Auteur</label>
                    <input type="text" id="auteur" name="auteur" value="<?php echo e($document->auteur); ?>" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                </div>
                <div>
                    <label for="annee" class="block text-sm font-semibold text-gray-700">📅 Année de soutenance</label>
                    <input type="number" id="annee" name="annee" min="1900" value="<?php echo e($document->annee); ?>" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                </div>
                <div>
                    <label for="directeur" class="block text-sm font-semibold text-gray-700">Directeur de mémoire</label>
                    <input type="text" id="directeur" name="directeur" value="<?php echo e($document->directeur); ?>" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                </div>
                <div>
                    <label for="filiere" class="block text-sm font-semibold text-gray-700">🎓 Filière</label>
                    <select id="filiere" name="filiere" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                        <option value="genie-electrique" <?php echo e($document->filiere == 'genie-electrique' ? 'selected' : ''); ?>>Génie électrique</option>
                        <option value="genie-civil" <?php echo e($document->filiere == 'genie-civil' ? 'selected' : ''); ?>>Génie civil</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700">📝 Description</label>
                    <textarea id="description" name="description" rows="4" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required><?php echo e($document->description); ?></textarea>
                </div>
                <div>
                    <label for="document" class="block text-sm font-semibold text-gray-700">📂 Remplacer le document</label>
                    <input type="file" id="document" name="document" accept=".pdf,.doc,.docx,.txt" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                </div>
                <div>
                    <label for="photo" class="block text-sm font-semibold text-gray-700">📷 Remplacer la photo (optionnel)</label>
                    <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                </div>
            </div>
            <button type="submit" class="mt-6 bg-indigo-600 text-white py-3 px-6 rounded-xl shadow-lg hover:bg-indigo-700 transition-all w-full text-lg font-semibold">
                💾 Mettre à jour
            </button>
        </form>
        <div class="fixed bottom-4 right-4">
            <button onclick="window.history.back()" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-700 transition">
                ⬅ Retour
            </button>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\gestiondoc5\gestiondoc5\resources\views/layouts/documents/edit.blade.php ENDPATH**/ ?>
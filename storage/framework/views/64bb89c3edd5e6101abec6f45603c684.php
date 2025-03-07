<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between items-center relative">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Dashboard')); ?>

            </h2>
            <!-- Menu utilisateur en haut à droite -->
            <div class="absolute top-0 right-0 flex items-center gap-4 mt-4 mr-4 z-10">
                <a href="<?php echo e(route('profile.edit')); ?>" class="button-small">Profil</a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="button-small">Se déconnecter</button>
                </form>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Suppression du bloc principal avec transparence -->
            <div class="p-10 text-black-900">
                <!-- Message principal -->
                <?php echo e(__("")); ?>

                <h2 class="text-center text-2xl font-bold text-white mt-[-30px] mb-2">PAGE-ETUDIANT</h2>

                <!-- Boutons ajoutés en bas -->
                <div class="mt-6 flex justify-start gap-4">
                    <a href="/documentss" class="button">Consultation des documents</a>
                    <a href="=" class="button">mes demande de lecture</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        /* Boutons */
        .button {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: rgb(66, 135, 245); /* Bleu clair */
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button:hover {
            background-color: rgb(4, 78, 189); /* Bleu plus foncé au survol */
            transform: scale(1.05); /* Léger zoom */
        }

        /* Boutons plus petits pour le menu utilisateur */
        .button-small {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: rgb(33, 34, 37); /* Gris */
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button-small:hover {
            background-color: rgb(0, 0, 0); /* Gris plus foncé au survol */
            transform: scale(1.05); /* Léger zoom */
        }

        /* Suppression des styles pour la transparence du bloc */
        .bg-opacity-70 {
            background-color: transparent; /* Rendre le fond transparent */
        }

        /* Espacement des boutons */
        .flex {
            display: flex;
        }

        .gap-4 {
            gap: 1rem; /* Espacement entre les boutons */
        }

        .mt-6 {
            margin-top: 1.5rem;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\gestiondoc5\gestiondoc5\resources\views/userDashboard.blade.php ENDPATH**/ ?>
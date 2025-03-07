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
       
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Bienvenue dans votre espace de travail!')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <p class="text-sm text-gray-900 text-center mt-[-40px]">
                <?php echo e(__(' ')); ?>

            </p>
        
            <p class="mt-6 text-sm text-gray-900 text-center">
                <!-- Titre PAGE-BIBLIOTHÈCAIRE (encore plus remonté) -->
                <h2 class="text-center text-2xl font-bold text-white mt-[-30px] mb-2">PAGE-BIBLIOTHÈCAIRE</h2>
            </p>
        
            <!-- Boutons -->
            <div class="button-container mt-4 flex gap-4 justify-center">
                <a href="/documents/create" class="button">Dépôt des documents</a>
                <a href="/documents" class="button">Liste des documents déposés</a>
                <a href="/inscrition" class="button">Listes des étudiants inscrits</a>
                <a href="/demandes" class="button">les demandes de lectures</a>
            </div>
        </div>
    </div>

    <style>
        .bg-opacity-70 {
            background-color: transparent;
        }

        /* Boutons */
        .button {
            display: inline-block;
            padding: 12px 24px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background-color: rgba(0, 80, 130, 0.85);
            border-radius: 12px;
            text-decoration: none;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .button:hover {
            background-color: rgb(0, 70, 120);
            transform: translateY(-4px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
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
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\gestiondoc5\gestiondoc5\resources\views/adminDashboard.blade.php ENDPATH**/ ?>
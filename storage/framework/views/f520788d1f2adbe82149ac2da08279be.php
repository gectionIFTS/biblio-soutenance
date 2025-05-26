<nav x-data="{ open: false }" class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo et Nom -->
            <div class="shrink-0 flex items-center">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <?php if (isset($component)) { $__componentOriginal8892e718f3d0d7a916180885c6f012e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8892e718f3d0d7a916180885c6f012e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.application-logo','data' => ['class' => 'block h-9 w-auto fill-current text-gray-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block h-9 w-auto fill-current text-gray-800']); ?>
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
                <span class="text-lg text-gray-900 font-bold">INSTITUT DE FORMATION TECHNIQUE SUPÉRIEURE</span>
            </div>

            <!-- Menu principal -->
            <div class="hidden sm:flex space-x-6">
                <a href="<?php echo e(route('dashboard')); ?>" class="hover:text-purple-500 transition duration-300 mr-3">IFTS</a>
                <a href="#" class="hover:text-purple-500 transition duration-300 mx-6">Cours</a>
                <a href="#" class="hover:text-purple-500 transition duration-300">Contact</a>
            </div>

            <!-- Notifications -->
            <div class="relative mr-4">
                <button id="notification-btn" class="relative">
                    <span class="text-xl text-gray-700">🔔</span>
                    <?php if(auth()->user()->unreadNotifications->count() > 0): ?>
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-2 py-0.5">
                            <?php echo e(auth()->user()->unreadNotifications->count()); ?>

                        </span>
                    <?php endif; ?>
                </button>

                <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg z-50 ring-1 ring-gray-200">
                    <ul class="divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li class="p-3 hover:bg-gray-100 transition duration-200">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-700"><?php echo e($notification->data['message']); ?></span>
                                    <a href="#" class="mark-as-read text-blue-500 text-sm" data-id="<?php echo e($notification->id); ?>">
                                        Marquer comme lue
                                    </a>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="p-3 text-gray-500">Aucune notification</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- Dropdown Profil -->
            <div class="hidden sm:flex items-center space-x-4">
                <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'right']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right']); ?>
                     <?php $__env->slot('trigger', null, []); ?> 
                        <button class="flex items-center space-x-2 px-3 py-2 bg-white text-purple-700 font-medium rounded-md hover:bg-gray-200 transition duration-300">
                            <span><?php echo e(Auth::user()->name); ?></span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                            </svg>
                        </button>
                     <?php $__env->endSlot(); ?>
                     <?php $__env->slot('content', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('profile.edit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit'))]); ?>Profil <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => '#','onclick' => 'event.preventDefault(); this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => '#','onclick' => 'event.preventDefault(); this.closest(\'form\').submit();']); ?>
                                Déconnexion
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                        </form>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
            </div>

            <!-- Bouton Menu Mobile -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="p-2 rounded-md hover:bg-gray-600 transition duration-300">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div x-show="open" class="sm:hidden bg-purple-800">
        <a href="<?php echo e(route('dashboard')); ?>" class="block px-4 py-2 hover:bg-purple-600 transition duration-300">Accueil</a>
        <a href="#" class="block px-4 py-2 hover:bg-purple-600 transition duration-300">Cours</a>
        <a href="#" class="block px-4 py-2 hover:bg-purple-600 transition duration-300">Contact</a>
        <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 hover:bg-purple-600 transition duration-300">Profil</a>
        <form method="POST" action="<?php echo e(route('logout')); ?>" class="block">
            <?php echo csrf_field(); ?>
            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-purple-600 transition duration-300">Déconnexion</button>
        </form>
    </div>
</nav>

<script>
document.getElementById('notification-btn').addEventListener('click', function() {
    document.getElementById('notification-dropdown').classList.toggle('hidden');
});

document.querySelectorAll('.mark-as-read').forEach(button => {
    button.addEventListener('click', function() {
        let notificationId = this.getAttribute('data-id');

        fetch(`/notifications/${notificationId}/mark-as-read`, {
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                "Content-Type": "application/json"
            }
        }).then(response => response.json()).then(data => {
            if (data.success) {
                this.parentElement.parentElement.remove(); // Retirer la notification de la liste
                // Réduire le nombre d'alertes non lues si nécessaire
            }
        });
    });
});
</script>
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\bibliotogo\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>
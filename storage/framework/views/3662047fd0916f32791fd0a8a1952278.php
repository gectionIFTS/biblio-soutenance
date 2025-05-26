<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            color: #333;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            flex-direction: column;
        }

        .glass-container {
            background: linear-gradient(135deg,rgb(255, 255, 255),rgb(243, 248, 155));
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.18);
            animation: fadeIn 1s ease-out;
        }

        h2 {
            color: #007bff;
            font-size: 28px;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            animation: pulse 2s infinite;
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
            background: linear-gradient(135deg, #6a11cb, #2575fc);
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
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="glass-container">
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
        <h2>Bienvenue</h2>
        
        <div>
            <?php echo e($slot); ?>

        </div>
    </div>

    <a href="<?php echo e(url()->previous()); ?>" class="button-return">Retour</a>
</body>
</html>
<?php /**PATH C:\Users\carlo\Desktop\IFTS PROJET DE FIN D'ETUDE\bibliotogo\resources\views/layouts/guest.blade.php ENDPATH**/ ?>
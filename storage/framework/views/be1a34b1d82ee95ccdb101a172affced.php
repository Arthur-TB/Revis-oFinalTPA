<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Loja de Produtos'); ?></title>
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <style>
        body { background-color: #0f1117; color: #e2e8f0; font-family: system-ui, sans-serif; }
        .card { background-color: #1a1d27; border: 1px solid #2e3347; color: #e2e8f0; }
        .navbar { background-color: #1a1d27; border-bottom: 1px solid #2e3347; }
        .btn-primary { background-color: #7c6af7; border-color: #7c6af7; }
        .btn-primary:hover { background-color: #6352de; border-color: #6352de; }
        .table-dark { --bs-table-bg: #1a1d27; --bs-table-border-color: #2e3347; }
        .form-control, .form-select { background-color: #0f1117; color: #e2e8f0; border-color: #2e3347; }
        .form-control:focus, .form-select:focus { background-color: #0f1117; color: #e2e8f0; }
        .badge-tipo { background-color: #7c6af7; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('home')); ?>">🛒 Loja de Produtos</a>

            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('produtos.index')); ?>">Produtos</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('produtos.create')); ?>">Cadastrar Produto</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('compras.create')); ?>">Comprar</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('compras.index')); ?>">Minhas compras</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('sobre')); ?>">Sobre</a></li>
            </ul>

            <?php if(auth()->guard()->check()): ?>
                <span class="navbar-text me-3">
                    <?php echo e(Auth::user()->name); ?>

                    <span class="badge badge-tipo"><?php echo e(Auth::user()->tipo); ?></span>
                </span>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-outline-light btn-sm">Sair</button>
                </form>
            <?php else: ?>
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('login')); ?>">Entrar</a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="container pb-5">
        <?php if(session('sucesso')): ?>
            <div class="alert alert-success border-0 shadow-sm"><?php echo e(session('sucesso')); ?></div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger border-0 shadow-sm">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $erro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($erro); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html>
<?php /**PATH /home/claude/tpa-revisao-produtos/resources/views/layouts/app.blade.php ENDPATH**/ ?>
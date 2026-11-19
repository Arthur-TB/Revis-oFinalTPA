<?php $__env->startSection('title', 'Produtos — Loja de Produtos'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="fw-bold mb-3">📦 Produtos à venda</h2>

<div class="card shadow-sm">
    <table class="table table-dark table-hover mb-0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Garantia (meses)</th>
                <th>Preço (R$)</th>
                <th>Estoque</th>
                <th>Vendedor</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $produtos ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($produto->nome); ?></td>
                    <td><?php echo e($produto->categoria); ?></td>
                    <td><?php echo e($produto->garantia_meses); ?></td>
                    <td>R$ <?php echo e(number_format($produto->preco, 2, ',', '.')); ?></td>
                    <td><?php echo e($produto->estoque); ?></td>
                    <td><?php echo e($produto->vendedor->name); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="99" class="text-center text-secondary py-4">Nenhum produto para mostrar.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/claude/tpa-revisao-produtos/resources/views/produtos/index.blade.php ENDPATH**/ ?>
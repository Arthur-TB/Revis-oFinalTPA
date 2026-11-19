<?php $__env->startSection('title', 'Minhas compras — Loja de Produtos'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="fw-bold mb-3">🧾 Minhas compras</h2>

<?php $__empty_1 = true; $__currentLoopData = $vendas ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card shadow-sm mb-3">
        <div class="card-header d-flex justify-content-between">
            <strong>Compra #<?php echo e($venda->id); ?></strong>
            <span class="text-secondary"><?php echo e($venda->created_at?->format('d/m/Y H:i')); ?></span>
        </div>
        <table class="table table-dark mb-0">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço unitário</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $venda->produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($produto->nome); ?></td>
                        <td><?php echo e($produto->pivot->quantidade); ?></td>
                        <td>R$ <?php echo e(number_format($produto->pivot->preco_unitario, 2, ',', '.')); ?></td>
                        <td>R$ <?php echo e(number_format($produto->pivot->quantidade * $produto->pivot->preco_unitario, 2, ',', '.')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="card-footer text-end fw-bold">
            Total: R$ <?php echo e(number_format($venda->produtos->sum(fn ($item) => $item->pivot->quantidade * $item->pivot->preco_unitario), 2, ',', '.')); ?>

        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p class="text-secondary">Você ainda não fez nenhuma compra.</p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/claude/tpa-revisao-produtos/resources/views/compras/index.blade.php ENDPATH**/ ?>
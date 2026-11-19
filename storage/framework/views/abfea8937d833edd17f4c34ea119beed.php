<?php $__env->startSection('title', 'Comprar — Loja de Produtos'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="fw-bold mb-3">🛒 Nova compra</h2>
<p class="text-secondary">Informe a quantidade de cada item. Itens com quantidade 0 ficam de fora da compra.</p>

<form method="POST" action="<?php echo e(route('compras.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="card shadow-sm mb-3">
        <table class="table table-dark align-middle mb-0">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Em estoque</th>
                    <th style="width: 9rem">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $produtos ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($produto->nome); ?></td>
                        <td>R$ <?php echo e(number_format($produto->preco, 2, ',', '.')); ?></td>
                        <td><?php echo e($produto->estoque); ?></td>
                        <td>
                            <input type="number" min="0" name="itens[<?php echo e($produto->id); ?>]"
                                   value="<?php echo e(old('itens.' . $produto->id, 0)); ?>" class="form-control">
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center text-secondary py-4">Nenhum produto para mostrar.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <button type="submit" class="btn btn-primary fw-bold">Finalizar compra</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/claude/tpa-revisao-produtos/resources/views/compras/create.blade.php ENDPATH**/ ?>
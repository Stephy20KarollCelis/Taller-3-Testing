

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Lista de Frutas</h1>
    <a href="<?php echo e(route('frutas.create')); ?>" class="btn btn-primary">Agregar Fruta</a>
    <ul class="list-group mt-3">
        <?php $__currentLoopData = $frutas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item">
                <?php echo e($fruta->nombre); ?> - <?php echo e($fruta->color); ?> - $<?php echo e($fruta->precio); ?>

                <a href="<?php echo e(route('frutas.show', $fruta->id)); ?>" class="btn btn-info">Ver</a>
                <a href="<?php echo e(route('frutas.edit', $fruta->id)); ?>" class="btn btn-secondary">Editar</a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frutas\resources\views/frutas/index.blade.php ENDPATH**/ ?>
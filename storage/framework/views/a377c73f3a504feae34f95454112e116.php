

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Detalles de la Fruta</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e($fruta->nombre); ?></h5>
            <p class="card-text">Color: <?php echo e($fruta->color); ?></p>
            <p class="card-text">Precio: $<?php echo e($fruta->precio); ?></p>
            <a href="<?php echo e(route('frutas.index')); ?>" class="btn btn-primary">Volver a la lista</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frutas\resources\views/frutas/show.blade.php ENDPATH**/ ?>
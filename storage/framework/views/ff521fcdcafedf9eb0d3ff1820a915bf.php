

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Editar Fruta</h1>
    <form action="<?php echo e(route('frutas.update', $fruta->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($fruta->nombre); ?>" required>
        </div>
        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" class="form-control" id="color" name="color" value="<?php echo e($fruta->color); ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?php echo e($fruta->precio); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\frutas\resources\views/frutas/edit.blade.php ENDPATH**/ ?>
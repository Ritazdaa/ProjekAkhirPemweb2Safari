

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <a href="<?php echo e(route('pengumuman.create')); ?>" class="btn btn-primary mb-3">Create Pengumuman</a>
    <?php $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-info">
            <h4><strong><?php echo e($p->judul); ?></strong></h4>
            <p><?php echo e($p->isi); ?></p>
            <small><?php echo e($p->created_at ? $p->created_at->format('d-m-Y H:i') : 'Tanggal tidak tersedia'); ?></small>
            <div>
                <a href="<?php echo e(route('pengumuman.edit', $p->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                <form action="<?php echo e(route('pengumuman.destroy', $p->id)); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projekakhir\resources\views/pengumuman/index.blade.php ENDPATH**/ ?>
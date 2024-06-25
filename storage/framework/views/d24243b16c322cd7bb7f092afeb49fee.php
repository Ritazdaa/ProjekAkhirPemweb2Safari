

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <h2>Edit Pengumuman</h2>
    <form action="<?php echo e(route('pengumuman.update', $pengumuman->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo e($pengumuman->judul); ?>" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control" id="isi" name="isi" rows="5" required><?php echo e($pengumuman->isi); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projekakhir\resources\views/pengumuman/edit.blade.php ENDPATH**/ ?>
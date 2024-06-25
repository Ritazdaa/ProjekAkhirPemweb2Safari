<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Absen - PDF Export</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        table th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Riwayat Absen</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <!-- <th>Photo</th> -->
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $riwayatAbsens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $riwayatAbsen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($riwayatAbsen->name); ?></td>
                <td><?php echo e($riwayatAbsen->nip); ?></td>
                <td><?php echo e($riwayatAbsen->jabatan); ?></td>
                <!-- <td><img src="<?php echo e(public_path('uploads/' . $riwayatAbsen->photo)); ?>" alt="Photo"></td> -->
                <td><?php echo e($riwayatAbsen->location_name); ?></td>
                <td><?php echo e($riwayatAbsen->status); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\projekakhir\resources\views/riwayat_absen/pdf.blade.php ENDPATH**/ ?>
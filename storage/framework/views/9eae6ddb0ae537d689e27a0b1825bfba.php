<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riwayat Absen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            background: rgb(255, 255, 255);
        }
        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            transition: transform 0.3s ease;
            transform: translateX(0);
            display: flex;
            flex-direction: column;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
        }
        .sidebar.hide {
            transform: translateX(-100%);
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            flex-grow: 1;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }
        .main-content {
            margin-left: 220px;
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }
        .main-content.expanded {
            margin-left: 0;
        }
        header, footer {
            background-color: #34495e;
            color: white;
            padding: 10px;
            width: 100%;
            flex-shrink: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .toggle-btn {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        .profile a {
            color: white;
            text-decoration: none;
            margin-left: 10px;
        }
        main {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Presensiku</h2>
        <ul>
        <li><a href="<?php echo e(route('dashboard.index')); ?>">Home</a></li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                <li><a href="<?php echo e(route('dashboard.showDataPengguna')); ?>">Data Pengguna</a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('admin')): ?>
            <li><a href="<?php echo e(route('dashboard.absenKaryawan')); ?>">Absen</a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
            <li><a href="<?php echo e(route('riwayat_absen.index')); ?>">Riwayat Absen</a></li>
            <?php endif; ?>
            <li><a href="<?php echo e(route('profil.show')); ?>">Profil</a></li>
            <li><a href="<?php echo e(route('pengumuman.index')); ?>">Pengumuman</a></li>
            <li><a href="<?php echo e(route('informasi.gaji')); ?>">Informasi</a></li>
    
        </ul>
        <div class="logout">
            <a href="<?php echo e(route('login.logout')); ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <div class="main-content" id="main-content">
        <header>
            <nav class="navbar">
                <button class="toggle-btn" id="toggle-btn">☰</button>
                <h1>Riwayat Absen</h1>
                <div class="profile">
                    <?php if(Auth::check()): ?>
                        <span><?php echo e(Auth::user()->name); ?></span>
                    <?php else: ?>
                        <span>Guest</span>
                    <?php endif; ?>
                </div>
            </nav>
        </header>
        <main>
            
            <div class="container mt-4">
                <!-- <h2>Riwayat Absen</h2> -->
                <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                <?php endif; ?>
                <table class="table table-bordered table-white">
                    <thead class="table-primary">
                        <tr>
                            <th>Name</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Photo</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $riwayatAbsens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $riwayatAbsen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($riwayatAbsen->name); ?></td>
                                <td><?php echo e($riwayatAbsen->nip); ?></td>
                                <td><?php echo e($riwayatAbsen->jabatan); ?></td>
                                <td><img src="<?php echo e(asset('uploads/' . $riwayatAbsen->photo)); ?>" alt="Photo" class="img-thumbnail" width="50"></td>
                                <td><?php echo e($riwayatAbsen->location_name); ?></td>
                                <td><?php echo e($riwayatAbsen->status); ?></td>
                                <td>
                                    <div class="d-flex">
                                    <form action="<?php echo e(route('riwayat_absen.terima', $riwayatAbsen->id)); ?>" method="POST" class="me-2">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-primary btn-sm">Terima</button>
                                    </form>
                                    <form action="<?php echo e(route('riwayat_absen.tolak', $riwayatAbsen->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                    </form>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
        <a href="<?php echo e(route('riwayat_absen.exportPdf')); ?>" class="btn btn-primary">Export to PDF</a>
    </div>


        </main>
    </div>
    <script>
        document.getElementById('toggle-btn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('hide');
            document.getElementById('main-content').classList.toggle('expanded');
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\projekakhir\resources\views/riwayat_absen/index.blade.php ENDPATH**/ ?>
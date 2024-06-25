<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengumuman Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        .container {
            padding: 20px;
        }
        .alert {
            position: relative;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all 0.3s ease;
        }
        .alert:hover {
            border-color: rgba(0, 123, 255, 0.5);
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }
        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }
        .sidebar ul li:hover {
            background-color: #34495e; /* Warna latar belakang saat di-hover */
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Presensiku</h2>
        <ul>
            <li><a href="<?php echo e(route('dashboard.index')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('dashboard.showDataPengguna')); ?>">Data Pengguna</a></li>
            <li><a href="<?php echo e(route('dashboard.absenKaryawan')); ?>">Absen</a></li>
            <li><a href="<?php echo e(route('profil.show')); ?>">Profil</a></li>
            <li><a href="#">Informasi</a></li>
            <li><a href="<?php echo e(route('dashboard.pengumuman')); ?>">Pengumuman</a></li>
        </ul>
        <div class="logout">
            <a href="<?php echo e(route('login.logout')); ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <div class="main-content" id="main-content">
        <header>
            <nav class="navbar">
                <button class="toggle-btn" id="toggle-btn">☰</button>
                <h1>Pengumuman Karyawan</h1>
                <div class="profile">
                    <span><?php echo e(Auth::user()->name); ?></span>
                </div>
            </nav>
        </header>
        
        <main>
            <div class="container mt-3">
                <?php $__currentLoopData = $pengumuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-info">
                        <h4><strong><?php echo e($p->judul); ?></strong></h4>
                        <p><?php echo e($p->isi); ?></p>
                        <small><?php echo e($p->created_at ? $p->created_at->format('d-m-Y H:i') : 'Tanggal tidak tersedia'); ?></small>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hide');
            mainContent.classList.toggle('expanded');
        });
    </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\projekakhir\resources\views/pengumuman.blade.php ENDPATH**/ ?>
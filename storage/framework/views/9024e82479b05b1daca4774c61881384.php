<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
        .sidebar ul li:hover {
            background-color: #34495e;
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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('admin')): ?>
            <li><a href="<?php echo e(route('pengumumanUser.indexUser')); ?>">Pengumuman</a></li>
            <li><a href="<?php echo e(route('informasiUser.gaji')); ?>">Informasi</a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
            <li><a href="<?php echo e(route('pengumuman.index')); ?>">Pengumuman</a></li>
            <li><a href="<?php echo e(route('informasi.gaji')); ?>">Informasi</a></li>
            <?php endif; ?>
    
        </ul>
        <div class="logout">
            <a href="<?php echo e(route('login.logout')); ?>" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <div class="main-content" id="main-content">
        <header>
            <nav class="navbar">
                <button class="toggle-btn" id="toggle-btn">☰</button>
                <h1>Dashboard</h1>
                <div class="profile">
                    <span><?php echo e(Auth::user()->name); ?></span>
                </div>
            </nav>
        </header>
        
        <main>
        <img src="img/foto_dashboardd.jpg" alt="User Image" class="img-fluid mb-4" />
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        
                        <center><h1>Diagram Pegawai</h1></center>
                        <div id="container"></div>
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script type="text/javascript">
                            var userData = <?php echo json_encode($userData); ?>;
                            Highcharts.chart('container', {
                                title: {
                                    text: 'User Baru 2024'
                                },
                                subtitle: {
                                    text: 'User'
                                },
                                xAxis: {
                                    categories: ['Mei','Jun',
                                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Number of New Users'
                                    }
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'middle'
                                },
                                plotOptions: {
                                    series: {
                                        allowPointSelect: true
                                    }
                                },
                                series: [{
                                    name: 'New Users',
                                    data: userData
                                }],
                                responsive: {
                                    rules: [{
                                        condition: {
                                            maxWidth: 500
                                        },
                                        chartOptions: {
                                            legend: {
                                                layout: 'horizontal',
                                                align: 'center',
                                                verticalAlign: 'bottom'
                                            }
                                        }
                                    }]
                                }
                            });
                        </script>
                    </div>
                </div>
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
</html><?php /**PATH C:\xampp\htdocs\projekakhir\resources\views/dashboard.blade.php ENDPATH**/ ?>
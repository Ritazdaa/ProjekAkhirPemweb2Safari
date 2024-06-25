<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>
            body {
                background-image: url('https://i.pinimg.com/736x/1a/9a/df/1a9adf48a3715c09bc0614712db5f754.jpg'); /* Updated background image */
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
            .background-image {
                position: absolute;
                top: 0;
                right: 0;
                width: 50%;
                height: 100%;
                background-image: url('https://pmb.akba.ac.id/templates/evolo/images/registration.png');
                background-size: 475px; /* Adjusted background size */
                background-repeat: no-repeat;
                background-position: center;
                z-index: -1;
            }
            .form-container {
                max-width: 700px;
                margin-top: -40px;
                margin-left: 80px;
                margin-right: 40px; /* Adjusted margin-left to move the container to the right */
                padding: 40px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                background-color: rgba(255, 255, 255, 1);
                border: 6px solid rgba(0, 0, 0, 0.1); 
            }
            .form-container label {
                text-align: left;
                display: block; 
            }
        </style>

    </head>
    <body>
    <div class="background-image"></div>
        <div class="container p-3">
            <div class="row justify-content-start mt-5"> 
                <div class="col-md-5">
                    <div class="form-container text-center">
                        <h5 class="text-center">Registrasi Pengguna Baru</h5>
                        <form method="post" action="<?php echo e(route('register.store')); ?>">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="namaInput" class="form-label">Nama</label>
        <input type="text" class="form-control <?php $__errorArgs = ['namaInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="namaInput" name="namaInput" value="<?php echo e(old('namaInput')); ?>">
        <?php $__errorArgs = ['namaInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

        <!-- <div class="container p-3">
            <h1 class="text-center">Registrasi Pengguna Baru</h1>
            <div class="row justify-content-center mt-5">
                <div class="col-md-5">
                    <div class="form">
                        <form method="post" action="<?php echo e(route('register.store')); ?>">
                            <?php echo csrf_field(); ?>


                            <div class="mb-3">
                                <label for="namaInput" class="form-label">Nama</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['namaInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="namaInput" name="namaInput" value="<?php echo e(old('namaInput')); ?>">
                                <?php $__errorArgs = ['namaInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>                            
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div> -->
                            
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['emailInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="emailInput" name="emailInput" value="<?php echo e(old('emailInput')); ?>">
                                <?php $__errorArgs = ['emailInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>                            
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="nipInput" class="form-label">NIP</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['nipInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nipInput" name="nipInput" value="<?php echo e(old('nipInput')); ?>">
                                <?php $__errorArgs = ['nipInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>                            
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="nipInput" class="form-label">Jabatan</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['jabatanInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="jabatanInput" name="jabatanInput" value="<?php echo e(old('jabatanInput')); ?>">
                                <?php $__errorArgs = ['jabatanInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>                            
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Password</label>
                                <input type="password" class="form-control <?php $__errorArgs = ['passwordInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="passwordInput" name="passwordInput">
                                <?php $__errorArgs = ['passwordInput'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>                            
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="passwordInput_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control <?php $__errorArgs = ['passwordInput_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="passwordInput_confirmation" name="passwordInput_confirmation">
                                <?php $__errorArgs = ['passwordInput_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>                            
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>


                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html><?php /**PATH C:\xampp\htdocs\projekakhir\resources\views/register.blade.php ENDPATH**/ ?>
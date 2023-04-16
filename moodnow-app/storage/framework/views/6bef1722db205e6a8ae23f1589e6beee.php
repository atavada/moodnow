<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img
                        src="<?php echo e(asset('assets/img/iconmoodnow.png')); ?>"
                        alt="logo"
                        width="100"
                        class="shadow-light rounded-circle"
                    />
                </div>

                <div class="card card-primary">
                    <div class="card-header"><h4><?php echo e(__('Login')); ?></h4></div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="email"><?php echo e(__('Email')); ?></label>
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>"
                                    name="email"
                                    tabindex="1"
                                    required
                                    autocomplete="email"
                                    autofocus
                                />
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label"><?php echo e(__('Password')); ?></label>
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    required 
                                    autocomplete="current-password"
                                    name="password"
                                    tabindex="2"
                                    required
                                />
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input
                                        type="checkbox"
                                        name="remember"
                                        class="custom-control-input"
                                        tabindex="3"
                                        id="remember"
                                        <?php echo e(old('remember') ? 'checked' : ''); ?>

                                    />
                                    <label
                                        class="custom-control-label"
                                        for="remember-me"
                                        > <?php echo e(__('Remember Me')); ?></label
                                    >
                                </div>
                            </div>

                            <div class="form-group">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg btn-block"
                                    tabindex="4"
                                >
                                    <?php echo e(__('Login')); ?>

                                </button>

                                <?php if(Route::has('password.request')): ?>
                                <div class="float-right mt-2">
                                    <a href="<?php echo e(route('password.request')); ?>" class="text-small"><?php echo e(__('Forgot Your Password?')); ?></a>
                                </div>
                                <?php endif; ?>

                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="mt-5 text-muted text-center">
                    Don't have an account?
                    <a href="<?php echo e(route('register')); ?>">Create One</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\WEB\REVISI\moodnow\moodnow-app\resources\views/auth/login.blade.php ENDPATH**/ ?>

<?php $__env->startSection('title', 'Color Managed'); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Color Managed</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-user"></i>Color Managed</h4>
                </div>

                <div class="card-body">
                    <form action="#" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                
                                    <div class="input-group-prepend">
                                        <a href="<?php echo e(route('admin.color.create')); ?>" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan warna">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">NAME</th>
                                <th scope="col">HEX</th>
                                <th scope="col" style="width: 15%">OUTPUT</th>

                                <th scope="col" style="width: 15%;text-align: center">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row" style="text-align: center"></th>
                                        <td><?php echo e($color->name); ?></td>
                                        <td><?php echo e($color->hex); ?></td>
                                        <td>
                                            <label class="badge badge-success"><?php echo e($color->output); ?></label>
                                        </td>
                                        <td class="text-center">
                                            
                                                <a href="<?php echo e(route('admin.color.edit', $color->id)); ?>" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                            
                                                <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="<?php echo e($color->id); ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            
                                        </td>
                                    </tr>
                               
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

    </section>  

    <script>
        //ajax delete
        function Delete(id)
            {
                var id = id;
                var token = $("meta[name='csrf-token']").attr("content");
    
                swal({
                    title: "APAKAH KAMU YAKIN ?",
                    text: "INGIN MENGHAPUS WARNA INI!",
                    icon: "warning",
                    buttons: [
                        'TIDAK',
                        'YA'
                    ],
                    dangerMode: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
    
                        //ajax delete
                        jQuery.ajax({
                            url: "<?php echo e(route("admin.color.index")); ?>/"+id,
                            data:   {
                                "id": id,
                                "_token": token
                            },
                            type: 'DELETE',
                            success: function (response) {
                                if (response.status == "success") {
                                    swal({
                                        title: 'BERHASIL!',
                                        text: 'WARNA BERHASIL DIHAPUS!',
                                        icon: 'success',
                                        timer: 1000,
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttons: false,
                                    }).then(function() {
                                        location.reload();
                                    });
                                }else{
                                    swal({
                                        title: 'GAGAL!',
                                        text: 'WARNA GAGAL DIHAPUS!',
                                        icon: 'error',
                                        timer: 1000,
                                        showConfirmButton: false,
                                        showCancelButton: false,
                                        buttons: false,
                                    }).then(function() {
                                        location.reload();
                                    });
                                }
                            }
                        });
    
                    } else {
                        return true;
                    }
                })
            }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\WEB\REVISI\moodnow\moodnow-app\resources\views/admin/color/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card shadow-lg rounded-lg border-0">
            <!-- Card Header -->
            <div class="card-header bg-dark text-white rounded-t-lg">
              <h3 class="card-title">Form Edit User</h3>
            </div>

            <!-- Form -->
            <form action="<?php echo e(route('updateuser', $user->id)); ?>" method="POST">
              <div class="card-body p-4">
                <?php echo csrf_field(); ?>

                <!-- Nama Field -->
                <div class="form-group">
                  <label for="nama" class="font-weight-bold">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo e(old('nama', $user->nama)); ?>" placeholder="Input Nama" required>
                </div>

                <!-- NISN Field -->
                <div class="form-group">
                  <label for="nisn" class="font-weight-bold">NISN</label>
                  <input type="number" class="form-control" id="nisn" name="nisn" value="<?php echo e(old('nisn', $user->nisn)); ?>" placeholder="Input NISN" required>
                </div>

              </div>

              <!-- Submit Button -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-lg px-4">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/User/edituser.blade.php ENDPATH**/ ?>
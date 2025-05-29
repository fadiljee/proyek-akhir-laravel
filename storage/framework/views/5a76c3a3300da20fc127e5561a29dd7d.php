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
              <h3 class="card-title">TAMBAH DATA SISWA</h3>
            </div>

            <!-- Error Messages -->
            <?php if($errors->any()): ?>
              <div class="alert alert-danger">
                <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            <?php endif; ?>

            <!-- Form -->
            <form action="<?php echo e(route('prosesregister')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="card-body p-4">
                <!-- Nama Field -->
                <div class="form-group">
                  <label for="nama" class="font-weight-bold">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                </div>

                <!-- NISN Field -->
                <div class="form-group">
                  <label for="nisn" class="font-weight-bold">NISN</label>
                  <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" required>
                </div>

              </div>

              <!-- Submit Button -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-lg px-4">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/User/tambahUser.blade.php ENDPATH**/ ?>
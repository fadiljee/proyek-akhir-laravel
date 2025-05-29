<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Card with modern design -->
          <div class="card shadow-lg rounded-lg border-0">

            <!-- Card Header -->
            <div class="card-header bg-dark text-white rounded-t-lg">
              <h3 class="card-title">Tambah Materi</h3>
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
            <form action="<?php echo e(route('prosestambah')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="card-body p-4">

                <!-- Judul Materi -->
                <div class="form-group">
                  <label for="judul" class="font-weight-bold">Judul Materi</label>
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Materi" required>
                </div>

                <!-- Konten Materi -->
                <div class="form-group">
                  <label for="konten" class="font-weight-bold">Konten Materi</label>
                  <textarea class="form-control" name="konten" placeholder="Masukkan Konten Materi" rows="5" required></textarea>
                </div>

                <!-- Gambar Materi (optional) -->
                <div class="form-group">
                  <label for="gambar" class="font-weight-bold">Gambar Materi (opsional)</label>
                  <input type="file" class="form-control" name="gambar" accept="image/*">
                </div>

              </div>

              <!-- Submit Button -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-lg px-4">Tambah Materi</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/materi/tambahMateri.blade.php ENDPATH**/ ?>
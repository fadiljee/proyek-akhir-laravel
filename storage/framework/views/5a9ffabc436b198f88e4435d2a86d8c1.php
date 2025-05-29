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
              <h3 class="card-title">Form Edit Materi</h3>
            </div>

            <!-- Form -->
            <form action="<?php echo e(route('updatemateri', $materi->id)); ?>" method="POST" enctype="multipart/form-data">
              <div class="card-body p-4">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Judul Materi -->
                <div class="form-group">
                  <label for="judul" class="font-weight-bold">Judul Materi</label>
                  <input type="text" class="form-control" name="judul" value="<?php echo e($materi->judul); ?>" placeholder="Masukkan Judul Materi" required>
                </div>

                <!-- Konten Materi -->
                <div class="form-group">
                  <label for="konten" class="font-weight-bold">Konten Materi</label>
                  <textarea class="form-control" name="konten" placeholder="Masukkan Konten Materi" rows="5" required><?php echo e($materi->konten); ?></textarea>
                </div>

                <!-- Gambar Materi -->
                <div class="form-group">
                  <label for="gambar" class="font-weight-bold">Gambar Materi (opsional)</label>
                  <input type="file" class="form-control" name="gambar" accept="image/*">
                </div>

                <!-- Current Image Display -->
                <?php if($materi->gambar): ?>
                  <div class="form-group">
                    <label class="font-weight-bold">Gambar Saat Ini:</label><br>
                    <img src="<?php echo e(asset('storage/' . $materi->gambar)); ?>" alt="Gambar Materi" style="max-width: 200px;">
                  </div>
                <?php endif; ?>
              </div>

              <!-- Submit Button -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-lg px-4">Update Materi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/materi/editMateri.blade.php ENDPATH**/ ?>
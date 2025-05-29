<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Card with modern design -->
          <div class="card shadow-lg rounded-lg border-0">

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

            <!-- Card Header -->
            <div class="card-header bg-dark text-white rounded-t-lg">
              <h3 class="card-title">Tambah Kuis</h3>
            </div>

            <!-- Form -->
            <form action="<?php echo e(route('prosestambahkuis')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <div class="card-body p-4">

                <!-- Pertanyaan -->
                <div class="form-group">
                  <label for="pertanyaan" class="font-weight-bold">Pertanyaan</label>
                  <input type="text" class="form-control" name="pertanyaan" value="<?php echo e(old('pertanyaan')); ?>" placeholder="Masukkan Pertanyaan" required>
                </div>

                <!-- Pilihan Jawaban -->
                <div class="form-group">
                  <label for="jawaban_a" class="font-weight-bold">Jawaban A</label>
                  <input type="text" class="form-control" name="jawaban_a" value="<?php echo e(old('jawaban_a')); ?>" placeholder="Jawaban A" required>
                </div>

                <div class="form-group">
                  <label for="jawaban_b" class="font-weight-bold">Jawaban B</label>
                  <input type="text" class="form-control" name="jawaban_b" value="<?php echo e(old('jawaban_b')); ?>" placeholder="Jawaban B" required>
                </div>

                <div class="form-group">
                  <label for="jawaban_c" class="font-weight-bold">Jawaban C</label>
                  <input type="text" class="form-control" name="jawaban_c" value="<?php echo e(old('jawaban_c')); ?>" placeholder="Jawaban C" required>
                </div>

                <div class="form-group">
                  <label for="jawaban_d" class="font-weight-bold">Jawaban D</label>
                  <input type="text" class="form-control" name="jawaban_d" value="<?php echo e(old('jawaban_d')); ?>" placeholder="Jawaban D" required>
                </div>

                <!-- Pilihan Jawaban Benar -->
                <div class="form-group">
                  <label for="jawaban_benar" class="font-weight-bold">Jawaban Benar</label>
                  <select class="form-control" name="jawaban_benar" required>
                    <option value="">Pilih Jawaban Benar</option>
                    <option value="A" <?php echo e(old('jawaban_benar') == 'A' ? 'selected' : ''); ?>>A</option>
                    <option value="B" <?php echo e(old('jawaban_benar') == 'B' ? 'selected' : ''); ?>>B</option>
                    <option value="C" <?php echo e(old('jawaban_benar') == 'C' ? 'selected' : ''); ?>>C</option>
                    <option value="D" <?php echo e(old('jawaban_benar') == 'D' ? 'selected' : ''); ?>>D</option>
                  </select>
                </div>

                <!-- Poin Soal -->
                <div class="form-group">
                  <label for="nilai" class="font-weight-bold">Poin Soal</label>
                  <input type="number" class="form-control" name="nilai" value="<?php echo e(old('nilai', 0)); ?>" min="1" required>
                </div>

                <!-- Pilihan Materi -->
                <div class="form-group">
                  <label for="materi_id" class="font-weight-bold">Pilih Materi</label>
                  <select class="form-control" name="materi_id" required>
                    <option value="">Pilih Materi</option>
                    <?php $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($materi->id); ?>" <?php echo e(old('materi_id') == $materi->id ? 'selected' : ''); ?>><?php echo e($materi->judul); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-lg px-4">Tambah Kuis</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/quiz/create.blade.php ENDPATH**/ ?>
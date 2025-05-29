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
              <h3 class="card-title">Data Kuis</h3>
            </div>

            <!-- Success Message -->
            <?php if(session('success')): ?>
              <div class="alert alert-success">
                <?php echo e(session('success')); ?>

              </div>
            <?php endif; ?>

            <!-- Card Body -->
            <div class="card-body p-4">
              <!-- Add Kuis Button -->
              <a href="<?php echo e(route('tambahkuis')); ?>" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Tambah Kuis
              </a>

              <!-- Table -->
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-light">
                  <tr>
                    <th>Pertanyaan</th>
                    <th>Jawaban A</th>
                    <th>Jawaban B</th>
                    <th>Jawaban C</th>
                    <th>Jawaban D</th>
                    <th>Jawaban Benar</th>
                    <th>Materi</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $kuis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($item->pertanyaan); ?></td>
                      <td><?php echo e($item->jawaban_a); ?></td>
                      <td><?php echo e($item->jawaban_b); ?></td>
                      <td><?php echo e($item->jawaban_c); ?></td>
                      <td><?php echo e($item->jawaban_d); ?></td>
                      <td><?php echo e($item->jawaban_benar); ?></td>
                      <td><?php echo e($item->materi->judul); ?></td> <!-- Display Materi Title -->
                      <td><?php echo e($item->nilai ?? '-'); ?></td>
                      <td class="text-center">
                        <!-- Edit Button -->
                        <a href="<?php echo e(route('kuisedit', $item->id)); ?>" class="btn btn-warning btn-sm mx-1">
                          <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="<?php echo e(route('kuisdelete', $item->id)); ?>" method="POST" style="display: inline;">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('DELETE'); ?>
                          <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Yakin ingin menghapus kuis ini?');">
                            <i class="fas fa-trash-alt"></i> Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
        </div> <!-- /.col-md-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/quiz/index.blade.php ENDPATH**/ ?>
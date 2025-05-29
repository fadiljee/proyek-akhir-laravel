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
              <h3 class="card-title">Data Materi</h3>
            </div>

            <!-- Success Message -->
            <?php if(session('success')): ?>
              <div class="alert alert-success">
                <?php echo e(session('success')); ?>

              </div>
            <?php endif; ?>

            <!-- Card Body -->
            <div class="card-body p-4">
              <!-- Add Materi Button -->
              <a href="<?php echo e(route('tambahMateri')); ?>" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Tambah Materi
              </a>

              <!-- Table -->
              <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-light">
                  <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($materi->judul); ?></td>
                      <td><?php echo e(\Str::limit($materi->konten, 50)); ?></td>
                      <td>
                        <?php if($materi->gambar): ?>
                          <img src="<?php echo e(asset('storage/' . $materi->gambar)); ?>" alt="Gambar Materi" style="max-width: 100px; max-height: 80px;">
                        <?php else: ?>
                          <span class="text-muted">Tidak ada gambar</span>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <!-- Edit Button -->
                        <a href="<?php echo e(route('materiedit', $materi->id)); ?>" class="btn btn-warning btn-sm mx-1">
                          <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="<?php echo e(route('materidelete', $materi->id)); ?>" method="post" style="display: inline;">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('DELETE'); ?>
                          <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Yakin ingin menghapus materi ini?');">
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

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/materi/index.blade.php ENDPATH**/ ?>
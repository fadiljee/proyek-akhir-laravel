<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card shadow-lg rounded-lg border-0">
            <!-- Display errors -->
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
              <h3 class="card-title">Data Siswa</h3>
            </div>

            <!-- Success Message -->
            <?php if(session('success')): ?>
              <div class="alert alert-success">
                <?php echo e(session('success')); ?>

              </div>
            <?php endif; ?>

            <!-- Card Body -->
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="<?php echo e(route('tambahSiswa')); ?>" class="btn btn-success shadow-sm"><i class="nav-icon fas fa-user-plus"></i> Tambah Siswa</a>

              </div>

              <!-- Table -->
              <table id="example1" class="table table-striped table-bordered table-hover">
                <thead class="thead-light">
                  <tr>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="userTable">
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($user->nama); ?></td>
                    <td><?php echo e($user->nisn); ?></td>
                    <td class="d-flex justify-content-start">
                      <a href="<?php echo e(route('useredit', $user->id)); ?>" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit"></i> Edit</a>
                      <form action="<?php echo e(route('userdelete', $user->id)); ?>" method="post" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fas fa-trash-alt"></i> Hapus</button>
                      </form>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
        </div> <!-- /.col -->
      </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
  </section>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/User/dataUser.blade.php ENDPATH**/ ?>
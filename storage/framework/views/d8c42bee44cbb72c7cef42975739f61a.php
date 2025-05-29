<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <h3 class="mt-3 mb-4 text-center">Rekap Hasil Kuis</h3>

      <!-- Search and Filter Form -->
      <div class="row mb-4">
        <!-- Search Bar -->
        <div class="col-md-6">
          <form action="<?php echo e(route('hasil-kuis')); ?>" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Cari Siswa atau Pertanyaan" value="<?php echo e(request()->search); ?>">
            <button type="submit" class="btn btn-primary ml-2">Cari</button>
          </form>
        </div>

        <!-- Date Filter -->
        <div class="col-md-6">
          <form action="<?php echo e(route('hasil-kuis')); ?>" method="GET" class="d-flex filter-form">
            <!-- Start Date -->
            <div class="form-group">
              <label for="start_date" class="font-weight-bold">Dari Tanggal</label>
              <input type="date" name="start_date" class="form-control" value="<?php echo e(request()->start_date); ?>"
                     title="Pilih tanggal mulai untuk filter hasil kuis">
            </div>

            <!-- End Date -->
            <div class="form-group">
              <label for="end_date" class="font-weight-bold">Hingga Tanggal</label>
              <input type="date" name="end_date" class="form-control" value="<?php echo e(request()->end_date); ?>"
                     title="Pilih tanggal akhir untuk filter hasil kuis">
            </div>

            <!-- Filter Button -->
            <div class="form-group filter-btn-container">
              <button type="submit" class="btn btn-primary">Filter</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Card with Table -->
      <div class="card shadow-lg rounded-lg border-0">
        <div class="card-body p-4">
          <!-- Table -->
          <table class="table table-bordered table-striped">
            <thead class="thead-dark">
              <tr>
                <th>Nama Siswa</th>
                <th>Materi</th>
                <th>Pertanyaan</th>
                <th>Jawaban User</th>
                <th>Jawaban Benar</th>
                <th>Skor</th>
                <th>Waktu</th>
              </tr>
            </thead>
            <tbody>
              <?php $__empty_1 = true; $__currentLoopData = $hasilKuis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                  <td><?php echo e($hasil->siswa->nama ?? '-'); ?></td>
                  <td><?php echo e($hasil->kuis->materi->judul ?? '-'); ?></td>
                  <td><?php echo e($hasil->kuis->pertanyaan ?? '-'); ?></td>
                  <td><?php echo e($hasil->jawaban_user ?? '-'); ?></td>
                  <td><?php echo e($hasil->kuis->jawaban_benar ?? '-'); ?></td>
                  <td><?php echo e($hasil->skor ?? 0); ?></td>
                  <td>
                    <?php echo e($hasil->waktu_dikerjakan ? \Carbon\Carbon::parse($hasil->waktu_dikerjakan)->format('d-m-Y H:i') : '-'); ?>

                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                  <td colspan="7" class="text-center">Belum ada data hasil kuis.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>

          <!-- Pagination -->
          <div class="d-flex justify-content-center mt-4">
            <?php echo e($hasilKuis->links('vendor.pagination.bootstrap-4')); ?>

          </div>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
  /* Style for the filter form container */
  .filter-form {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
  }

  /* Style for the filter form fields */
  .filter-form .form-group {
    flex: 1;
    margin-right: 10px;
  }

  /* Style for the filter button container */
  .filter-btn-container {
    display: flex;
    justify-content: flex-start;
    align-items: flex-end;
  }

  /* Adjust form fields on smaller screens */
  @media (max-width: 768px) {
    .filter-form {
      flex-direction: column;
    }

    .filter-form .form-group {
      margin-bottom: 10px;
    }

    .filter-btn-container {
      justify-content: center;
    }
  }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/hasilkuis/index.blade.php ENDPATH**/ ?>
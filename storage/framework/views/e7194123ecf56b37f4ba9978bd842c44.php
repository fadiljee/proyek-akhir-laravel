

<?php $__env->startSection('content'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-info">
              <div class="inner">
                <a href="<?php echo e(route('dataSiswa')); ?>" class="text-white">
                <h3><?php echo e($jumlahSiswa); ?> </h3>

                <p>Jumlah Siswa</p>
                </a>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-success">
              <div class="inner">
                <a href="<?php echo e(route('kuis')); ?>" class="text-white">

                  <h3><?php echo e($jumlahMateri); ?> </h3>
                  
                  <p >Jumlah Materi</p>
                </a>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-primary">
              <div class="inner">
                <a href="<?php echo e(route('kuis')); ?>" class="text-white">

                  <h3><?php echo e($jumlahQuiz); ?> </h3>
                  
                  <p >Jumlah Quiz</p>
                </a>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              </div>
          </div>
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/fadil/fadil/admin-ab/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>
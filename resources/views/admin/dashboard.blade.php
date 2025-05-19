@extends('admin.layout')

@section('content')
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
                <a href="{{route('dataSiswa')}}" class="text-white">
                <h3>{{ $jumlahSiswa }} </h3>

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
                <a href="{{route('kuis')}}" class="text-white">

                  <h3>{{ $jumlahMateri }} </h3>
                  
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
                <a href="{{route('kuis')}}" class="text-white">

                  <h3>{{ $jumlahQuiz }} </h3>
                  
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

  @endsection
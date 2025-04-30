@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">TAMBAH QUIZ</h3>
            </div>

            @if($errors->any())
            <ul style="color:red;">
              @foreach($errors->all() as $error)
              <li> {{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form action="{{ route('prosesregister') }}" method="POST">
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label>Materi</label>
                  <input type="text" class="form-control" name="Materi" placeholder="Input Materi">
                </div>
                <div class="form-group">
                  <label>Soal</label>
                  <input type="text" class="form-control" name="Soal" placeholder="Input Soal">
                </div>
                

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>

       
      </div>
  </section>
</div>

@endsection
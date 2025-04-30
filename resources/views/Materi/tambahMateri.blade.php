@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">TAMBAH MATERI</h3>
            </div>

            @if($errors->any())
            <ul style="color:red;">
              @foreach($errors->all() as $error)
              <li> {{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form action="{{ route('prosestambah') }}" method="POST">
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label>Judul Materi</label>
                  <input type="text" class="form-control" name="judul" placeholder="Input Judul Materi" required>
                </div>
                <div class="form-group">
                  <label>Konten Materi</label>
                  <textarea class="form-control" name="konten" placeholder="Input Konten Materi" required></textarea>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah Materi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection

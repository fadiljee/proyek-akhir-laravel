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
              <h3 class="card-title">FORM EDIT</h3>
            </div>

            <form action="{{ route('updatekuis', $user->id) }}" method="POST">
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" value="{{$user->nama}}" placeholder="Input Nama">
                </div>
                <div class="form-group">
                  <label>NISN</label>
                  <input type="number" class="form-control" name="nisn" value="{{$user->nisn}}" placeholder="Input NISN">
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection
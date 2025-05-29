@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card shadow-lg rounded-lg border-0">
            <!-- Card Header -->
            <div class="card-header bg-dark text-white rounded-t-lg">
              <h3 class="card-title">Form Edit User</h3>
            </div>

            <!-- Form -->
            <form action="{{ route('updateuser', $user->id) }}" method="POST">
              <div class="card-body p-4">
                @csrf

                <!-- Nama Field -->
                <div class="form-group">
                  <label for="nama" class="font-weight-bold">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" placeholder="Input Nama" required>
                </div>

                <!-- NISN Field -->
                <div class="form-group">
                  <label for="nisn" class="font-weight-bold">NISN</label>
                  <input type="number" class="form-control" id="nisn" name="nisn" value="{{ old('nisn', $user->nisn) }}" placeholder="Input NISN" required>
                </div>

              </div>

              <!-- Submit Button -->
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-lg px-4">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

@endsection

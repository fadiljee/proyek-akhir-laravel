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
            <!-- Display errors -->
            @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <!-- Card Header -->
            <div class="card-header bg-dark text-white rounded-t-lg">
              <h3 class="card-title">Data Siswa</h3>
            </div>

            <!-- Success Message -->
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            <!-- Card Body -->
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('tambahSiswa')}}" class="btn btn-success shadow-sm"><i class="nav-icon fas fa-user-plus"></i> Tambah Siswa</a>

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
                  @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->nisn }}</td>
                    <td class="d-flex justify-content-start">
                      <a href="{{ route('useredit', $user->id) }}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit"></i> Edit</a>
                      <form action="{{ route('userdelete', $user->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fas fa-trash-alt"></i> Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div> <!-- /.card-body -->
          </div> <!-- /.card -->
        </div> <!-- /.col -->
      </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
  </section>
</div>

@endsection

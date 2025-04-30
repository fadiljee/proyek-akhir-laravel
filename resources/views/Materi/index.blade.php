@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            @if($errors->any())
            <ul style="color:red;">
              @foreach($errors->all() as $error)
              <li> {{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <div class="card-header">
              <h3 class="card-title">Data Materi</h3>
            </div>

            @if(session('success'))
            <p style="color:green"> {{ session('success') }}</p>
            @endif

            <div class="card-body">
              <a href="{{ route('tambahMateri') }}" class="btn btn-success"><i class="nav-icon fas fa-plus"></i>Tambah Materi</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($materis as $materi)
                  <tr>
                    <td>{{ $materi->judul }}</td>
                    <td>{{ \Str::limit($materi->konten, 50) }}</td>
                    <td>
                      <a href="{{ route('materiedit', $materi->id) }}" class="btn btn-primary">Edit</a> |
                      <form action="{{ route('materidelete', $materi->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus materi ini?');">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection

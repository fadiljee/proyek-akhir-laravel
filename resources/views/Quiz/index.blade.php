@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Kuis</h3>
              @if(session('success'))
              <p style="color:green"> {{ session('success') }}</p>
              @endif
            </div>
            <div class="card-body">
                {{-- <a href="{{ route('tambahkuis') }}" class="btn btn-success float-light">Tambah Kuis</a> --}}
                <a href="{{ route('tambahkuis') }}" class="btn btn-success"><i class="nav-icon fas fa-plus"></i>Tambah Kuis</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Pertanyaan</th>
                    <th>Materi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kuis as $item)
                  <tr>
                    <td>{{ $item->pertanyaan }}</td>
                    <td>{{ $item->materi->judul }}</td>
                    <td>
                      <a href="{{ route('kuisedit', $item->id) }}" class="btn btn-primary">Edit</a>
                      <form action="{{ route('kuisdelete', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus kuis ini?');">Hapus</button>
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

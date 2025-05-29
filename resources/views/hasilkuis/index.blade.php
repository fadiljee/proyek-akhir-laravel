@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <h3 class="mt-3 mb-4 text-center">Rekap Hasil Kuis</h3>

      <!-- Search and Filter Form -->
      <div class="row mb-4">
        <!-- Search Bar -->
        <div class="col-md-6">
          <form action="{{ route('hasil-kuis') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Cari Siswa atau Pertanyaan" value="{{ request()->search }}">
            <button type="submit" class="btn btn-primary ml-2">Cari</button>
          </form>
        </div>

        <!-- Date Filter -->
        <div class="col-md-6">
          <form action="{{ route('hasil-kuis') }}" method="GET" class="d-flex filter-form">
            <!-- Start Date -->
            <div class="form-group">
              <label for="start_date" class="font-weight-bold">Dari Tanggal</label>
              <input type="date" name="start_date" class="form-control" value="{{ request()->start_date }}"
                     title="Pilih tanggal mulai untuk filter hasil kuis">
            </div>

            <!-- End Date -->
            <div class="form-group">
              <label for="end_date" class="font-weight-bold">Hingga Tanggal</label>
              <input type="date" name="end_date" class="form-control" value="{{ request()->end_date }}"
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
              @forelse($hasilKuis as $hasil)
                <tr>
                  <td>{{ $hasil->siswa->nama ?? '-' }}</td>
                  <td>{{ $hasil->kuis->materi->judul ?? '-' }}</td>
                  <td>{{ $hasil->kuis->pertanyaan ?? '-' }}</td>
                  <td>{{ $hasil->jawaban_user ?? '-' }}</td>
                  <td>{{ $hasil->kuis->jawaban_benar ?? '-' }}</td>
                  <td>{{ $hasil->skor ?? 0 }}</td>
                  <td>
                    {{ $hasil->waktu_dikerjakan ? \Carbon\Carbon::parse($hasil->waktu_dikerjakan)->format('d-m-Y H:i') : '-' }}
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center">Belum ada data hasil kuis.</td>
                </tr>
              @endforelse
            </tbody>
          </table>

          <!-- Pagination -->
          <div class="d-flex justify-content-center mt-4">
            {{ $hasilKuis->links('vendor.pagination.bootstrap-4') }}
          </div>
        </div>
      </div>
    </div> <!-- /.container-fluid -->
  </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

@endsection

@section('styles')
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
@endsection

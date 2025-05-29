@extends('admin.layout')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <h3 class="mt-4 mb-4 text-center text-dark"><b>RANKING KUIS</b></h3>

      <div class="card shadow-sm">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th class="text-center">Nama Siswa</th>
                  <th class="text-center">Total Skor</th>
                </tr>
              </thead>
              <tbody>
                @forelse($leaderboard as $entry)
                  <tr class="align-middle">
                    <td class="text-center">{{ $entry->siswa->nama ?? 'Nama tidak ditemukan' }}</td>
                    <td class="text-center">{{ $entry->total_skor }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="2" class="text-center text-muted">Belum ada data leaderboard.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Pagination --}}
      <div class="d-flex justify-content-center mt-4">
        {{ $leaderboard->links() }}
      </div>
    </div>
  </section>
</div>
@endsection

<style>
/* CSS untuk keseluruhan halaman */
.content-wrapper {
  background-color: #f9f9f9;
  padding: 20px;
}

.card {
  border: none;
  border-radius: 10px;
  overflow: hidden;
  background-color: #ffffff;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  width: 100%; /* Memastikan card mengikuti lebar kontainer */
}

/* Judul */
h3 {
  font-family: 'Arial', sans-serif;
  font-weight: bold;
  font-size: 2rem; /* Membuat judul lebih besar */
  color: #007bff;
  text-align: center;
  margin-bottom: 20px;
}

/* Tabel */
.table {
  width: 100%; /* Memastikan tabel melebar sesuai lebar card */
  margin-top: 20px;
  border-collapse: collapse;
}

.table th,
.table td {
  padding: 15px; /* Membuat padding lebih besar */
  text-align: center;
  border: 1px solid #dee2e6;
  font-size: 1.125rem; /* Membesarkan ukuran font */
  font-family: 'Arial', sans-serif;
}

.table thead {
  background-color: #007bff;
  color: #ffffff;
}

.table tbody tr:nth-child(odd) {
  background-color: #f8f9fa;
}

.table tbody tr:hover {
  background-color: #e2e6ea;
  cursor: pointer;
}

.table td {
  word-wrap: break-word;
  text-overflow: ellipsis;
}

/* Pagination */
.pagination {
  justify-content: center;
  display: flex;
  margin-top: 20px;
}

.pagination .page-link {
  border-radius: 50%;
  color: #007bff;
  margin: 0 5px;
  background-color: #ffffff;
  border: 1px solid #007bff;
}

.pagination .page-link:hover {
  background-color: #007bff;
  color: #ffffff;
}

.pagination .page-item.active .page-link {
  background-color: #007bff;
  border-color: #007bff;
  color: white;
}

.text-muted {
  font-size: 1rem;
  color: #6c757d;
}

/* Responsive Design */
@media (max-width: 768px) {
  .table th, .table td {
    font-size: 1rem; /* Mengatur font lebih besar di layar kecil */
    padding: 12px; /* Menambah padding */
  }

  h3 {
    font-size: 1.75rem; /* Menurunkan ukuran font pada layar kecil */
  }
}
</style>

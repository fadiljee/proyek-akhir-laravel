@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">FORM EDIT MATERI</h3>
            </div>

            <form action="{{ route('updatemateri', $materi->id) }}" method="POST">
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label>Judul Materi</label>
                  <input type="text" class="form-control" name="judul" value="{{ $materi->judul }}" placeholder="Input Judul Materi" required>
                </div>
                <div class="form-group">
                  <label>Konten Materi</label>
                  <textarea class="form-control" name="konten" placeholder="Input Konten Materi" required>{{ $materi->konten }}</textarea>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Materi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection

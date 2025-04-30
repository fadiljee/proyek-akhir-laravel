@extends('admin.layout')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Kuis</h3>
            </div>

            <form action="{{ route('updatekuis', $kuis->id) }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="pertanyaan">Pertanyaan</label>
                  <input type="text" class="form-control" name="pertanyaan" value="{{ $kuis->pertanyaan }}" required>
                </div>
                <div class="form-group">
                  <label for="materi_id">Pilih Materi</label>
                  <select class="form-control" name="materi_id" required>
                    @foreach ($materis as $materi)
                    <option value="{{ $materi->id }}" {{ $materi->id == $kuis->materi_id ? 'selected' : '' }}>{{ $materi->judul }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Kuis</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection

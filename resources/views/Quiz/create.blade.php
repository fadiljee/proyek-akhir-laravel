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
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            @endif

            <div class="card-header">
              <h3 class="card-title">Tambah Kuis</h3>
            </div>

            <form action="{{ route('prosestambahkuis') }}" method="POST">
              @csrf
              <div class="card-body">
                <!-- Pertanyaan -->
                <div class="form-group">
                  <label for="pertanyaan">Pertanyaan</label>
                  <input type="text" class="form-control" name="pertanyaan" value="{{ old('pertanyaan') }}" required>
                </div>

                <!-- Pilihan Jawaban -->
                <div class="form-group">
                  <label for="jawaban_a">Jawaban A</label>
                  <input type="text" class="form-control" name="jawaban_a" value="{{ old('jawaban_a') }}" required>
                </div>

                <div class="form-group">
                  <label for="jawaban_b">Jawaban B</label>
                  <input type="text" class="form-control" name="jawaban_b" value="{{ old('jawaban_b') }}" required>
                </div>

                <div class="form-group">
                  <label for="jawaban_c">Jawaban C</label>
                  <input type="text" class="form-control" name="jawaban_c" value="{{ old('jawaban_c') }}" required>
                </div>

                <div class="form-group">
                  <label for="jawaban_d">Jawaban D</label>
                  <input type="text" class="form-control" name="jawaban_d" value="{{ old('jawaban_d') }}" required>
                </div>

                <!-- Pilihan Jawaban Benar -->
                <div class="form-group">
                  <label for="jawaban_benar">Jawaban Benar</label>
                  <select class="form-control" name="jawaban_benar" required>
                    <option value="">Pilih Jawaban Benar</option>
                    <option value="A" {{ old('jawaban_benar') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('jawaban_benar') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('jawaban_benar') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('jawaban_benar') == 'D' ? 'selected' : '' }}>D</option>
                  </select>
                </div>

                <!-- Pilihan Materi -->
                <div class="form-group">
                  <label for="materi_id">Pilih Materi</label>
                  <select class="form-control" name="materi_id" required>
                    <option value="">Pilih Materi</option>
                    @foreach ($materis as $materi)
                      <option value="{{ $materi->id }}" {{ old('materi_id') == $materi->id ? 'selected' : '' }}>{{ $materi->judul }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah Kuis</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection

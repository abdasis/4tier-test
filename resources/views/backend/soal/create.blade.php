@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card ">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Soal</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('soal.create') }}" method="POST" enctype="multipart/form-data">
                      <div class="card-body">
                          <div class="form-group">
                              <label for="title-soal">Tulis Soal</label>
                              <textarea name="isi_soal" id="summernote">{{ old('isi_soal') }}</textarea>
                          </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">A</span>
                                </div>
                                <input type="text" name="jawaban[]" class="form-control" value="{{ old('jawaban.0') }}" placeholder="Masukan jawaban">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">B</span>
                                </div>
                                <input type="text" name="jawaban[]" class="form-control" value="{{ old('jawaban.1') }}" placeholder="Masukan jawaban">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">C</span>
                                </div>
                                <input type="text" name="jawaban[]" class="form-control" value="{{ old('jawaban.2') }}" placeholder="Masukan jawaban">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">D</span>
                                </div>
                                <input type="text" name="jawaban[]" class="form-control" value="{{ old('jawaban.3') }}" placeholder="Masukan jawaban">
                            </div>

                            <h5 class="header-title">
                                Masukan Alasan
                            </h5>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">A</span>
                                </div>
                                <input type="text" name="alasan[]" value="{{ old('alasan.0') }}" class="form-control" placeholder="Masukan jawaban">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">B</span>
                                </div>
                                <input type="text" name="alasan[]" value="{{ old('alasan.1') }}" class="form-control" placeholder="Masukan jawaban">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">C</span>
                                </div>
                                <input type="text" name="alasan[]" value="{{ old('alasan.2') }}" class="form-control" placeholder="Masukan jawaban">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">D</span>
                                </div>
                                <input type="text" name="alasan[]" value="{{ old('alasan.3') }}" class="form-control" placeholder="Masukan jawaban">
                            </div>

                      </div>
                      <!-- /.card-body -->
                      @csrf
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Simpan Soal</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-undo mr-1"></i>Batal</button>
                      </div>
                    </form>
                  </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Statistik Soal
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin-js')
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 150
        });
    });
</script>
@endsection

@section('plugin-css')
    <style>
        .note-editor.note-airframe, .note-editor.note-frame {
            border: 1px solid #f6f6f6;
            /* box-shadow: 0 1px 5px 2px #eee; */
        }
    </style>
@endsection
@extends('frontend.layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Jawablah Ujian dibawah ini dengan benar
                    </h3>
                </div>

                <form action="{{ route('hasil.simpan') }}" method="POST">
                
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="nama-siswa">Nama Siswa</label>
                                <input type="text" class="form-control" name="namasiswa" placeholder="Masukan Nama">
                            </div>
        
                            <div class="form-group">
                                <label for="nama-siswa">Kelas</label>
                                <input type="text" class="form-control" name="kelas" placeholder="Masukan Kelas">
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="card-body">
                    <h4>Selamat Mengerjakan Test</h4>
                    <hr>
                    <div class="container">
                            @foreach ($datasoal as $nomor => $soal)
                            <input type="hidden" name="soal_{{ $soal->id }}" value="{{ $soal->isi_soal }}">
                            <h5>{!! $soal->isi_soal !!}</h5>
                            <ul>
                                <p>Jawaban</p>
                                @foreach ($soal->jawabans as $jawaban)
                                <li type="A"> 
                                    <div class="custom-control custom-radio">
                                        <input value="{{ $jawaban->jawaban }}" class="custom-control-input" type="radio" id="jawaban_soal_{{ $jawaban->id }}" name="jawaban_soal_{{ $jawaban->soal_id}}">
                                        <label for="jawaban_soal_{{ $jawaban->id }}" class="custom-control-label">{{ $jawaban->jawaban }}</label>
                                    </div>
                                </li>
                                @endforeach
                                <li type="none" class="mt-3"><b> Tingkat Keyakinan</b></li>
                                <li type="none">
                                    @foreach (range(1,5) as $keyakinan)
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input value="{{ $keyakinan }}" type="radio" id="tingkat_keyakinan_jawaban{{ $jawaban->soal_id }}{{ $keyakinan }}" name="keyakinan_jawaban_soal_{{ $soal->id }}" class="custom-control-input">
                                        <label class="custom-control-label" for="tingkat_keyakinan_jawaban{{ $jawaban->soal_id }}{{ $keyakinan }}">{{ $keyakinan }}</label>
                                    </div>
                                    @endforeach
                                </li>
                            </ul>
                            <ul>
                                <p><b>Alasan</b></p>
                                @foreach ($soal->alasans as $keyakinan)
                                <li type="A"> 
                                    <div class="custom-control custom-radio">
                                        <input value="{{ $keyakinan->alasan }}" class="custom-control-input" type="radio" id="asalan_soal_{{ $keyakinan->id }}" name="alasan_soal_{{ $keyakinan->soal_id}}">
                                        <label for="asalan_soal_{{ $keyakinan->id }}" class="custom-control-label">{{ $keyakinan->alasan }}</label>
                                    </div>
                                </li>
                                @endforeach
                                <li type="none" class="mt-3"><b>Tingkat Keyakinan</b></li>
                                <li type="none">
                                    @foreach (range(1,5) as $keyakinan)
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input value="{{ $keyakinan }}" type="radio" id="keyakinan_alasan_soal{{ $jawaban->soal_id }}{{ $keyakinan }}" name="keyakinan_alasan_soal_{{ $soal->id }}" class="custom-control-input">
                                        <label class="custom-control-label" for="keyakinan_alasan_soal{{ $jawaban->soal_id }}{{ $keyakinan }}">{{ $keyakinan }}</label>
                                    </div>
                                    @endforeach
                                </li>
                            </ul>
                            <hr>    
                            @endforeach
                            @csrf
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>Simpan Jawaban</button>
                  </div>

                </form>

            </div>
        </div>
    </div>
@endsection
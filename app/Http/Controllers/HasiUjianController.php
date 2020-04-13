<?php

namespace App\Http\Controllers;

use App\Models\HasiUjian;
use Illuminate\Http\Request;
use App\Models\Soal;
use RealRashid\SweetAlert\Facades\Alert;

class HasiUjianController extends Controller
{
    public function store(Request $request)
    {
        $countSoal = Soal::all()->count();
        $soal_id = Soal::pluck('id')->first();
        $dataSoal = [];
        for ($i = $soal_id; $i <= $countSoal; $i++) {
            $dataSoal[] = [
                'soal' =>  $request->input('soal_' . $i),
                'jawaban' =>  $request->input('jawaban_soal_' . $i),
                'keyakinan_jawaban' =>  $request->input('keyakinan_jawaban_soal_' . $i),
                'alasan' =>  $request->input('alasan_soal_' . $i),
                'keyakinan_alasan' =>  $request->input('keyakinan_alasan_soal_' . $i),
            ];
        }

        foreach ($dataSoal as $jawaban) {

            // dd($jawaban['soal']);
            $jawab = HasiUjian::create([
                'nama_siswa' => $request->namasiswa,
                'kelas' => $request->kelas,
                'nomor_soal' => 1,
                'soal' => $jawaban['soal'],
                'status_jawaban' => 'belum dikoreksi',
                'jawaban' => $jawaban['jawaban'],
                'keyakinan_jawaban' => $jawaban['keyakinan_jawaban'],
                'alasan' => $jawaban['alasan'],
                'keyakinan_alasan' => $jawaban['keyakinan_alasan']
            ]);
        }

        if ($jawab) {
            Alert::success('Selamat', 'Jawaban anda sudah tersimpan');
            return '<h1 class="text-center mt-5">Terimakasih Telah menjawabn test ini</h1>';
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Jawaban;
use App\Models\Alasan;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\HasiUjian;

class SoalController extends Controller
{
    public function index()
    {
        $soals = Soal::all();
        return view('backend.soal.index')->with(['soals' => $soals]);
    }


    public function create()
    {
        return view('backend.soal.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'isi_soal' => 'required',
            'jawaban'   => 'required',
            'alasan'    => 'required'
        ];

        $messages = [
            'isi_soal' => 'Isi soal wajib diisi',
            'jawaban' => 'Jawaban wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            dd($validator->errors());
            Alert::warning('Maaf', 'Wajahmu terlalu cantik untuk membuat kesalahan ini!');
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $dom = new \domdocument();
        $dom->loadHtml($request->isi_soal, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        foreach ($images as $k => $img) {
            $data = $img->getattribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);

            $image_name = time() . $k . '.png';
            $path =   public_path() . '/' . $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', $image_name);
        }

        $isi_soal = $dom->savehtml();

        try {
            DB::beginTransaction();
            $storeSoal = Soal::create([
                'isi_soal' => $isi_soal
            ]);
            $soal = Soal::find($storeSoal->id);

            foreach ($request->jawaban as  $jawaban) {
                $jawab = $soal->jawabans()->create([
                    'jawaban' => $jawaban
                ]);
            }

            foreach ($request->alasan as  $alasan) {
                $alas = $soal->alasans()->create([
                    'alasan' => $alasan
                ]);
            }
            DB::commit();
            Alert::success('Mantap', 'Mantap udah cantik pinter lagi :)');
            return redirect()->route('soal.create');
        } catch (\Throwable $th) {
            DB::rollback();
            report($th);
        }
    }

    public function jawab()
    {


        $soals = Soal::all();
        return view('frontend.soal.jawab-soal')->with(['datasoal' => $soals]);
    }


    public function statistik()
    {
        $statistik = HasiUjian::select('nama_siswa')->distinct()->get();
        return view('frontend.soal.statistik')->with(['statistiks' => $statistik]);
    }

    public function detailJawaban($nama_siswa, Request $request)
    {
        $detail_jawaban = HasiUjian::where('nama_siswa', $nama_siswa)->get();
        return view('frontend.soal.detail-jawabab')->with(['jawaban' => $detail_jawaban, 'nama_siswa' => $nama_siswa]);
    }
}
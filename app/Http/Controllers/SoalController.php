<?php

namespace App\Http\Controllers;

use DOMXPath;
use DOMDocument;
use App\Models\Bank;
use App\Models\Soal;
use App\Models\Jawab;
use App\Models\Ujian;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nomor)
    {
        if (is_null($nomor)) {
            $nomor = 1;
        }
        $soals = Bank::where('nomor', $nomor)->get();
        $banks = Bank::all();
        $jawabs = Jawab::where('nim', auth()->guard('mahasiswa')->user()->nim)->pluck('nomor')->toArray() ?? [];
        return view('auth.peserta.soal', compact('banks', 'soals', 'jawabs'));
    }

    public function durasi()
    {
        $kode = Peserta::where('id_mahasiswa', auth()->guard('mahasiswa')->user()->nim)->value('kode');
        $durasi = Ujian::where('kode', $kode)->value('durasi');
        return response()->json(['durasi' => $durasi]);
    }

    public function jawab($nomor, $jawab, Request $request)
    {
        Jawab::updateOrCreate(
            ['nim' => auth()->guard('mahasiswa')->user()->nim, 'nomor' => $nomor], // Kondisi untuk memeriksa entri yang ada
            [
                'nomor' => $nomor,
                'jawaban' => $jawab
            ] // Data yang akan diisi atau diperbarui
        );

        $totalQuestions = Bank::count();

        if ($nomor + 1 > $totalQuestions) {
            return redirect()->route('soal', $nomor);
        }

        return redirect()->route('soal', $nomor + 1);
    }

    public function convert(Request $request)
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTMLFile('tes.htm');
        libxml_clear_errors();
        $xpath = new DOMXPath($dom);
        $scriptElements = $xpath->query('//script');
        $ansMap = [];
        foreach ($scriptElements as $script) {
            $scriptContent = $script->textContent;

            if (strpos($scriptContent, 'ansMap') !== false) {
                preg_match_all("/ansMap\[(\d+)\] = '(\w+)';/", $scriptContent, $matches, PREG_SET_ORDER);
                foreach ($matches as $match) {
                    $index = $match[1];
                    $value = $match[2];
                    $ansMap[$index] = $value;
                }
            }
        }

        function translateAnswer($s, $answerIndex)
        {
            $value = ($answerIndex % 31) + 1;
            $newString = '';
            for ($i = 0; $i < strlen($s); $i += 2) {
                $code = hexdec(substr($s, $i, 2));
                $newString .= chr($code ^ $value);
            }
            return $newString;
        }
        $translatedAnswers = [];
        foreach ($ansMap as $index => $value) {
            $translatedAnswers[$index] = translateAnswer($value, $index);
        }
        $qnumberPs = $xpath->query("//p[@class='qnumber']");
        foreach ($qnumberPs as $index => $p) {
            $qnumberText = $p->textContent;
            $qnumberText = preg_replace('/\D/', '', $qnumberText);
            $defaultDiv = $xpath->query(".//div[@class='default']", $p->parentNode->nextSibling->nextSibling)->item(0);
            $defaultText = '';
            if ($defaultDiv) {
                foreach ($defaultDiv->childNodes as $child) {
                    $defaultText .= $child->textContent . ' ';
                }
                $defaultText = str_replace(["\r", "\n"], ' ', $defaultText);
            } else {
                $defaultText = "(No default text found)";
            }
            $choiceDivs = $xpath->query(".//div[@class='choice']", $p->parentNode->parentNode);
            $opsiArray = [];
            foreach ($choiceDivs as $div) {
                $siblingTd = $div->parentNode->nextSibling;
                if ($siblingTd) {
                    $siblingText = $siblingTd->textContent;
                    $siblingText = str_replace(["\r", "\n"], ' ', trim($siblingText));
                    $siblingText = preg_replace('/\s+/', ' ', $siblingText);
                    $opsiArray[] = $siblingText;
                } else {
                    $opsiArray[] = ' (error)';
                }
            }

            // Find the image tag 
            $imageTag = $xpath->query(".//img", $defaultDiv)->item(0);
            $imageSrc = '';
            $textAfterImage = '';
            if ($imageTag) {
                $imageSrc = $imageTag->getAttribute('src');
                $nextSibling = $imageTag->nextSibling;
                while ($nextSibling) {
                    if ($nextSibling->nodeType === XML_TEXT_NODE) {
                        // $textAfterImage .= $nextSibling->textContent . ' ';
                        $textAfterImage .= str_replace(["\r", "\n"], ' ', trim($nextSibling->textContent . ' '));;
                    }
                    $nextSibling = $nextSibling->nextSibling;
                }
            }

            $soal = str_replace(trim($textAfterImage), '', trim($defaultText));

            $data = [
                'nomor' => $qnumberText,
                'soal' => $soal,
                'pilihan' => json_encode($opsiArray),
                'jawaban' => $translatedAnswers[$index] ?? '(No answer found)',
                'gambar' => $imageSrc,
                'teks_gambar' => $textAfterImage,
            ];
            Bank::create($data);
        }
        return back();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Soal $soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soal $soal)
    {
        //
    }
}

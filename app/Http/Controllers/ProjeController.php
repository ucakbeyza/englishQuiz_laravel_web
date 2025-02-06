<?php

namespace App\Http\Controllers;

use App\Models\BenzerlerModel;
use Illuminate\Http\Request;
use App\Models\ingilizcemodel;
use App\Models\SorularModel;
use App\Models\TestlerModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use stdClass;

class ProjeController extends Controller
{
    public function liste()
    {
        $veri = new stdClass;
        $veri->sorular = BenzerlerModel::get();
        return view('prj.liste', ['veri' => $veri]);
    }

    public function soruekle()
    {
        $veri = new stdClass;
        $veri->benzerler = BenzerlerModel::get();
        return view('prj.soruekleme', ['veri' => $veri]);
    }

    public function sorueklemeyap(Request $req)
    {
        switch ($req->seviye) {
            case 0:
                $seviye = 'kolay';
                break;
            case 1:
                $seviye = 'orta';
                break;
            case 2:
                $seviye = 'zor';
                break;
            default:
                dd('burada1');
                break;
        }
        if ($req->benzer == -1) {
            $benzer = null;
            $cevap = 'YOK';
        } else {
            $benzer = $req->benzer;
            $cevap = BenzerlerModel::where('id', $benzer)->pluck('kelime')->first();
        }

        $data = BenzerlerModel::limit(4)->pluck('kelime')->toArray();
        shuffle($data);


        BenzerlerModel::insert([
            "kelime" => $req->kelime,
            "a" => $data[0],
            "b" => $data[1],
            "c" => $data[2],
            "d" => $data[3],
            "cevap" => $cevap,
            "benzer_id" => $benzer,
            "seviye" => $seviye,
        ]);
        return redirect()->route('prjliste');
    }
    public function soruduzenle($soruid)
    {
        $veri = new stdClass;
        $veri->soru = BenzerlerModel::where('id', $soruid)->first();
        $veri->benzerler = BenzerlerModel::get();
        return view('prj.soruduzenleme', ['veri' => $veri]);
    }
    public function soruduzenlemeyap(Request $req, $soruid)
    {
        $soru = BenzerlerModel::where('id', $soruid)->first();
        switch ($req->seviye) {
            case 0:
                $seviye = 'kolay';
                break;
            case 1:
                $seviye = 'orta';
                break;
            case 2:
                $seviye = 'zor';
                break;
            default:
                $seviye = $soru->seviye;
                break;
        }
        if ($req->benzer == -1) {
            $benzer = null;
            $data = BenzerlerModel::limit(4)->pluck('kelime')->toArray();
            shuffle($data);
        } else {
            $benzer = $req->benzer;
            $data = BenzerlerModel::limit(3)->pluck('kelime')->toArray();
            $benzerk = BenzerlerModel::where('id',$req->benzer)->first();
            array_push($data,$benzerk->kelime);
            shuffle($data);
        }
        BenzerlerModel::where('id', $soruid)->update([
            "kelime" => $req->kelime,
            "a" => $data[0],
            "b" => $data[1],
            "c" => $data[2],
            "d" => $data[3],
            "benzer_id" => $benzer,
            "seviye" => $seviye,
        ]);
        return redirect()->route('prjliste');
    }
    public function sorusil($soruid)
    {
        $sil = BenzerlerModel::where('id', $soruid)->delete();
        return redirect()->route('prjliste');
    }
    public function servissorular()
    {
        $veri = new stdClass;
        $veri->benzerler = BenzerlerModel::get();
        $headers = ['Content-type' => 'application/json; charset=UTF-8'];
        return response()->json([
            'islem' => true,
            'message' => 'sorular listelendi',
            'data' => $veri
        ], 200, $headers);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ingilizcemodel;
use App\Models\SorularModel;
use App\Models\TestlerModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use stdClass;

class KelimeController extends Controller
{
    public function liste(){
        $veri = new stdClass;
        $veri->testler = TestlerModel::get();
        $veri->sorular = SorularModel::get();

        return view('liste',['veri' => $veri]);
    }
    public function testekleme(){
        return view('testekleme');
    }
    public function soruekle(){
        $veri = new stdClass;
        $veri->testler = TestlerModel::get();
        return view('soruekleme',['veri' => $veri]);
    }
    public function testeklemeyap(Request $req){
        TestlerModel::insert([
            "baslik" => $req->testadi
        ]);
        return redirect()->route('liste');
    }
    public function sorueklemeyap(Request $req){
        SorularModel::insert([
            "testid" => $req->testno,
            "soru" => $req->soru,
            "sikA" => $req->cevapa,
            "sikB" => $req->cevapb,
            "sikC" => $req->cevapc,
            "sikD" => $req->cevapd,
            "cevap" => $req->dogru,
        ]);
        return redirect()->route('liste');
    }













    public function ekleme(){
        return view('ekleme');
    }
    public function veritabanıyaz(Request $req){
        /* ingilicemodel::insert([
            'kelime'=>$req->kelimeadi,
            'seviye'=>$req->seviyesi,
            'benzer'=>$req->kelimebenzeri,
            'A'=>$req->sikA,
            'B'=>$req->sikB,
            'C'=>$req->sikC,
            'D'=>$req->sikD,
            'SORU'=>$req->soru



        ]); */
        return "veri tabanına yazıldı";
    }
    public function servissorular(){
        $veri = new stdClass;
        $veri->testler = TestlerModel::get();
        $veri->sorular = SorularModel::get();//TestlerModel::join('sorular','sorular.testid','=','testler.id')->get(['testler.baslik',])
        $headers = ['Content-type' => 'application/json; charset=UTF-8'];
        return response()->json([
            'islem' => true,
            'message' => 'sorular listelendi',
            'data' => $veri
        ],200,$headers);
    }
}

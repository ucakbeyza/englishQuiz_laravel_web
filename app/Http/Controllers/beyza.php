<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestlerModel;

class beyza extends Controller
{
    public function ucak(){
        $sayi1=16;
        $sayi2=45;
        $sonuc=$sayi1 + $sayi2;

        return $sonuc;

    }
    public function agac(){
        $sayi1=16;
        $sayi2=45;
        $sonuc=$sayi1 + $sayi2;

        return view('hakan',['cevap'=> $sonuc]);

    }
    public function deniz(){
        $n=100;
        $sum=0;
        for($a=1;$a<=$n;$a++){
            $sum+=$a;
        }
        return $sum;
    }
    public function gunes(Request $req){
        if($req->kopek==1){
            $sonuc=$req->kedi+$req->fare;
            
        }
        else if($req->kopek==4){
            $sonuc=$req->kedi-$req->fare;
            
        }
        return $sonuc;
    }
    public function veriekle(){
        //veri ekleme
        /* $isim="test0";
        TestlerModel::insert([
            "baslik"=>$isim,
        ]); */
        //veri çekme
        //çoklu veri çekme
        $gelenveri=TestlerModel::get();
        
        foreach($gelenveri as $items){
            echo $items->baslik;
        }
        //spesifik veri çekme
        /* $gelenveri=TestlerModel::where('id',1)->first();
        return $gelenveri->baslik; */


    }
}

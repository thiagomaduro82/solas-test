<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class MainController extends Controller
{
    public function index(MainRequest $request)
    {
        $request->validated();
        try {
            $affiliates = $this->convertFile($request->data_file);
        } catch (\Throwable $th) {
            session()->flash('msg_error','Error converting the file, check if it is of type text and contains a valid JSON.');
            return view('main', ['msg_error' => session('msg_error')]);
        }

        return view('main',['affiliates' => $affiliates]);
    }

    public function convertFile($data_file){
        $file = file($data_file);
        $total_lines  = count($file);
        $data = array();
        for ($x = 0; $x < $total_lines; $x++) {
            $data[] = json_decode($file[$x]);
        }
        $data = $this->checkDistance($data);
        return $data;
    }

    public function distance($latitude, $longitude)
    {

        $affiliate_lat = deg2rad($latitude);
        $affiliate_lon = deg2rad($longitude);
        $DUBLIN_LAT = deg2rad(53.3340285);
        $DUBLIN_LON = deg2rad(-6.2535495);

        $dist = (6371 * acos(cos($affiliate_lat) * cos($DUBLIN_LAT) * cos($DUBLIN_LON - $affiliate_lon) + sin($affiliate_lat) * sin($DUBLIN_LAT)));
        $dist = number_format($dist, 2, '.', '');
        return $dist;
    }

    public function checkDistance($data){
        $distanceDublinData = [];
        for($x=0; $x < count($data); $x++ ){
            if($this->distance($data[$x]->latitude,$data[$x]->longitude) <= 100) {
                $distanceDublinData[] = [
                    'affiliate_id' => $data[$x]->affiliate_id,
                    'name' => $data[$x]->name,
                    'distance' => $this->distance($data[$x]->latitude,$data[$x]->longitude),
                ];
            }
        }
        return $distanceDublinData;
    }
}

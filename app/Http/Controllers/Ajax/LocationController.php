<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\DistrictServiceInterface as DistrictService;
use App\Services\Interfaces\ProvinceServiceInterface as ProvinceService;
use Psy\Readline\Hoa\Console;

class LocationController extends Controller
{
     protected $districtService;
     protected $provinceService;

     public function __construct(DistrictService $districtService,ProvinceService $provinceService){
        $this->districtService = $districtService;
        $this->provinceService = $provinceService;
     }
     public function get_location(Request $request){
       $get = $request->input();

        $html = '';
        if($get['target'] == 'districts'){
           $province = $this->provinceService->findId($get['data']['location_id'],['full_name','code'],['districts']);
           $html = $this->renderHtml($province->districts);
          }else 
          if($get['target'] == 'wards'){
           $district = $this->districtService->findId($get['data']['location_id'],['full_name','code'],['wards']);
           $html = $this->renderHtml($district->wards, '[Chọn Phường/Xã]');
          }
        $response = [
            'html' => $html
        ];
        return response()->json($response);
     }
     
     public function renderHtml($districts, $root = '[Chọn Quận/Huyện]'){
          $html = '<option value="">'.$root.'</option>';
          foreach ($districts as $district) {
               $html .= '<option value="'.$district->code.'">'.$district->full_name.'</option>';
          }
          return $html;
     }



}

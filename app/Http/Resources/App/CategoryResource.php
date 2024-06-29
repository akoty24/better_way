<?php

namespace App\Http\Resources\App;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class CategoryResource extends JsonResource
{

    public function toArray($request){
        $Client = auth('client')->user();
        if($Client){
            $ClientLanguage = LocalAppLanguage($Client->ClientLanguage);
            $CategoryName = "CategoryName".$ClientLanguage;
        }else{
            $CategoryName = "CategoryNameEn";
        }

        return [
            'IDCategory'             => $this->IDCategory,
            'CategoryName'           => $this->$CategoryName,
            'CategoryLogo'           => ($this->CategoryLogo) ? asset($this->CategoryLogo) : '',
        ];
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeegowApiService;

class SpecialtyController extends Controller
{
    public function __construct(FeegowApiService $feeGow)
    {
        $this->feeGowApi = $feeGow;
    }

    public function list()
    {
        $endPoint = '/specialties/list';
        $params['endpoint'] = $endPoint;

        $specialties = $this->feeGowApi->getResource($params);
        return response($specialties);
    }
}

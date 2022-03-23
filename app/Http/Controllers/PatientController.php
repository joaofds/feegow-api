<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeegowApiService;

class PatientController extends Controller
{
    public function __construct(FeegowApiService $feeGow)
    {
        $this->feeGowApi = $feeGow;
    }

    public function listSources()
    {
        $endPoint = '/patient/list-sources';
        $params['endpoint'] = $endPoint;

        $specialties = $this->feeGowApi->getResource($params);
        return response($specialties);
    }
}

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

    /**
     * Busca todas as origens de "como conheceu?".
     *
     * @return Array
     */
    public function listSources()
    {
        $endPoint = '/patient/list-sources';
        $params['endpoint'] = $endPoint;

        $sourceList = $this->feeGowApi->getResource($params);
        return response($sourceList);
    }
}

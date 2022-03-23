<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeegowApiService;

class ProfessionalController extends Controller
{
    public function __construct(FeegowApiService $feeGow)
    {
        $this->feeGowApi = $feeGow;
    }

    public function list(Request $request)
    {
        $id = $request->query('id');
        $endPoint = '/professional/list';

        $params['id'] = $id;
        $params['endpoint'] = $endPoint;

        $specialties = $this->feeGowApi->getResource($params);
        return response($specialties);
    }
}

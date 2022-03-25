<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeegowApiService;
use App\Models\PatientAppointment;

class PatientController extends Controller
{
    public function __construct(
        FeegowApiService $feeGow,
        PatientAppointment $patientPivot
    ) {
        $this->feeGowApi = $feeGow;
        $this->patientPivot = $patientPivot;
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

    public function appointment(Request $request)
    {
        $data = $request->all();
        return response()->json(
            [
                $data
            ],
            200
        );
    }
}

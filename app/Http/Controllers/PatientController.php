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

    /**
     *  Insere dados em tabela pivot
     *
     * @param Request $request
     * @return Json
     */
    public function appointment(Request $request)
    {
        $data = $request->all();
        try {
            $result = $this->patientPivot->create($data);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'error' => true,
                    'message' => $e->getMessage()
                ],
                503
            );
        }

        return response()->json(
            [
                'status' => 200,
                'message' => 'dados salvos com sucesso',
                'data' => $result
            ],
            200
        );
    }
}

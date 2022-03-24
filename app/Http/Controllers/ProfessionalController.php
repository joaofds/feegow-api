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

    /**
     * Busca todos os profissionais na API e filtra por especialidade.
     *
     * @param Request $request
     * @return array
     */
    public function list(Request $request)
    {
        $id = $request->query('id');
        $endPoint = '/professional/list';

        $params['id'] = $id;
        $params['endpoint'] = $endPoint;

        $response = $this->feeGowApi->getResource($params);
        $dataArray = (array)json_decode($response);

        $professionals = [];
        foreach ($dataArray['content'] as $professional) {
            foreach ($professional->especialidades as $key => $value) {
                foreach ($value as $key => $item) {
                    if ($key == 'especialidade_id' && $item == $id) {
                        $professionals[] = $professional;
                    }
                }
            }
        }
        return response($professionals);
    }
}

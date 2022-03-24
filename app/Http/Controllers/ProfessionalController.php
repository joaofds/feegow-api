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
        dd($request->all());
        $id = $request->query('id');
        dd($id);
        $endPoint = '/professional/list';

        $params['id'] = $id;
        $params['endpoint'] = $endPoint;

        $response = $this->feeGowApi->getResource($params);
        $dataArray = (array)json_decode($response);

        $professionals = [];
        foreach ($dataArray['content'] as $professional) {
            //dd($key, $professional->especialidades);
            foreach ($professional->especialidades as $key => $value) {
                foreach ($value as $key => $item) {
                    //dd($item);
                    if ($key === 'especialidade_id' && $item === 212) {
                        $professionals[] = $professional;
                    }
                }
            }
        }
        return response($professionals);
    }
}

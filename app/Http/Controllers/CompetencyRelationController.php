<?php

namespace App\Http\Controllers;

use App\Models\Competency_Model;
use App\Models\Competency;
use Flash;
use App\Repositories\Competency_ModelRepository;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CompetencyRelationController extends Controller
{
    private $competencyModelRepository;

    public function create($id){
        // $competencyModel = $this->competencyModelRepository->find($id);
        $competencyModel = Competency_Model::findOrFail($id);



        if (empty($competencyModel)) {
            Flash::error('Competency Model not found');

            return redirect(route('competencyModels.index'));
        }

    
        $competencies = DB::table('competency')
                        ->where('status', 'public')
                        ->orWhere('status', '')
                        ->orWhere('status', null)
                        ->select(array('id','code','name'))
                        ->get();
        $items = array();

        foreach ($competencies as $competency) {
            $items[$competency->id] = $competency->code.' - '.$competency->name;
        }

        return view('competency__models.addcompetencies', compact('competencyModel','items', 'competencies'));
    }


    public function addCompetency(Request $request,$competencyModel_id){
        $competencyModel = Competency_Model::findOrFail($competencyModel_id);
    
        if($competencyModel->competencies()->where("competency_models_id",$competencyModel_id)->where("competency_id",$request["competency"])->get()->isEmpty()){
            $competencyModel->competencies()->attach($request["competency"]);
        }else{
            Flash::error('Competency already exist');
        }
        return redirect(route("add.competencies",$competencyModel_id));
    }

    public function destroy(Competency_Model $competencyModel, Competency $competency)
    {
        $competencyModel->competencies()->detach($competency->id);

        return back();
    }
}

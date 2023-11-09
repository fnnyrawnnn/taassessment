<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Imports\ParticipantImport;
use Auth;

class participantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_company = Auth::user()->company_id;
        if ($user_company == null) {
            $id = DB::table('user')->select("employee_id")->get();
        } else {
            $id = DB::table('user')->select("employee_id")->where('company_id', $user_company)->get();
        }
       
        return view("participant.index", compact("id"));
    }

    public function detail(Request $request)
    {

        $method = $request->method;

        $companyId = Auth::user()->company_id;
        if ($companyId == null) {
            $employeeIds = DB::table('user')->select("employee_id")->get();
        } else {
            $employeeIds = DB::table('user')->select("employee_id")->where('company_id', $companyId)->get();
        }

        if($method == "Manual")
        {
            // TODO: Refactor code on this if block
            $idassesse = $request->assesse;
            $idassessor = $request->assessor;

            $assesse = DB::table('user')->select('name', 'email')->where('employee_id', $idassesse)->first();
            $assessor = DB::table('user')->select('name', 'email')->where('employee_id', $idassessor)->first();

            $relation = $request->relation;
            $status = $request->status;
            $participants = "";

            return view("participant.detail", compact("assesse", "participants", "assessor", "relation", "status", "employeeIds", "method"));
        }
        else if($method == "Upload")
        {
            $file = $request->file;
            $participants = Excel::toArray(new ParticipantImport(), $file)[0];
            unset($participants[0]); // remove header row
            $participants = array_filter($participants, fn($data) => !in_array(null, $data, true)); // filter non-null rows
            
            $mappingParticipants = [];
            foreach ($participants as $dp) {
                $i = 0;
                if (array_key_exists($dp[5],  $mappingParticipants)) {
                    $i = count($mappingParticipants[$dp[5]]["assessor"]);
                }

                $mappingParticipants[$dp[5]]["assesse"]["name"] = $dp[0];
                $mappingParticipants[$dp[5]]["assesse"]["email"] = $dp[1];
                $mappingParticipants[$dp[5]]["assessor"][$i]["name"] = $dp[2];
                $mappingParticipants[$dp[5]]["assessor"][$i]["email"] = $dp[3];
                $mappingParticipants[$dp[5]]["assessor"][$i]["relationship"] = $dp[4];
                $mappingParticipants[$dp[5]]["status"] = "Yet to started";
            }

            return view("participant.detail", compact("mappingParticipants", "method", "employeeIds"));
        }
    }

    public function cari(Request $request)
    {
        $idassesse = $request->assesse;
        $idassessor = $request->assessor;

        $assesse = DB::table('user')->select('name', 'email', 'id')->where('employee_id', $idassesse)->first();
        $assessor = DB::table('user')->select('name', 'email')->where('employee_id', $idassessor)->first();

        return response()->json(compact("assesse", "assessor"));
    }

    public function cariId(Request $request)
    {
        $idassesse = $request->assesse;
        $idassessor = $request->assessor;

        $assesse = DB::table('user')->select('id')->where('name', $idassesse)->first();
        $assessor = DB::table('user')->select('id')->where('name', $idassessor)->first();

        return response()->json(compact("assesse", "assessor"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //
    }

    /**
     * Display the specified resource.s
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

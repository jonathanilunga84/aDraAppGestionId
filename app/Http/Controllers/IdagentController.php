<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Agent;

class IdagentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$listesAgents = Agent::orderBy('id', 'DESC')->get();//all();
        $listesAgents = Agent::orderBy('nom', 'ASC',)->orderBy('id','DESC')->get();
        //dd($listesAgents);
        //return view('dashboard', compact('listesAgents'));
        return view('Pages.admin', compact('listesAgents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            "nom"=>"required|min:2|max:100",  
            'sexe'=>'required',
            'IDagent'=>"required|min:2|max:100",
        ]);
        if ($validator->fails()) {
            //print_r("expression");
           return response()->json(['status'=>0, 'error'=>$validator->messages()]);
        }
        else{
            //print_r("validator ok");
            $data = [
                'nom' => $request->nom,
                'postnom' => $request->postnom,
                'prenom' => $request->prenom,
                'sexe'=>$request->sexe,
                'numcarteidentite' => $request->numCarteIdentite,
                'idagent' => $request->IDagent,
                'user_id'=> Auth()->user()->id
            ];
            //print_r($data);
            Agent::create($data);
            return response()->json(['status'=>1, 'messageSucces'=>'ID agent enregistrer avec success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        //findOrfail()
        $infoAgent = Agent::find($id); // avec find seulement on peu checker la response
        if ($infoAgent) {
            return response()->json(['status'=>1, 'donnes'=>$infoAgent]);
        }else{
            return response()->json(['status'=>0, 'error'=>"données nos trouvé"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = validator::make($request->all(),[
            "myId"=>"required",
            "nomModif"=>"required|min:2|max:100",  
            'sexeModif'=>'required',
            'IDagentModif'=>"required|min:2|max:100",
        ]);
        if ($validator->fails()) {
            //print_r("expression");
           return response()->json(['status'=>0, 'error'=>$validator->messages()]);
        }
        else{
            //print_r("validator ok");
            $data = [
                'nom' => $request->nomModif,
                'postnom' => $request->postnomModif,
                'prenom' => $request->prenomModif,
                'sexe'=>$request->sexeModif,
                'numcarteidentite' => $request->numCarteIdentiteModif,
                'idagent' => $request->IDagentModif,
                'user_id'=> Auth()->user()->id
            ];
            //print_r($data);
            $getAgent = Agent::findOrfail($request->myId)->update($data);
            return response()->json(['status'=>1, 'messageSucces'=>'ID agent Modifié avec success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $IdAgent = $id;
        $getAgent = Agent::findOrfail($IdAgent)->delete();
        // la variable $getAgent nous return true en cas de success 
        if ($getAgent) {
            return response()->json(['status'=>1, 'messageSucces'=>'Agent suppremer avec success!']);
        }else{
            return response()->json(['status'=>0, 'messageError'=>'Error']);
        }
        //dd($getAgent);
        //return back();
    }

    public function searche(Request $request){

        $req = $request->AgentSearch;
        $listesAgents = Agent::where("nom", 'like', '%'.$req.'%')
                                ->orWhere("postnom", 'like', '%'.$req.'%')
                                ->orWhere("prenom", 'like', '%'.$req.'%')
                                ->get();
        //dd($listesAgents);
        return view('Pages.admin', compact('listesAgents'));
    }
}

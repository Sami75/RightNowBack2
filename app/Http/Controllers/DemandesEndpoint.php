<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\QueryBuilder\QueryBuilder;
use App\User;
use App\Validation;

class DemandesEndpoint extends Controller 
{

	public function index()
    {

        $data = Demande::where('valide', '=', 1)->get();

        return response()->json([
            $data->toArray(),
        ]);
    }

    public function show(Demande $demande)
    {

        return response()->json([
            $demande->toArray(),
        ]);
    }

	public function store(Request $request)
    {
        $demande= new Demande([
            'intitule' => $request->intitule,
            'temps' => $request->temps,
            'prix' => $request->prix,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'user_id' => $request->userid,
        ]);

        $demande->save();

        $demande = Demande::find($demande->id);

        return response()->json([
            Demande::all()->toArray(),
            
        ]);

    }

    public function update(Request $request, Demande $demande)
    {

        $demande->update($request->all());
        $demande->saveOrFail();

        if (!$demande->id) {
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        $demande = Demande::find($demande->id);

        return response()->json([
            Demande::find($demande->id)->toArray(),
        ]);

    }

    public function destroy(Demande $demande)
    {
        
        $demande->delete();

        if(Demande::find($demande->id)) {
            return response()->json([
                "La demande n'a pas été supprimée",
            ]);
        } else {
            return response()->json([
                "La demande a bien été supprimée",
            ]);
        }
    }

    public function UserAcceptDemande(Demande $demande) {

        $validation = Validation::where('demande_id', '=', $demande->id)->firstOrFail();
        $user = User::find($validation->jobbeur_id);

        if(isset($user)) {
            return response()->json([
                $user->toArray(),
            ]);
        } else {
            return response()->json([
                "User not found",
            ]);
        }
    }
    
}


<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\QueryBuilder\QueryBuilder;


class DemandesEndpoint extends Controller 
{

	public function index()
    {

        $data = Demande::all();

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
            
        ]);

        $demande->save();

        $demande = Demande::find($demande->id);

        return response()->json([
            Demande::all()->toArray(),
            
        ]);

    }

    public function update(Request $request,Demande $demande)
    {
/*        $user->fillFromRequest();
        $user->saveOrFail();

        if (!$user->id) {
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        $user = User::find($user->id);

        return response()->json([
            'data' => User::find($user->id)->toArray(),
        ]);*/
    }

    public function destroy(Demande $demande)
    {

        $demande->delete();

        return abort(Response::HTTP_NO_CONTENT);
    }

    
}


<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\QueryBuilder\QueryBuilder;


class UsersEndpoint extends Controller 
{

	public function index()
    {

        $data = User::all();

        return response()->json([

            $data->toArray(),

        ]);
    }

    public function show(User $user)
    {

        return response()->json([
            $user->toArray(),
        ]);
    }

	public function store(Request $request)
    {
        $user = new User([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'mail' => $request->mail,
            'password' => $request->password,
            'adresse' => $request->adresse,
            'cdp' => $request->cdp,
            'ville' => $request->ville,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
        ]);

        $user->save();

        $user = User::find($user->id);

        return response()->json([
            User::all()->toArray(),
        ]);

    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->saveOrFail();

        if (!$user->id) {
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            User::find($user->id)->toArray(),
        ]);
    }

    public function destroy(User $user)
    {

        $user->delete();

        return abort(Response::HTTP_NO_CONTENT);
    }

    public function login(Request $request) {

        $user = User::where('mail', $request->mail)->first();
        
        if(isset($user)) {
            if($user->password == $request->password) {
                return response()->json([
                    $user->toArray(),
                ]);
            } else {
                return response()->json('Wrong password or mail');
            }
        } else {    
            return response()->json('Wrong password or mail');

        }

    }
}


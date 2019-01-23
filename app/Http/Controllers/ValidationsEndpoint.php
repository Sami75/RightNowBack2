<?php

namespace App\Http\Controllers;

use App\Validation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\QueryBuilder\QueryBuilder;


class ValidationsEndpoint extends Controller 
{

	public function index()
    {

        $data = Validation::all();

        return response()->json([

            $data->toArray(),

        ]);
    }

    public function show(Validation $validation)
    {

        return response()->json([
            $validation->toArray(),
        ]);
    }

	public function store(Request $request)
    {
        $validation = new Validation([
            'status' => 0,
        ]);

        $validation->save();

        $validation = Validation::find($validation->id);

        return response()->json([
            Validation::all()->toArray(),
        ]);

    }

    public function update(Request $request, Validation $validation)
    {
/*        $validation->fillFromRequest();
        $validation->saveOrFail();

        if (!$validation->id) {
            return abort(Response::HTTP_INTERNAL_SERVER_ERROR);
        }


        $validation = Validation::find($validation->id);

        return response()->json([
            'data' => Validation::find($validation->id)->toArray(),
        ]);*/
    }

    public function destroy(Validation $validation)
    {

        $validation->delete();

        return abort(Response::HTTP_NO_CONTENT);
    }

}


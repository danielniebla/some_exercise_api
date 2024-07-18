<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\Exercise;
use Illuminate\support\Facades\Validator;

class exerciseController extends Controller
{
    public function get() 
    {
        $students = Exercise::all();

        if($students->isEmpty()){
            $data =[
                'menssage' =>'no se encontraron ejercicios registrados',
                'status' => '200'
            ];
            return response()->json($data,200);
        }

        return response()->json($students, 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:255',
            'weight' => 'required|digits:3',
            'kgs' => 'required|boolean',
            'description' => 'max:1000',
            'reps' => 'required|max:255'
        ]);
        if($validator -> fails()) {
            $data = [
                'menssage' =>'Error faltan datos minimos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
            $excercise = Exercise::Create([
                'name' => $request->name,
                'weight' => $request->weight,
                'kgs' => $request->kgs,
                'description' => $request->description,
                'reps' => $request->reps
            ]);
            if(!$excercise)
            {
                $data = [
                    'mesage' =>'Error al crear ejercicio',
                    'status' => 500
                ];
                return response()->json($data, 500);
            }
            $data = [
                'mesage' =>'Ejercicio creado exitosamente',
                'status' => 201
            ];
            return response()->json($data, 201);
        

    }
    
    public function del($id)
    {
        $excercise =Exercise::find($id);

        if(!$excercise){
            $data =[
                'menssage' =>'Ejercicio no encontrado',
                'status' => '404'
            ];
            return response()->json($data,404);
        }

        $excercise->delete();
        $data =[
            'menssage' =>'Ejercicio eliminado',
            'status' => '200'
        ];
        return response()->json($data,200);

    }
    public function up(Request $request,$id)
    {
        $excercise =Exercise::find($id);

        if(!$excercise){
            $data =[
                'menssage' =>'Ejercicio no encontrado',
                'status' => '404'
            ];
            return response()->json($data,404);
        }

        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:255',
            'weight' => 'required|digits:3',
            'kgs' => 'required|boolean',
            'description' => 'max:1000',
            'reps' => 'required|max:255'
        ]);
        if($validator -> fails()) {
            $data = [
                'menssage' =>'Error faltan datos minimos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        $excercise->name = $request->name;
        $excercise->weight = $request->weight;
        $excercise->kgs = $request->kgs;
        $excercise->description = $request->description;
        $excercise->reps = $request->reps;
        $excercise->save();
        $data =[
            'menssage' =>'Ejercicio actualizado',
            'status' => '200'
        ];
        return response()->json($data,200);
    }

}

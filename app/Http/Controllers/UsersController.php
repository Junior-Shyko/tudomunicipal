<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UsersController extends Controller
{
    /**
     * Metodo Inicial
     */
    public function index()
    {
        $state = DB::table('state')->get();
        DB::enableQueryLog();
        $user = DB::table('users as u1')
            ->join('city as cid', 'u1.city_id', '=', 'cid.id')
            ->join('state as sta', 'u1.state_id', '=', 'sta.id')
            ->select('u1.name as username', 'u1.*', 'cid.name as nameCity' , 'sta.name as nameState', 'cid.*' , 'sta.*', 'u1.id as idUser')
            ->get();
        
        return view('user.index', compact('state' , 'user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //SE TIVER ALGUM VALOR NO CAMPO ALTERA O FORMATO DA DATA
        if(!empty($request['birth'])){
            $request['birth'] = User::DataBRtoMySQL($request['birth']);
        }else{
            unset($request['birth']);
        }        
        try {
            User::create($request->all());
            return response()->json(['message' => 'success'] , 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Error: '.$th->getMessage()] , 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = DB::table('state')->get();
        //JUNTANDO AS TRES TABELAS
        $user = DB::table('users as u1')
        ->join('city as cid', 'u1.city_id', '=', 'cid.id')
        ->join('state as sta', 'u1.state_id', '=', 'sta.id')
        ->select('u1.name as username', 'u1.*', 'cid.name as nameCity' , 'sta.name as nameState', 'cid.*' , 'sta.*', 'u1.id as idUser')
        ->where('u1.id' , $id)
        ->first();
        return view('user.edit', compact('state' , 'user'));
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
        $input = $request->all();
        $input = $request->except('_token', '_method');//retirando os campos        
        try {
            User::where('id' , $id)->update($input);
            return redirect('usuario')->with(['success'=>'Usuário Alterado com sucesso']);
        } catch (\Throwable $th) {
            return redirect('usuario')->with(['error'=>'Ocorreu um erro']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            User::where('id', $request['id'])->delete();
            return back()->with(['success' => 'Usuário Excluido com sucesso']);
        } catch (\Throwable $th) {
            return back()->with(['error' => 'error: '. $th->getMessage()]);
        }
    }

    public function getCity($id)
    {
        //PESQUISANDO TODAS AS CIDADES QUE TENHA O ID DO ESTADO
       $city = DB::table('city')->where('state_id', $id)->get();
       return response()->json($city);
    }
}

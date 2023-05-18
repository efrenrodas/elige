<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use App\Models\Curso;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

/**
 * Class CodigoController
 * @package App\Http\Controllers
 */
class CodigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codigos = Codigo::paginate();

        return view('codigo.index', compact('codigos'))
            ->with('i', (request()->input('page', 1) - 1) * $codigos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codigo = new Codigo();
        $cursos=Curso::pluck('nombre','id');
        return view('codigo.create', compact('codigo','cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      #  request()->validate(Codigo::$rules);
    
       

        $idCurso=$request['id_curso'];
        $curso=Curso::find($idCurso);

        $client=new Client();
        $respuesta=$client->get("https://sanisidro.edu.ec/api2/?op=codigos&idCarrera=$curso->codigoExterno");
        $data = $respuesta->getBody()->getContents();
        foreach (json_decode($data) as $codigo) {
            # code...
            $request['codigo']=Str::random(5);
            $request['idEstudiante']=$codigo->IdEstudiante;

            $code = Codigo::create($request->all());
        }
       

        for ($i=1;$i<$curso->cantidad;$i++) {
           
        }
      

        return redirect()->route('codigos.index')
            ->with('success', 'Codigo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codigo = Codigo::find($id);

        return view('codigo.show', compact('codigo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $codigo = Codigo::find($id);
        $cursos=Curso::pluck('nombre','id');
        return view('codigo.edit', compact('codigo','cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Codigo $codigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codigo $codigo)
    {
     ///   return response()->json($request);
        request()->validate(Codigo::$rules);

        $codigo->update($request->all());

        return redirect()->route('codigos.index')
            ->with('success', 'Codigo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $codigo = Codigo::find($id)->delete();

        return redirect()->route('codigos.index')
            ->with('success', 'Codigo deleted successfully');
    }
    public function validar(Request $request)
    {
        
        $cod=$request['codigo'];
        $codigo=Codigo::where('codigo','=',$cod)->first();
        $listas=Lista::all();
        if (isset($codigo)) {
            #verificar estado
            // if ($codigo->estado=='1') {
               return view('Votar', compact('codigo','listas'));
            // }
            #return response()->json($resul);
        }else{
          return view('404');
        }
       
        # code...
    }
    public function codigos(Request $request)
    {
       $idEstudiante=$request['idEstudiante'];
       $codigo=Codigo::where('idEstudiante','=',$idEstudiante)->first();
       $codigo->estado='2';
       $codigo->save();
       return response()->json($codigo);
    }
}

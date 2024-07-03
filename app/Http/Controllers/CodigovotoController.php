<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use App\Models\Codigovoto;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class CodigovotoController
 * @package App\Http\Controllers
 */
class CodigovotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codigovotos = Codigovoto::paginate();

        return view('codigovoto.index', compact('codigovotos'))
            ->with('i', (request()->input('page', 1) - 1) * $codigovotos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codigovoto = new Codigovoto();
        return view('codigovoto.create', compact('codigovoto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Codigovoto::$rules);
        $id_cod=$request['id_codigo'];
        $codigo=Codigo::find($id_cod);
        if ($codigo->estado<3) {
            $codigovoto = Codigovoto::create($request->all()); 
        }
        
        $codigo->estado='3';//1 creado, 2 leido, 3 votado
        $codigo->save();

      

        // return redirect()->route('codigovotos.index')
        //     ->with('success', 'Codigovoto created successfully.');
        return response()->json($codigovoto,'200');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codigovoto = Codigovoto::find($id);

        return view('codigovoto.show', compact('codigovoto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $codigovoto = Codigovoto::find($id);

        return view('codigovoto.edit', compact('codigovoto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Codigovoto $codigovoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codigovoto $codigovoto)
    {
        request()->validate(Codigovoto::$rules);

        $codigovoto->update($request->all());

        return redirect()->route('codigovotos.index')
            ->with('success', 'Codigovoto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $codigovoto = Codigovoto::find($id)->delete();

        return redirect()->route('codigovotos.index')
            ->with('success', 'Codigovoto deleted successfully');
    }
   public function cierreJunta() {
    $user=Auth()->user();
    $listas=Lista::all();
    switch ($user->rol) {
        case 'diurna':
            foreach ($listas as $lista) {
                $lista['votos']=$lista->codigovoto->where('created_at','>','2023-06-16 09:00:00')->where('created_at','<','2023-06-16 13:00:00')->count();
            }
            $horario="2023-06-16 09:00:00 - 2023-06-16 13:00:00";
            break;
        case 'nocturna':
            foreach ($listas as $lista) {
                $lista['votos']=$lista->codigovoto->where('created_at','>','2023-06-16 18:00:00')->where('created_at','<','2023-06-16 20:30:00')->count();
            }
            $horario="2023-06-16 18:00:00 - 2023-06-16 20:30:00";
            break;
        case 'sabado':
            foreach ($listas as $lista) {
                $lista['votos']=$lista->codigovoto->where('created_at','>','2023-06-17 08:00:00')->where('created_at','<','2023-06-17 09:00:00')->count();
            }
            $horario="2023-06-17 08:00:00 - 2023-06-17 09:00:00";
            break;
        case 'admin':
                foreach ($listas as $lista) {
                    $lista['votos']=$lista->codigovoto->count();
                }
                $horario="GENERAL";  
            break;
        
        default:
            foreach ($listas as $lista) {
                $lista['votos']=$lista->codigovoto->count();
            }
            $horario='todos';
            break;
    }
  #  return response()->json($listas);
  return view('codigovoto.show',compact('listas','horario'));
   }
}

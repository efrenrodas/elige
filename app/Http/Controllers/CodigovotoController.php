<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use App\Models\Codigovoto;
use Illuminate\Http\Request;

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
        $codigo->estado='2';
        $codigo->save();

        $codigovoto = Codigovoto::create($request->all());

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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inalambrica;
use App\Models\Location;

class InalambricaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-inalambrica|crear-inalambrica|editar-inalambrica|borrar-inalambrica', ['only'=>['index','store']]);
        $this->middleware('permission:crear-inalambrica', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-inalambrica', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-inalambrica', ['only'=>['destroy']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $inalambricas = Inalambrica::where('ip','LIKE','%'.$busqueda.'%')
                    ->orWhere('router','LIKE','%'.$busqueda.'%')
                    ->orWhere('conexion','LIKE','%'.$busqueda.'%')
                    ->orWhere('ssid','LIKE','%'.$busqueda.'%')
                    ->orWhere('frecuencia','LIKE','%'.$busqueda.'%')
                    ->orWhere('ancho_de_canal','LIKE','%'.$busqueda.'%')
                    ->orWhere('modelo','LIKE','%'.$busqueda.'%')
                    ->orWhere('lugar','LIKE','%'.$busqueda.'%')
                    ->orWhere('switch','LIKE','%'.$busqueda.'%')
                    ->orWhere('puerto','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(10);
        return view('inalambricas.index', compact('inalambricas', 'busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inalambricas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'ip' => 'required',
            'router' => 'required',
            'conexion' => 'required',
            'ssid' => 'required',
            'frecuencia' => 'required',
            'ancho_de_canal' => 'required',
            'modelo' => 'required',
            'lugar' => 'required',
            'switch' => 'required',
            'puerto' => 'required'
        ]);

        //Inalambrica::create($request->all());
       // return redirect()->route('inalambricas.index');
        $location = Inalambrica::create($request->all());
        return redirect()->route('getInalambrica', $location->location_id);
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
    public function edit(Inalambrica $inalambrica)
    {
        return view('inalambricas.editar', compact('inalambrica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inalambrica $inalambrica)
    {
        request()->validate([
            'ip' => 'required',
            'router' => 'required',
            'conexion' => 'required',
            'ssid' => 'required',
            'frecuencia' => 'required',
            'ancho_de_canal' => 'required',
            'modelo' => 'required',
            'lugar' => 'required',
            'switch' => 'required',
            'puerto' => 'required'
        ]);

        //$inalambrica->update($request->all());
        //return redirect()->route('inalambricas.index');

        $inalambrica->update($request->all());
        return redirect()->route('getInalambrica',$inalambrica->location_id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$inalambrica->delete();
        //return redirect()->route('inalambricas.index');

        $location = Location::where('id',$id)->first();
        $inalambrica = Inalambrica::where('id', $id)->first();
        $inalambrica->delete();
        return redirect()->route('getInalambrica', $inalambrica->location_id);

        
    }

    public function getInalambricaByLocation($id)
    {
        $location = Location::where('id',$id)->first();
        $inalambricas = Inalambrica::where('location_id',$id)->paginate(5);
        return view('inalambricas.index', compact('inalambricas','location'));
    }

    public function createInalambricaByLocation($id)
    {
        $location = Location::where('id', $id)->first();
        return view('inalambricas.crear', compact('location'));
    }
}

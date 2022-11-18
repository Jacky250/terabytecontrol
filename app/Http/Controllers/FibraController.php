<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fibra;
use App\Models\Location;

class FibraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-fibra|crear-fibra|editar-fibra|borrar-fibra', ['only'=>['index','store']]);
        $this->middleware('permission:crear-fibra', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-fibra', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-fibra', ['only'=>['destroy']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $fibras = Fibra::where('switch','LIKE','%'.$busqueda.'%')
                    ->orWhere('router','LIKE','%'.$busqueda.'%')
                    ->orWhere('equipo','LIKE','%'.$busqueda.'%')
                    ->orWhere('modelo','LIKE','%'.$busqueda.'%')
                    ->orWhere('olt','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(10);

        //$fibras = Fibra::get()->paginacion(10);
        return view('fibras.index', compact('fibras', 'busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $location = Location::where('id',$id)->first();
        return view('fibras.crear', compact('location'));
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
            'switch' => 'required',
            'router' => 'required',
            'equipo' => 'required',
            'modelo' => 'required',
            'olt' => 'required',
            'location_id' => 'required'
            
        ]);

        $location = Fibra::create($request->all());
        return redirect()->route('getFiber', $location->location_id);
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
    public function edit(Fibra $fibra)
    {
        return view('fibras.editar', compact('fibra'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fibra $fibra)
    {
        request()->validate([
            'switch' => 'required',
            'router' => 'required',
            'equipo' => 'required',
            'modelo' => 'required',
            'olt' => 'required'
        ]);

        $fibra->update($request->all());
        return redirect()->route('getFiber',$fibra->location_id);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::where('id',$id)->first();
        $fibra = Fibra::where('id', $id)->first();
        $fibra->delete();
        return redirect()->route('getFiber', $fibra->location_id);

    }

    public function getFiberByLocation($id)
    {
        $location = Location::where('id',$id)->first();
        $fibras = Fibra::where('location_id',$id)->paginate(5);
        return view('fibras.index', compact('fibras','location'));
    }

    public function createFyberByLocation($id)
    {
        $location = Location::where('id', $id)->first();
        return view('fibras.crear', compact('location'));
    }

    public function editFyberByLocation($id)
    {
        $location = Location::where('id', $id)->first();
        return view('fibras.editar', compact('location'));
    }
    
}

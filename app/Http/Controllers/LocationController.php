<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Fibra;
use App\Models\Inalambrica;
//use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-local|crear-local|editar-local|borrar-local', ['only'=>['index','store']]);
        $this->middleware('permission:crear-local', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-local', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-local', ['only'=>['destroy']]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $locations = Location::where('address','LIKE','%'.$busqueda.'%')
                    ->orWhere('name','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(10);
    
       
        return view('locations.index', compact('locations','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.crear');
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
            'address' => 'required',
            'name' => 'required'
        ]);

        Location::create($request->all());
        return redirect()->route('locations.index');
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
    public function edit(Location $location)
    {
        return view('locations.editar', compact('location'));

        //$user = User::find($id);
        //$roles = Role::pluck('name', 'name')->all();
        //$userRole = $user->roles->pluck('name', 'name')->all();

       // return view('usuarios.editar', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        request()->validate([
            'address' => 'required',
            'name' => 'required'
        ]);

        $location->update($request->all());
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::where('id', $id)->first();
        $fibra = Fibra::where('location_id', $id);
        $inalambrica = Inalambrica::where('location_id', $id);
        $inalambrica->delete();
        $fibra->delete();
        $location->delete();
        return redirect()->route('locations.index');
    }
}

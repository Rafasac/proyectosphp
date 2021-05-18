<?php

namespace App\Http\Controllers;
use App\Proyecto;

use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    //
    public function index()
    {
        $proyectos = Proyecto::paginate();
        return view('welcome', compact('proyectos'))->with('i', (request()->input('page', 1) - 1) * $proyectos->perPage());

        //return view('proyecto.index', compact('proyectos'))
        //->with('i', (request()->input('page', 1) - 1) * $proyectos->perPage());
    }
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);

        return view('proyecto.edit', compact('proyecto'));
    }
    public function show($id)
    {
        $proyecto = Proyecto::find($id);

        return view('proyecto.show', compact('proyecto'));
    }
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id)->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto borrado satisfactoriamente.');
    }
    public function create()
    {
        $proyecto = new Proyecto();
        return view('proyecto.create', compact('proyecto'));
    }
    public function store(Request $request)
    {
        request()->validate(Proyecto::$rules);

        $proyecto = Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto creado satisfactoriamente.');
    }
}

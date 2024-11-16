<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\MetodoDePago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MetodoDePagoController extends Controller
{
    public function __construct()
    {
        // Usamos el método handle() directamente para verificar autenticación y rol.
        $this->handle();
    }

    public function index()
    {
        $a = "LLegas a la funcion";
        Log::emergency($a);
        Log::alert($a);
        Log::critical($a);
        Log::error($a);                 
        Log::warning($a);
        Log::notice($a);
        Log::info($a);
        Log::debug($a);

        $metodos = MetodoDePago::all();
        return view('metodos_de_pago.index', compact('metodos'));
    }

    public function create()
    {
        return view('metodos_de_pago.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'tipo' => 'nullable|string|max:50',
            'activo' => 'required|boolean',
            'comision' => 'nullable|numeric|min:0|max:100',
        ]);

        MetodoDePago::create($request->all());
        return redirect()->route('metodos_de_pago.index')->with('success', 'Método de pago creado exitosamente.');
    }
    public function show($id)
    {
        $metodoDePago = MetodoDePago::findOrFail($id); // Obtén el método de pago por ID
        return view('metodos_de_pago.show', compact('metodoDePago')); // Pasa la variable a la vista
    }

    public function edit($id)
{
    $metodo = MetodoDePago::findOrFail($id); // Busca el método de pago por ID
    return view('metodos_de_pago.edit', compact('metodo')); // Pasa el objeto a la vista
}


    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'tipo' => 'required|string',
        'activo' => 'boolean',
        'comision' => 'nullable|numeric|min:0',
    ]);

    $metodoDePago = MetodoDePago::findOrFail($id);
    $metodoDePago->update($request->all());

    return redirect()->route('metodos_de_pago.index')->with('success', 'Método de Pago actualizado correctamente.');
}


public function destroy($id)
{
    $metodoDePago = MetodoDePago::findOrFail($id); // Busca el método de pago por ID
    $metodoDePago->delete(); // Elimina el registro

    return redirect()->route('metodos_de_pago.index')->with('success', 'Método de Pago eliminado correctamente.');
}
// Método handle para controlar acceso según rol
protected function handle()
{
    // Verificar si el usuario está autenticado y tiene el rol de 'admin'
    if (!Auth::check() || Auth::user()->role !== 'admin' || Auth::user()->role !== 'user') {
        return redirect('home'); // Redirigir si no es admin o no está autenticado
    }
}
}

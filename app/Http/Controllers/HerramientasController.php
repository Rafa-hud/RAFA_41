<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HerramientasController extends Controller
{
    public function __construct()
    {
        // Usamos el método handle() directamente para verificar autenticación y rol.
        $this->handle();
    }

    // Mostrar lista de herramientas
    public function index()
    {
        $herramientas = Herramienta::paginate(10);
        return view('herramientas.index', compact('herramientas'));
    }

    // Mostrar formulario para crear herramienta
    public function create()
    {
        return view('herramientas.create');
    }

    // Guardar una nueva herramienta en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable',
            'cantidad' => 'required|integer|min:0',
            'disponible' => 'required|boolean',
        ]);

        Herramienta::create($request->all());

        return redirect()->route('herramientas.index')->with('success', 'Herramienta creada con éxito');
    }

  

    // Mostrar formulario para editar herramienta
    public function edit($id)
    {
        // Busca la herramienta usando el id, sin especificar id_herramienta
        $herramienta = Herramienta::findOrFail($id);
        
        return view('herramientas.edit', compact('herramienta'));
    }

    // Actualizar herramienta en la base de datos
    public function update(Request $request, Herramienta $herramienta)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500',
            'cantidad' => 'required|integer|min:1',
            'disponible' => 'boolean',
        ]);
    
        $herramienta->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'disponible' => $request->has('disponible'),  // Si el checkbox está marcado, se guarda como true
        ]);
    
        return redirect()->route('herramientas.index')->with('success', 'Herramienta actualizada correctamente.');
    }

    // Eliminar herramienta de la base de datos
    public function destroy(Herramienta $herramienta)
    {
        $herramienta->delete();

        return redirect()->route('herramientas.index')->with('success', 'Herramienta eliminada con éxito');
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

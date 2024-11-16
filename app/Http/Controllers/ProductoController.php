<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use App\Models\Producto;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct()
    {
        // Usamos el método handle() directamente para verificar autenticación y rol.
        $this->handle();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $a = "LLegas a la funcion";
        Log::emergency($a);
        Log::alert(message: $a);
        Log::critical($a);
        Log::error($a);                 
        Log::warning($a);
        Log::notice($a);
        Log::info($a);
        Log::debug($a);
        $productos = Producto::paginate(5);

        return view('productos.index', compact('productos'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
        {
            return view('productos.create');
        }
    
    
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'string'
        ]);
    
        Producto::create($request->all());
    
        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'string'
        ]);
    
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
    
        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $producto = Producto::findOrFail($id);
    $producto->delete();

    return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
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

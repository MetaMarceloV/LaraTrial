<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::paginate(10);


        // Devuelve una vista o una respuesta con los productos
        return Inertia::render('Productos/Index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all();

        // Pass categories to the ProductCreate component
        return Inertia::render('Productos/Create', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|min:4|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);

        // Store the product
        $product = new Product([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);

        $product->save();

        // Redirect or respond as needed
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $producto)
    {
        $categorias = Category::all();

        // Pass categories to the ProductCreate component
        return Inertia::render('Productos/Show', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|min:4|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);

        // Update the product
        $product->update([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            // Update other fields as needed
        ]);


        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $producto)
    {
        $producto->delete(); // This will delete the product from the database
        return redirect()->route('productos.index')
            ->with('success', 'Producto borrado exitosamente');
    }
}

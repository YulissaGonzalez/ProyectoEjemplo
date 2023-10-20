<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TrainerController;
use Illuminate\Http\Request;
use App\Models\Trainer;
use Illuminate\Support\Facades\Storage;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view( 'index', compact( 'trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'apellido' => 'required|string',
        'avatar' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
    ]);

    if ($request->hasFile('avatar')) {
        $imageName = time() . '.' . $request->avatar->extension(); // Cambiar "$request->image" a "$request->avatar"
        $request->avatar->move(public_path('avatar'), $imageName);

        // Crear una instancia del modelo Trainer y asignar propiedades
        $trainer = new Trainer();
        $trainer->name = $request->input('name');
        $trainer->apellido = $request->input('apellido');
        $trainer->avatar = $imageName; // Guardar el nombre de la imagen en el modelo
        $trainer->save();
    }

    return redirect()->route('trainers.index')->with('success', 'Entrenador creado con éxito.');
}

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        //return 'tengo que regresar el id';
        //return view("show");
        return view('show', compact('trainer'));
        //return $trainer;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        //return $trainer;
        return view('edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'name' => 'required|string',
            'apellido' => 'required|string',
            'avatar' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048', // Asegúrate de que 'avatar' sea un campo opcional
        ]);
    
        if ($request->hasFile('avatar')) {
            // Guardar la nueva imagen
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            
            // Borrar la imagen anterior si existe
            $imagePath = public_path('avatar/' . $trainer->avatar);
    
            // Actualizar la ruta de la imagen en la base de datos
            $trainer->update([
                'name' => $request->input('name'),
                'apellido' => $request->input('apellido'),
                'avatar' => $avatarPath,
            ]);
        } else {
            // Si no se subió una nueva imagen, solo actualizar los otros campos
            $trainer->update([
                'name' => $request->input('name'),
                'apellido' => $request->input('apellido'),
            ]);
        }
    
        return redirect()->route('trainers.show', ['trainer' => $trainer])->with('success', 'Entrenador actualizado con éxito.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $trainer = Trainer::find($id);

    if ($trainer) {
        $imagePath = public_path('avatar/' . $trainer->image);
        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath); // Eliminar el archivo de la imagen
        }

        $trainer->delete();
        return redirect("/trainers");
    }
}



}


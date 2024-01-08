<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    //
    public function store(Request $request)
    {
    
    
       
        $input = [
            'contenuposts' => $request->input('contenuposts'),
            'user_id' => Auth::id(),
        ];
        // Vérifiez si un fichier a été téléchargé
        if ($request->hasFile('urlphoto')) {
            // Spécifiez le chemin de destination pour le fichier téléchargé
            $destination_path = 'public/images/urlphoto';

            // Obtenez le fichier téléchargé
            $urlphoto = $request->file('urlphoto');

            // Obtenez un nom unique pour le fichier
            $urlphoto_name = uniqid() . '_' . $urlphoto->getClientOriginalName();

            // Stockez le fichier dans le dossier de destination avec le nom d'origine
            $path = $urlphoto->storeAs($destination_path, $urlphoto_name);

            // Mettez à jour l'attribut 'urlphoto' de l'utilisateur avec le chemin relatif
            $input['urlphoto'] = 'storage/' . $destination_path . '/' . $urlphoto_name;
        }

        // dd($input);
       Publication::create($input);
  
        return redirect()->route('welcome');
    }
}

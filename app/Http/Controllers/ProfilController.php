<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    //
    public function modifier_profil(Request $request)
    {
        $utilisateur = Auth::user();
    
        if ($utilisateur) {
            // Validez les champs si nécessaire
            // $request->validate([
            //     'skils' => 'required',
            //     'notes' => 'required',
            //     'location' => 'required',
            // ]);
    
            // Créez le tableau $input avec les données du formulaire
            $input = [
                'skils' => $request->input('skils'),
                'notes' => $request->input('notes'),
                'location' => $request->input('location'),
            ];
    
            // Vérifiez si un fichier a été téléchargé
            if ($request->hasFile('url_profil')) {
                // Spécifiez le chemin de destination pour le fichier téléchargé
                $destination_path = 'public/images/url_profil';
    
                // Obtenez le fichier téléchargé
                $url_profil = $request->file('url_profil');
    
                // Obtenez un nom unique pour le fichier
                $url_profil_name = uniqid() . '_' . $url_profil->getClientOriginalName();
    
                // Stockez le fichier dans le dossier de destination avec le nom d'origine
                $path = $url_profil->storeAs($destination_path, $url_profil_name);
    
                // Mettez à jour l'attribut 'url_profil' de l'utilisateur avec le chemin relatif
                $input['url_profil'] = 'storage/' . $destination_path . '/' . $url_profil_name;
            }
    
            // Mettez à jour l'utilisateur avec les données du formulaire
            $utilisateur->update($input);
        }
    
        return redirect()->route('profil');
    }


    public function detail_profil(User $det_profil)
    {

        $det_profil=User::where("user_id", Auth::id())->get();

        return view('profil',compact('det_profil'));
    }

}

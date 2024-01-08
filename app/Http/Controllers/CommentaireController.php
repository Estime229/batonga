<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    //

    public function storeComment(Request $request)
    {
        // Validez les champs du formulaire
        $request->validate([
            'contenucomments' => 'required',
        ]);
    
        // Récupérez l'utilisateur connecté
        $user = Auth::user();
    
        // Récupérez la publication associée au commentaire
        $publicationId = $request->input('publication_id');
        $publication = Publication::findOrFail($publicationId);
    
        // Créez un nouveau commentaire et liez-le à la publication et à l'utilisateur
        $comment = new Commentaire([
            'user_id' => $user->id,
            'contenucomments' => $request->input('contenucomments'),
        ]);
    
        // Ajoutez le commentaire à la publication
        $publication->commentaires()->save($comment);
        
    // Supposons que $publication soit l'instance de la publication pour laquelle vous voulez récupérer le nombre de commentaires
// $nombreDeCommentaires = $publication->comments->count();

        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Command;
use App\Models\Produit;
use App\Models\Supplement;
use App\Models\Client;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function tentifier(Request $request)
    {
        $pers = Client::where('nom', $request->nom)->first();
        if ($pers->password == $request->password) {
            return response()->json([
                'id' => $pers->id,
                'message' => 'valide'
            ]);
        }
    }
    public function retour()
    {
        $retours = Command::where('etat',0)->get();
        return response()->json(
            [
                'utilisateur' => $retours,
                'messages' => 'tous est parfait',
                'code' => 200
            ]
        );
    }

    public function retour2()
    {
        $retours = Command::where('etat',1)->get();
        return response()->json(
            [
                'utilisateur' => $retours,
                'messages' => 'tous est parfait',
                'code' => 200
            ]
        );
    }

    public function commandcli($id)
    {
        $retours = Command::where('client_id', $id)
        ->where('etat',0)
        ->get();
        return response()->json(
            [
                'utilisateur' => $retours,
                'messages' => 'tous est parfait',
                'code' => 200
            ]
        );
    }

    public function nombre($id)
    {
        $retours = Command::where('client_id', $id)->count();
        return response()->json(
            [
                'utilisateur' => $retours,
                'messages' => 'tous est parfait',
                'code' => 200
            ]
        );
    }


    public function chose()
    {
        $test = Produit::all();
        return response()->json(
            [
                'produit' => $test,
            ]
        );
    }

    public function trouver($id)
    {
        $trouve = Produit::find($id);
        if ($trouve) {
            return response()->json(
                [
                    'produit' => $trouve
                ]
            );
        }
    }

    public function enregistrer(Request $request)
    {
        $enregistre = new Command();
        $enregistre->designation = $request->designation;
        $enregistre->nombre = $request->nombre;
        $enregistre->prix_unitaire = $request->prix_unitaire;
        $enregistre->total = $request->total;
        $enregistre->client_id = $request->client_id;

        $enregistre->save();

        if ($enregistre) {
            return response()->json(
                [
                    'message' => "insertion reussi"
                ]
            );
        }
    }

    public function testRelation($id)
    {
        $sup = Produit::find($id);
        $nom = $sup->nom;
        return response()->json([
            'nom' => $nom,
            'supplements' => $sup->categories,
            'messages' => 'voici votre supplement'
        ]);
    }

    public function Trouvecategorie($id)
    {
        $sup = Categorie::find($id);
        return response()->json(
            [
                'prix' => $sup->prix,
                'nom_test' => $sup->nom_categorie,
                'supplements' => $sup->supplements,
                'messages' => 'voici vos supplements'
            ]
        );
    }

    public function Adduser(Request $request)
    {
        $nouveau = new Client();
        $nouveau->nom = $request->nom;
        $nouveau->password = $request->password;
        $nouveau->adresse = $request->adresse;

        $nouveau->save();

        if ($nouveau) {
            return response()->json([
                'message' => 'insertion reussi'
            ]);
        }
    }

    public function ajoutProduit(Request $request)
    {
        $nouveau = new Produit();
        $nouveau->nom = $request->nom;
        $nouveau->save();

        if ($nouveau) {
            return response()->json([
                'message' => 'insertion reussi'
            ]);
        }
    }

    public function addsous(Request $request)
    {
        $nouveau = new Categorie();
        $nouveau->nom_categorie = "$request->nom";
        $nouveau->prix = $request->prix;
        $nouveau->produit_id = $request->produit_id;
        $nouveau->save();
        if ($nouveau) {
            return response()->json([
                'message' => 'insertion reussi'
            ]);
        }
    }

    public function addsup(Request $request)
    {
        $nouveau = new Supplement();
        $nouveau->nom_supplement = "$request->nom";
        $nouveau->prix = $request->prix;
        $nouveau->categorie_id = $request->categorie_id;
        $nouveau->save();
        if ($nouveau) {
            return response()->json([
                'message' => 'insertion reussi'
            ]);
        }
    }

    public function deleteprod($id)
    {
        $del = Produit::find($id);
        $del->delete();
        if ($del) {
            return response()->json([
                'message' => 'effacé avec success'
            ]);
        }
    }

    public function deletesup($id)
    {
        $del = Supplement::find($id);
        $del->delete();
        if ($del) {
            return response()->json([
                'message' => 'effacé avec success'
            ]);
        }
    }

    public function deletesous($id)
    {
        $del = Categorie::find($id);
        $del->delete();
        if ($del) {
            return response()->json([
                'message' => 'effacé avec success'
            ]);
        }
    }

    public function Annuler($id)
    {
        $del = Command::find($id);
        $del->delete();
        if ($del) {
            return response()->json([
                'message' => 'effacé avec success'
            ]);
        }
    }

    public function modifier($id)
    {
        $com = Command::findOrFail($id);
        if ($com->choix == 'prendre') {
            $com->update([
                'choix' => 'livrer',
            ]);
        } else if ($com->choix == 'livrer') {
            $com->update([
                'choix' => 'prendre',
            ]);
        }
        if ($com) {
            return response()->json([
                'message' => 'modifié avec success'
            ]);
        }
    }

    public function payer($id)
    {
        $etat = Command::findOrFail($id);
        if ($etat->etat == 0) {
            $etat->update([
                'etat' => 1,
            ]);
        }
        if ($etat) {
            return response()->json([
                'message' => 'modifié avec success'
            ]);
        }
    }

    public function commandeinfo($id)
    {
        $etat = Command::findOrFail($id)->first();
        if ($etat) {
            return response()->json([
                'id'=>$etat->id,
                'info' => $etat,
                'message' => 'modifié avec success'
            ]);
        }
    }


}

<?php

namespace App\Models;

use App\Models\Person;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Person extends Model
{
    public function getDegreeWith($target_person_id)
    {
        // Initialisation de la queue pour BFS (person_id, degré de parenté)
        $queue = [[ $this->id, 0 ]];
        
        // Tableau pour suivre les personnes déjà visitées
        $visited = [];

        // Tant qu'il y a des éléments dans la queue
        while ($queue) {
            // Extraire la personne actuelle et son degré
            list($current_person_id, $degree) = array_shift($queue);

            // Si le degré dépasse 25, on arrête la recherche
            if ($degree > 25) {
                return false;
            }

            // Si on a trouvé la personne cible, retourner le degré
            if ($current_person_id == $target_person_id) {
                return $degree;
            }

            // Marquer la personne courante comme visitée
            if (isset($visited[$current_person_id])) {
                continue;
            }
            $visited[$current_person_id] = true;

            // Recherche des relations où la personne courante est parent ou enfant
            $relations = DB::table('relationships')
                ->where('parent_id', $current_person_id)
                ->orWhere('child_id', $current_person_id)
                ->get();

            // Ajouter les voisins à la queue
            foreach ($relations as $relation) {
                // Si la personne courante est parent, l'autre personne est enfant
                if ($relation->parent_id == $current_person_id) {
                    $next_person_id = $relation->child_id;
                } else {
                    // Sinon, la personne courante est enfant, l'autre personne est parent
                    $next_person_id = $relation->parent_id;
                }

                // Ajouter la personne suivante à la queue, si elle n'a pas été visitée
                if (!isset($visited[$next_person_id])) {
                    $queue[] = [$next_person_id, $degree + 1];
                }
            }
        }

        // Si le degré dépasse 25 sans avoir trouvé la personne cible, on retourne false
        return false;
    }
}

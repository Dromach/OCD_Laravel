[Structure de la base de données](https://dbdiagram.io/d/677cb88932a2da11cf2cac5a)

Cas 1 : Proposition de Modification
Lorsqu'un utilisateur propose une modification (par exemple, ajout d'une relation), une entrée est ajoutée dans la table modifications :

Modification Type : relationship
Modification Target ID : L'ID de la relation proposée (ou de la personne dans le cas d'une modification de fiche).
New Data : Les données proposées (par exemple, les détails de la relation).
Status : pending (en attente).
Exemple : rose03 propose une relation entre elle-même et son père Jean PERRET. Cela crée une entrée dans modifications avec un statut pending.

Cas 2 : Approbation d'une Modification
Les utilisateurs concernés par la modification (ici jean01, marie02) examinent la proposition et la valident ou la rejettent. Chaque approbation ou rejet est ajouté dans la table modification_approvals avec le statut correspondant.

Exemple :

jean01 accepte la proposition de relation => status = accepted
marie02 accepte la proposition => status = accepted
paul20 rejette la proposition => status = rejected
Lorsque 3 utilisateurs ont accepté la proposition, elle passe de pending à accepted dans la table modifications, ce qui valide la modification.

Si 3 utilisateurs rejettent la proposition, le statut dans modifications passe à rejected et la modification est annulée.

Cas 3 : Validation d'une Relation
Une fois la proposition validée par 3 membres, la relation est définitivement ajoutée à la table relationships. La fiche de la personne est également mise à jour si nécessaire.

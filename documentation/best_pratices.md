# GIT
## Pour les branches à utiliser

- commit : on va publier dessus uniquement lorsqu'une version sans bug, montrable en tant que démo, est réalisée
- develop : branche principale d'où l'on fork les branches features et les branches releases
- release-*x* : branche où l'on prépare un push sur master, visant à débugger develop (càd on ajoute de feature)
- *features_name* : branche où l'on va développer une feature précise
- hotfix-*x* : branche fork depuis master où on va réparer rapidement un défaut trouvé sur un commit de master

>Lors d'un merge toujours utiliser l'option `--no-ff`  pour forcer la création d'un commit sur la branche qui reçoit le merge.

## Convention de nommage des commits

- Sont écrits in english
- Respecte la syntaxe :
```
type(scope/subscope/...): subject

body

footer
```
> Les champs `(scope/subscope/...)`, `body` et `footer` son **optionnels**.

## Liste des types

- feat: une nouvelle fonctionnalité
- fix: une correction de bug
- docs: un changement uniquement dans la documentation
- style: un changement qui n’affecte pas le sens du code (espace, reformattage, alignements dans le code…)
- refactor: un changement qui n’est ni une correction de bug ni une évolution
- perf: un changement qui améliore la performance
- test: un ajout de tests manquants
- merge: commit de merge

## Sujet du message

- Commence par une majuscule
- Ne termine **pas** par un point
- Contient 50 caractères max
- Conjugé à l'impératif
- Le corps du message explique ce qu'il fait et en pourquoi il le fait, pas comment

## Exemple

`feat(account): Add creation of admin accounts`

# WEB

## Convention de nommage en PHP

- Classes : PascalCase
- Interfaces : PascalCase
- Fonctions et méthodes : camelCase
- Variables : camelCase
- Constantes : ALL_CAPS

## Convention de nommage MYSQL

- En minuscule
- snake_case
- Pas d’abréviation
- Un seul mot quand c'est possible,
- Décrit le contenu
- A préfixer du nom de la table.

## Convention de nommage CSS / HTML

Même idée que pour PHP

## Convention d’écriture

Avoir aussi bien le code que ce qui va être affiché sur le site **en anglais**.

# Sources
- [Nommer ses commits - 1](https://www.dotnetdojo.com/git-commit/)
- [Nommer ses commits - 2](https://www.conventionalcommits.org/en/v1.0.0-beta.2/)
- [Livre sur git](https://git-scm.com/book/en/v2)
- [Modèle de gestion des branches](https://nvie.com/posts/a-successful-git-branching-model/)
- [Schéma de branching](https://nvie.com/img/git-model@2x.png)
- [Tuto workflow](https://www.atlassian.com/fr/git/tutorials/comparing-workflows)
- [Rebase VS Merge](https://www.atlassian.com/fr/git/tutorials/merging-vs-rebasing)
- [Convention nommage PHP](https://jcrozier.developpez.com/tutoriels/web/php/conventions-nommage/)
- [Convention nommage MYSQL](https://sql.sh/1396-nom-table-colonne)
- [Remote repos](https://www.atlassian.com/fr/git/tutorials/syncing)
- [Remote repos - 2](https://www.youtube.com/watch?v=_NrSWLQsDL4)

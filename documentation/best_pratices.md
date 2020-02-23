
# GIT
## The branches to use

- commit: we will publish on it only when a bug-free version is available
- develop: main branch from where we will fork the feature and release branches
- release-*x*: branch used to prepare a push on the master. We can't add any feature while working on this branch
- *features_name*: branch where we will create new precise features
- hotfix-*x*: forked branch from master where we will do quick fixes to repair a bug found on a master commit

> Always use the `--no-ff` option during a merge to force the creation of a new commit.

## Commits naming convention

- Are written in english
- Must observe the following syntax:
```
type(scope/subscope/...): subject

body

footer
```
> Fields `(scope/subscope/...)`, `body` and `footer` are **optional**.

## Types list

- feat: a new feature
- fix: a bug fix
- docs: a change in the documentation
- style: a change that doesn't affect the meaning of the code (spacing, alignment in the code...)
- refactor: a change which isn't a bug fix nor an improvement
- perf: a change improving the performances
- test: a addition of a missing test
- merge: a merge commit

## Message's subject

- Start with an upper letter
- Does**n't** end with a point
- Is 50 characters max length
- Written at the imperative tense
- The message's body explains what it does and why it does it, not how

## Example

✅ `feat(account): Add creation of admin accounts`

❌ `account refactoring`

# WEB

## PHP naming conventions

- Classes : PascalCase
- Interfaces : PascalCase
- Functions and methods : camelCase
- Variables : camelCase
- Constants : ALL_CAPS

## MYSQL naming conventions

- Lower letters
- snake_case
- No abbreviations
- One word when possible
- Describe the content
- To prefix with the table name

## HTML / CSS naming conventions

Same ideas as PHP

## Writing conventions
Everything that as to be written can can belong to one of those four groups: documentation, code, user interface and specification.

These elements will be written in:

| Group             | Language  |
|-------------------|-----------|
| Documentation     | English   |
| Code              | English   |
| User interface    | English   |
| Specification     | English   |



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

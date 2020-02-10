# Projet Web dynamique

A compléter par ex. avec l'URL du site une fois celui-ci hébergé.

## Étapes nécessaires à l'utilisation du dépôt Git

### Spécification de votre identité Git

```bash
git config --global user.name "Prénom Nom"
git config --global user.email "votre adresse de courriel"
```
(chaque commande sans le dernier argument permet de vérifier chaque paramètre de votre identité)

### Spécification de votre éditeur "préféré"

Il s'agit de l'éditeur qui sera lancé pour l'édition des messages de commit (ex. `gedit`):

```bash
git config --global core.editor votre_éditeur
```

### Génération de clé SSH

```bash
ssh-keygen -t ed25519 -a 100 -f ~/.ssh/id_ed25519_gitlab_inetdoc_net -C "MY own key for GitLab"
```

### Copie de la clé publique

Il s'agit du contenu du fichier
`~/.ssh/id_ed25519_gitlab_inetdoc_net.pub` à copier dans
le champ *Key* de la page de votre
[profil utilisateur](https://gitlab.inetdoc.net/profile/keys)

### Spécification d'une configuration SSH

Il s'agit d'affecter le numéro de port à utiiser dans le fichier `~/.ssh/config` pour les accès Git :

```
Host gitlab.inetdoc.net
	Port 2148
	User git
	IdentityFile ~/.ssh/id_ed25519_gitlab_inetdoc_net
	IdentitiesOnly yes
```

### Clonage du dépôt

```bash
git clone git@gitlab.inetdoc.net:projet-web-dynamique/g2-d/web.git
```

## Conseils d'utilisation

### Introduction à GitLab

[Vidéo d'introduction à GitLab](http://mbret.net/stri/l3/projet_web_php_bd/intro_gitlab.mp4)

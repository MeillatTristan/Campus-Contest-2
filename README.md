# MANGA++

Manga++ est un site web de location de manga qui doit permettre aux clients de se connecter et de réserver des ouvrages en ligne.

Le patron et son équipe doivent pouvoir suivre les retraits/emprunts des ouvrages suite à une reservation en ligne ou non et de suivre en temps réel les entrées et les sorties.
Ils pouront aussi acceder à la base de données clients et y apporter des modifications si besoin.

L'équipe pourront relancer automatiquement par mail les clients n'ayant pas ramené leurs ouvrages au-delà d'un certain délai.


## Pour commencer

Pour obtenir une copie du projet sur votre ordinateur local veuillez télécharger le projet ici :

```
https://github.com/MeillatTristan/Campus-Contest-2.git
```

### Conditions préalables

Pour pouvoir lancer l'application en local il vous faudra installer wamp (xamp ou mamp suivant votre système d'exploitation).
Wamp:
```
http://www.wampserver.com/
```
Xamp:
```
https://www.apachefriends.org/fr/download.html
```
Mamp:
```
https://www.mamp.info/fr/
```

Vous aurez  aussi besoin de git bash pour Windows:
```
https://gitforwindows.org/
```

### Installation

Pour cloner le projet rendez-vous dans votre fichier /www de wamp qui se trouve par défault :

```
C:\wamp64\www\
```

Ouvrez git bash dans votre fichier ou votre invite de commande pour les personnes sous linux et mac et entrez cette commande:

```
git clone https://github.com/MeillatTristan/Campus-Contest-2.git
```

Suite à cela lancez wamp (xamp,mamp), ouvrez php myadmin et importez la base de donnée.
Pour ça entrez cette url dans votre navigateur:

```
http://localhost/phpmyadmin/
```

Nom d'utilisateur:
```
root
```

Mot de passe:
```
none
```

Après vous être connnecté dans la barre à droite cliquez sur 

```
Nouvelle base de données
```
Et nommez la :

```
manga++
```
cliquez ensuite sur la base de donnée et cliquez sur le bouton:

```
Importer
```
puis 

```
choisir un fichier
```

cherchez maintenant le fichier 'manga.sql' dans le répertoire :

```
C:\wamp64\www\Campus-Contest-2
```

et ensuite Exécuter.

## Exécution du site

Vous pouvez maintenant ouvrir le site avec l'url suivante:

```
http://localhost/Campus-Contest-2/
```

## Languages utilisés

* [PHP](https://www.php.net/) - From scratch en procédural
* [MySQL](https://www.mysql.com/fr/) - Gestion de base de donnée
* HTML/CSS- Pour la mise en forme avec l'aide d'un template
source:
```
https://templated.co/caminar
```

## L'Equipe

* **Tristan Meillat** - *Dev Back-end*
* **Olivier Quillet** - *Dev front et Intégration*
* **Théo Richard** - *Dev front et documentation*
* **Jean-Louis Monnier** - *Présentation*
* **Charles Ranouil** - *Dev front et documentation*

## Remerciements

* A la classe pour l'entraide et la bonne ambiance
* A Kévin Niel pour ces cours


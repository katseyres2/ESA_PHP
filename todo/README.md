# Examen PHP 2023-2024 : Création d'une application de liste de tâches en PHP

## Objectif
Créer une application web en PHP permettant de gérer une liste de tâches (todo list) avec les

## fonctionnalités suivantes
1. Ajouter une tâche.
2. Marquer une tâche comme réalisée ou non.
3. Supprimer une tâche.
4. Éditer une tâche.
5. Persister les données dans un fichier CSV.

## Instructions
### Structure des fichiers
- index.php: La page principale affichant la liste de tâches.
- functions.php: Contient les fonctions pour gérer les tâches (ajout, suppression, modification, marquage comme réalisée/non réalisée).
- add.php: Script pour ajouter une nouvelle tâche.
- delete.php: Script pour supprimer une tâche.
- toggle.php: Script pour marquer une tâche comme réalisée/non réalisée.
- edit.php: Script pour éditer une tâche et formulaire de modification.
- todos.csv: Fichier CSV pour stocker les tâches.

### Détails de la mise en œuvre
- index.php
	- Affiche un formulaire pour ajouter une nouvelle tâche.
	- Liste toutes les tâches avec des options pour les marquer comme réalisées/non réalisées, les éditer et les supprimer.
- functions.php
	- getTodos(): Lit le fichier CSV et retourne un tableau des tâches.
	- saveTodos($todos): Enregistre le tableau des tâches dans le fichier
- add.php
  - Ajoute une nouvelle tâche à la liste et redirige vers index.php.
- delete.php
  - Supprime la tâche spécifiée de la liste et redirige vers index.php.
- toggle.php
  - Marque une tâche comme réalisée/non réalisée et redirige vers index.php.
- edit.php
  - Affiche un formulaire pour éditer une tâche.
  - Met à jour la tâche spécifiée et redirige vers index.php.

### Remarques
• Assurez-vous que le fichier todos.csv est accessible en écriture par le serveur web.
• Utilisez des balises HTML pour styliser la page si nécessaire.
• Vous pouvez améliorer l'interface utilisateur en utilisant des frameworks CSS comme Bootstrap – Pure Css ou Miligramme
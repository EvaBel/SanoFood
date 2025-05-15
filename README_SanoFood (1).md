# 🥗 SanoFood – Application de Gestion de Livraisons Alimentaires

## 📄 Description du Projet

**SanoFood** est une application complète destinée à la gestion des livraisons alimentaires. Elle est conçue pour répondre aux besoins de plusieurs utilisateurs : clients, nutritionnistes, livreurs et administrateurs.

Elle permet :
- La gestion des commandes et des livraisons
- Le suivi nutritionnel personnalisé
- La gestion des repas (ajout, modification, suppression, visualisation) 
- L’analyse statistique avec export CSV
- Une interface desktop (JavaFX) pour les administrateurs
- Une interface web pour les utilisateurs finaux

---

## 🧭 Table des matières

- [Installation](#installation)
- [Utilisation](#utilisation)
- [Contribution](#contribution)
- [Licence](#licence)

---

## ⚙️ Installation

1. **Clonez le repository :**

```bash
git clone https://github.com/votre-utilisateur/sanofood.git
cd sanofood
```

2. **Importez le projet dans votre IDE** (ex: IntelliJ, Eclipse, NetBeans)

3. **Configurez la base de données locale :**
   * Fichier : `LocalSanoFood.sql` à importer dans MySQL/MariaDB
   * Mettre à jour les paramètres dans `config.properties`

4. **Si hébergé à distance :**
   * Utiliser `DistantSanoFood.sql` (accès via serveur cloud)
   * Lancer le backend sur Heroku ou DigitalOcean

5. **Ajoutez les dépendances nécessaires** :
   * `mysql-connector-java.jar`
   * JavaFX SDK (configuré dans le module Java)

---

## 🚀 Utilisation

### 📦 Lancement de l'application JavaFX (admin)

```bash
javac -cp .;lib/mysql-connector-java.jar src/sanofood/*.java
java -cp .;lib/mysql-connector-java.jar sanofood.Main
```

### 🌐 Application Web (clients, livreurs, nutritionnistes)

- Déploiement sur serveur Tomcat ou hébergement cloud (Heroku/DigitalOcean)
- URL de démonstration : *[à ajouter si disponible]*

### 📊 Fonctionnalités clés

- Interface intuitive par rôle
- Export des données filtrées (commandes) en `.csv`
- Graphiques JavaFX dynamiques
- Notifications système

---

## 🤝 Contribution

Nous accueillons volontiers les contributions :

1. Forkez le projet
2. Créez une branche `feature/nouvelle-fonctionnalité`
3. Proposez une pull request bien documentée

Merci de consulter le fichier `CONTRIBUTING.md` pour les règles de code et bonnes pratiques.

---

## 📜 Licence

Ce projet est sous licence MIT.  
Vous êtes libre de l'utiliser, de le modifier et de le redistribuer dans les conditions précisées dans le fichier [LICENSE](LICENSE).

---

## 🏷️ Topics (mots-clés GitHub)

`java`, `javafx`, `jdbc`, `mysql`, `csv-export`, `delivery-app`, `food-delivery`, `admin-dashboard`, `github-education`, `heroku`, `deployment`, `school-project`

---

## ✨ Remerciements

Projet réalisé dans le cadre de l’année universitaire **2024–2025**.  
Développé par : *[yahya ghezayel , safwen bechewch,sarra laabidi ]*  
Encadré par : *[mohamed ali charfedine]*  
Hébergé grâce au pack **GitHub Education**.

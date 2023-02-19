# Ma Bijouterie
- Visitez le site en cliquant [ici](http://florence-leclercq.alwaysdata.net/ma_bijouterie/).

## Accéder à l'espace Admin
- Pour avoir accès à l'espace admin, et ainsi pouvoir ajouter, modifier et supprimer des bijoux :
- Clônez ce repo ou téléchargez le fichier.zip ;
- Installez xampp sur votre machine en cliquant [ici](https://www.apachefriends.org/fr/download.html) ;
- Dans Xampp Control Panel, cliquez sur les boutons Start de Apache et MySql, puis sur Admin de MySql ;
- Dans phpMyAdmin, créez votre propre base de données nommée `ma_bijouterie` et importez le fichier `ma_bijouterie.sql` dans cette base de données ;
- Sur votre machine, placez le dossier que vous avez clôné ou téléchargé dans `c:/xampp/htdocs` ;
- Dans votre navigateur, tapez `http://localhost/ma_bijouterie/` ;
- Inscrivez-vous sur le site ;
- Puis dans phpMyAdmin, dans votre base de données `ma_bijouterie`, dans la table `user`, changez votre `role` pour `ROLE_ADMIN`. Vous êtes à présent admin ;
- Enfin, connectez-vous sur le site, vous devriez maintenant avoir accès à l'onglet `Admin`.
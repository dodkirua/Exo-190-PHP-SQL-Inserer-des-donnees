<?php

/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */
$server = "127.0.0.1";
$db = "table_test_php";
$user = "dev";
$pass = "dev";
try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */
    $pdo = new PDO ("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */
    $requestUtilisateur = "
    INSERT INTO table_test_php.utilisateur (nom,prenom,email,password,adresse,code_postal,pays)
    VALUES ('Bouttefeux','Pierre-Yves','toto@tata.fr','tataalamerenslip','13 bis rue du camp de giblou','59186','France')                        
";
    $pdo->exec($requestUtilisateur);


    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    $requestProduit = "
    INSERT INTO table_test_php.produit (titre,prix,description_courte,description_longue)
    VALUES ('Pizza',8.54,'pate cuite au four avec plein de truc dessus','Tarte salée de pâte à pain garnie de tomates, anchois, olives, etc. (plat originaire de Naples).')                        
";
    $pdo->exec($requestProduit);
    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    $requestUtilisateur2 = "
    INSERT INTO table_test_php.utilisateur (nom,prenom,email,password,adresse,code_postal,pays)
    VALUES ('Bouttefeux','Joelle','joelle@toto.fr','nonadesesamours','13 bis rue du camp de giblou','59186','France') ,    
           ('Bouttefeux','Gabin','gabs@choco.fr','papaetaxelsontlesmeilleurs','rue du sars dagneau','59186','France')
";
    $pdo->exec($requestUtilisateur2);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    $requestProduit2 = "
    INSERT INTO table_test_php.produit (titre,prix,description_courte,description_longue)
    VALUES ('lasagne',10.22,'mille feuille a la sauce tomate','Pâtes alimentaires en forme de large ruban.')    ,   
           ('Osso Buco',15.47,'viande avec pate','OSSO BUCO, subst. masc. Plat d origine italienne composé de rouelles de jarret de veau cuisinées avec du vin blanc, un peu de bouillon, des tomates et des épices, servi avec des pâtes ou du riz.') 
";
    $pdo->exec($requestProduit2);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */
    $pdo->beginTransaction();

    $insert = "INSERT INTO table_test_php.utilisateur (nom,prenom,email,password,adresse,code_postal,pays) VALUES";

    $sql1 = $insert."('Bouttefeux','Axel','axel@choco.fr','jeveuxfairemeslego','rue de momignies','59186','France')";
    $pdo->exec($sql1);

    $sql2 = $insert."('Bouttefeux','Zoe','zouzoute@choco.fr','cestamoilechocolat','rue de momignies','59186','France')";
    $pdo->exec($sql2);

    $sql3 = $insert."('Bouttefeux','Alexandre','Alex@initiative.fr','jeseraismonproprepatron','rue de momignies','59186','France')";
    $pdo->exec($sql3);

    $pdo->commit();
    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
    $pdo->beginTransaction();

    $insert = "INSERT INTO table_test_php.produit (titre,prix,description_courte,description_longue) VALUES";

    $sql4 = $insert."('chocolat',2.06,'bonheur en morceau','Substance alimentaire (pâte solidifiée) faite de cacao broyé avec du sucre, de la vanille, etc.')";
    $pdo->exec($sql4);

    $sql5 = $insert."('lego',25.98,'brick de jeu','Jeu de construction constitué de pièces de plastique dur qui s encastrent les unes dans les autres.')";
    $pdo->exec($sql5);

    $sql6 = $insert."('bois',47,'stere de bois de chauffage','morceaux darbre coupé')";
    $pdo->exec($sql6);

    $pdo->commit();



}
catch (PDOException $exception) {
    echo $exception->getMessage();
}

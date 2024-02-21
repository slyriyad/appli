<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    <title>Ajout produit</title>
</head>
<body>
    <div id="wrapper">
        <header class="indexHeader">
            LE MARCHÉ.
        </header>
        <main>
        <div class="button">
            <button class="btn btn-primary" type="submit">Ajouter produit</button>
            <a type="button" class="btn btn-light position-relative" href="http://localhost/Riyad_FOUZI/appli/recap.php">
            Panier
            </a>    
            <span class="position-absolute top-10 start-60 translate-middle badge rounded-pill bg-danger">
            <?php
            if (isset($_SESSION['products'])) {
                $totalProduct = 0;
                foreach($_SESSION['products'] as $index => $product) { // Sinon calcul le nombre de produit
                    $totalProduct += $product['qtt'];
            }}
            echo $totalProduct;
            ?>
                <span class="visually-hidden">unread messages</span>
            </span>
        </button>
        </div>  
            <h1>Ajouter un produit</h1>
            <form action="traitement.php?action=add" method="post">
                <p>
                    <label>
                        Nom du produit :
                        <input class="form-control" type="text" placeholder="Nom" name="name">
                    </label>
                </p>
                <p>
                    <label>
                        Prix du produit en € :
                        <input class="form-control" step="any" type="number" placeholder="Prix" name="price">
                    </label>
                </p>
                <p>
                    <label>
                        Quantité désirée :
                        <input class="form-control" type="number" name="qtt" value="1" >
                    </label>
                </p>
                <button name ="submit" type="submit" class="btn btn-primary" id="liveAlertBtn" >Ajouter le produit</button>
            </form>
            
                <?php
                    // Affiche les messages de succès ou d'erreur
                    if (isset($_SESSION['success_message'])) {
                        
                        echo $_SESSION['success_message'] ;
                        
                        unset($_SESSION['success_message']);
                       
                    } elseif (isset($_SESSION['error_message'])){ 
                        
                        echo $_SESSION['error_message'] ;
                        unset($_SESSION['error_message']);

                    }
                ?>
        </div>
        </main>
        <script src="main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
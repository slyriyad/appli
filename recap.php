<?php
session_start();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Récapitulatif des produits</title>
</head>
<body class="recapBody">
    <div id="wrapper">
    <header class="recapHeader">
        LE MARCHÉ.
    </header>
    <div id="btnRecap">
        <a type="button" class="btn btn-light position-relative" href="http://localhost/Riyad_FOUZI/appli/index.php">
            Ajouter produit
        </a>
        <a type="button" class="btn btn-primary position-relative" href="http://localhost/Riyad_FOUZI/appli/recap.php">
            Panier
        </a>    
        <span id="badge" class="position-absolute top-10 start-60  translate-middle badge rounded-pill bg-danger">
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
    <h1 class="pRecap">
        Votre panier :
    </h1>
    <main class="recapMain">
        <?php
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){ 
                echo "<p>Aucun produit en session...</p>";
            }
            else{
                // Affiche le tableau des produits
                echo "<table class='table table table-hover table-bordered border-primary'>",
                        "<thead'>",
                            "<tr>",
                                '<th scope="col">#</th>',
                                '<th scope="col">Nom</th>',
                                '<th scope="col">Prix</th>',
                                '<th scope="col">Quantité</th>',
                                '<th scope="col">Total</th>',
                                '<th scope="col">Supprimer</th>',
                            "</tr>",
                        "</thead>",
                    "<tbody>";
                    // Calcul du total général
                $totalGeneral = 0;
                // $totalQtt = 0;
                    

                // Parcours des produits en session
                foreach($_SESSION['products'] as $index => $product){
                    // Affiche les détails de chaque produit dans une ligne du tableau
                    echo "<tr>",
                    "<td>$index</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                    "<td><a class='btn btn-danger btn-sm' href='traitement.php?action=down-qtt&index=".$index."'>-</a> ".$product['qtt']." <a class='btn btn-success btn-sm' href='traitement.php?action=up-qtt&index=".$index."'>+</a></td>",
                    "<td>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                    "<td><a class='btn btn-danger' href='traitement.php?action=delete&index=".$index."'>Supprimer le produit</a></td>",
                "</tr>";

                // Met à jour le total général
                $totalGeneral+= $product['total'];
                // $totalQtt+= $_SESSION['products'][$_GET['index']]['qtt'];
                }

                // Affiche la ligne pour le total général
                echo "<tr>",
                        "<td colspan=4>Total géneral : </td>",
                        "<td><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
                    "</tr>",
                "</tbody>",
            "</table>";
            }
        ?>
        <?php
                    // Affiche les messages de succès ou d'erreur
                    if (isset($_SESSION['sup_message'])) {
                        
                        echo $_SESSION['sup_message'] ;
                        unset($_SESSION['sup_message']);
                        
                    }
                ?>
        <a class="btn btn-danger" href="traitement.php?action=clear">Vider le panier</a>

    </main>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</body>
</html>
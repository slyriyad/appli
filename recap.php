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
    <span id="badge" class="position-absolute  translate-middle badge rounded-pill bg-danger">
        <?php
                    echo isset($_SESSION['products']) ? count($_SESSION['products']) :0 ;
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
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                "<td>$index</td>",
                "<td>".$product['name']."</td>",
                "<td>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                "<td>".$product['qtt']."</td>",
                "<td>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                "<td><a href='traitement.php?action=delete&index=".$index."'>Supprimer le produit</a></td>",
            "</tr>";
            $totalGeneral+= $product['total'];
            }
            echo "<tr>",
                    "<td colspan=4>Total géneral : </td>",
                    "<td><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
            "</tbody>",
        "</table>";
        }
    ?>

    <a class="btn btn-danger" href="traitement.php?action=clear">Vider le panier</a>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
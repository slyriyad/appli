<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    <title>Ajout produit</title>
</head>
<body>
    <div id="wrapper">
        <div class="button">
            <button class="btn btn-primary" type="submit">Ajouter produit</button>
            <button type="button" class="btn btn-light position-relative">
            Panier
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php
                    echo isset($_SESSION['products']) ? count($_SESSION['products']) : 0 ;
                ?>
                <span class="visually-hidden">unread messages</span>
            </span>
        </div>  
        </button>
            <h1>Ajouter un produit</h1>
            <form action="traitement.php" method="post">
                <p>
                    <label>
                        Nom du produit :
                        <input class="form-control" type="text" placeholder="Nom">
                    </label>
                </p>
                <p>
                    <label>
                        Prix du produit en € :
                        <input class="form-control" type="text" placeholder="Prix">
                    </label>
                </p>
                <p>
                    <label>
                        Quantité désirée :
                        <input class="form-control" type="number" name="qtt" value="1">
                    </label>
                </p>
                <p>
                    <button type="button" class="btn btn-primary">Ajouter le produit</button>
                </p>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </div>
</body>
</html>
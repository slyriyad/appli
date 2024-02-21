<?php

session_start();


    if(isset($_GET["action"])) {
        switch($_GET["action"]) {
            // Ajout d'un produit au panier
            case "add":
                if(isset($_POST['submit'])){

                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                    if($name && $price && $qtt){
                        // Création d'un tableau représentant le produit
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
                        // Ajout du produit à la session 'products'
                        $_SESSION['products'][] = $product;
                        $_SESSION['success_message'] = "<div id='successAlert' class='alert alert-success' role='alert'>
                            Votre produit a bien été enregistré ! 
                         </div>";
                    }else{
                        $_SESSION['error_message'] = "<div id='successAlert' class='alert alert-danger' role='alert'>
                        Votre produit n'a pas été enregistré ! 
                     </div>";
                    }
                }
                // Redirection vers la page d'index
                header("location:index.php");
                break;


            // Suppression de tous les produits dans le panier    
            case "clear":
                unset($_SESSION["products"]);
                header("Location: recap.php"); die;
                break;


            // Suppression d'un produit spécifique dans le panier        
            case "delete":
                unset($_SESSION['products'][$_GET['index']]);
                header("Location: recap.php"); die;
                break;


            // Augmentation de la quantité d'un produit dans le panier    
            case "up-qtt":
                $_SESSION['products'][$_GET['index']]['qtt']++;
                $_SESSION['products'][$_GET['index']]['total']=$_SESSION['products'][$_GET['index']]['price']*$_SESSION['products'][$_GET['index']]['qtt'];
                
                header("Location: recap.php"); die;
                break;


            // Diminution de la quantité d'un produit dans le panier    
            case "down-qtt":
                    if(($_SESSION['products'][$_GET['index']]['qtt'])>1){
                        $newQtt = $_SESSION['products'][$_GET['index']]['qtt']--;
                        $_SESSION['products'][$_GET['index']]['total']-=$_SESSION['products'][$_GET['index']]['price'];
                    }else{
                        unset($_SESSION['products'][$_GET['index']]);
                        $_SESSION['sup_message'] = "<div id='successAlert' class='alert alert-danger' role='alert'>
                        Votre produit a bien été supprimé ! 
                     </div>";
                    };
                    header("Location: recap.php"); die;
                break;
        }
    }
    
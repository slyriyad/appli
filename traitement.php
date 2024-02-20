<?php

session_start();


    if(isset($_GET["action"])) {

        switch($_GET["action"]) {
            case "add":
                if(isset($_POST['submit'])){

                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                    if($name && $price && $qtt){
            
            
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" => $price*$qtt
                        ];
            
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
            
                header("location:index.php");
                break;

            case "clear":
                unset($_SESSION["products"]);
                header("Location: recap.php"); die;
                break;
            case "delete":
                break;
            case "up-qtt":
                break;
            case "down-qtt":
                break;
        }
    }
    
<?php

    include_once('getid3/getid3.php');
    $getID3 = new getID3;


    
    
    try{
        $db = new PDO("mysql:host=localhost;dbname=exo_nan;","root","");
    }catch(Exception $e){
        die("Erreur : ".$e->getMessage());
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $req = $db->prepare("INSERT INTO videos(nom,titre,description,duree,taille,path) VALUES(?,?,?,?,?,?)");
        $isValidate = $file_env = true;
        if(isset($_POST["titre"]) && $_POST["titre"]){
            $titre = $_POST["titre"];
        }else{
            $isValidate = false;
        }

        if(isset($_POST["descript"]) && $_POST["descript"]){
            
            $descript = $_POST["descript"];
        }else{
            $isValidate = false;
        }

        if(isset($_FILES["fichier"]) && $_FILES["fichier"] && !$_FILES["fichier"]["error"]){
            $file_name = $_FILES["fichier"]["name"];
            $path = $_FILES["fichier"]["tmp_name"];
            $taille = round(($_FILES["fichier"]["size"] / 999999),3);
            $file = $getID3->analyze($path);
            $duree = $file["playtime_string"];
            echo $duree;
            echo $taille;
            $dest = "./videos/".$file_name;
        }else{
            $isValidate = false;
        }

        

        if($isValidate){
            if(move_uploaded_file($path,$dest)){
              $req->execute(array($file_name,$titre,$descript,$duree,$taille,$dest));
                
            }else{
                $file_env = false;
                echo "Erreur : le fichier n' a pas été ajouté -> non ajouté";
            }  

            if($file_env){
                header("location:index.php");
            }
        }else{
            echo "Erreur : le fichier n' a pas été ajouté -> non ajouté ";
        }
    }


?>
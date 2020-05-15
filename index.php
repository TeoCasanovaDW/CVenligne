<?php

session_start();

use \Teo\CVenligne\controller\Controller;

require ('Autoloader/Autoloader.php');
use \Teo\CVenligne\autoloader\Autoloader;
Autoloader::register();

$controller = new Controller();

try{

    switch($_GET['action']){
        case 'home':
            $controller->displayHomePage();
        break;
        case 'json':
            $controller->displayJsonPage();
        break;
        case 'formation':
        	$controller->displayFormationPage();
        break;
        case 'portfolio':
        	$controller->displayPortfolioPage();
        break;
        case 'contact':
        	$controller->displayContactPage();
        break;
        case 'project':
            if ($_GET['p_id'] && $_GET['p_id'] > 0) {
                $controller->displayTheProject();
            }
            else{
                throw new Exception('Mauvais id de projet');
            }
        break;
        case 'addComment':
            if ($_GET['p_id'] && $_GET['p_id'] > 0) {
                if(!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['content'])){
                    $controller->addComment($_GET['p_id'], $_POST['name'], $_POST['firstname'], $_POST['content']);
                }
                else{
                    throw new Exception('Vous n\'avez pas rempli correctement tout les champs');
                }
            }
            else{
                throw new Exception('Mauvais identifiant de projet');
            }
        break;
        case 'report':
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0){
                $controller->reportComment();
            }
            else{
                throw new Exception('pas d\'id de commentaire');
            }
        break;
        case 'mail':
            if ($_POST['nom'] && $_POST['objet'] && $_POST['message']) {
                $controller->sendAMail();
            }
            else{
                throw new Exception('Vous n\'avez pas rempli tout les champs');
            }
        break;
        case 'connexionPage':
            $controller->displayConnexionPage();
        break;
        case 'adminConnect':
            if ($_POST['user'] && $_POST['password']) {
                $controller->getConnected();
            }
            else{
                throw new Exception('Veuillez renseigner un identifiant et un mot de passe');
            }
        break;

        /* ADMIN */

        case 'adminPage':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                $controller->displayAdminPage();
            }
            else{
                throw new Exception('Droits administrateurs requis');
            }
        break;

        case 'deconnexion':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                $_SESSION['isLoggedIn'] = false;
                $controller->displayHomePage();
            }
            else{
                throw new Exception('Droits administrateurs requis');
            }                
        break;

        case 'createPost':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                if (!empty($_POST['titleCreated']) && !empty($_POST['project_link']) && !empty($_POST['desc']) && !empty($_POST['skills']) && isset($_FILES['image']) && $_FILES['image']['error'] == 0){
                    if ($_FILES['image']['size'] < 1000000) {
                        $infosfichier = pathinfo($_FILES['image']['name']);
                        $extension_upload = $infosfichier['extension'];
                        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                        if (in_array($extension_upload, $extensions_autorisees)){
                            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . basename($_FILES['image']['name']));
                            $controller->createProject();
                        }
                        else{
                            throw new Exception('Le fichier ne contient pas la bonne extension');
                        }
                    }
                    else{
                        throw new Exception('Le fichier sélectionné est trop volumineux');
                    }
                    
                }
                else{
                    throw new Exception('Veuillez renseigner tout les champs disponibles');
                }
            }
            else{
                throw new Exception('Droits administrateurs requis');
            } 
        break;

        case 'adminUpdatePage':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                if (isset($_GET['p_id'])) {
                    $controller->displayProjectToUpdate();
                }
                else{
                    throw new Exception('pas d\'identifiant de projet');
                }
            }
            else{
                throw new Exception('Droits administrateurs requis');
            } 
        break;

        case 'updateProject':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                if (!empty($_POST['titleUpdated']) && !empty($_POST['project_linkUpdated']) && !empty($_POST['descUpdated']) && !empty($_POST['skillsUpdated']) && isset($_FILES['imageUpdated']) && $_FILES['imageUpdated']['error'] == 0){
                    if (isset($_GET['p_id'])) {
                        if ($_FILES['imageUpdated']['size'] < 1000000) {
                            $infosfichier = pathinfo($_FILES['imageUpdated']['name']);
                            $extension_upload = $infosfichier['extension'];
                            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                            if (in_array($extension_upload, $extensions_autorisees)){
                                move_uploaded_file($_FILES['imageUpdated']['tmp_name'], 'uploads/' . basename($_FILES['imageUpdated']['name']));
                                $controller->updateProject();
                            }
                            else{
                                throw new Exception('Le fichier ne contient pas la bonne extension');
                            }
                        }
                        else{
                            throw new Exception('Le fichier sélectionné est trop volumineux');
                        }
                        
                    }
                    else{
                        throw new Exception('pas d\'identifiant de projet');
                    }
                }
                else{
                    throw new Exception('Veuillez renseigner un titre et un contenu');
                }
            }
            else{
                throw new Exception('Droits administrateurs requis');
            }
        break;

        case 'deleteProject':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                if (isset($_GET['p_id'])) {
                    $controller->deleteProject();
                }
                else{
                    throw new Exception('pas d\'identifiant de projet détecté');
                }
            }
            else{
                throw new Exception('Droits administrateurs requis');
            }
        break;

        case 'commentEditor':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    $controller->displayCommentEditor();
                }
                else{
                    throw new Exception('pas d\'identifiant de commentaire');
                }
            }
            else{
                throw new Exception('Droits administrateurs requis');
            }
        break;

        case 'editComment':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    if (!empty($_POST['newComment'])) {
                        $controller->editComment($_POST['newComment']);
                    }
                    else{
                        throw new Exception('aucun nouveau commentaire détecté');
                    }
                }
                else{
                    throw new Exception('aucun identifiant de commentaire envoyé');
                }
            }
            else{
                throw new Exception('Droits administrateurs requis');
            }
        break;

        case 'removeReport':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                if($_GET['comment_id']){
                    $controller->removeReport();
                }
                else{
                    throw new Exception('impossible d\'enlever le report');
                }
            }
            else{
                throw new Exception('Droits administrateurs requis');
            }
        break;

        case 'deleteComment':
            if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){
                $controller->deleteComment();
            }
            else{
                throw new Exception('Droits administrateurs requis');
            }
        break;

    default:
        $controller->displayHomePage();
    }
}
catch(Exception $e){
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
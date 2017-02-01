<?php

class LoginFController extends Controller
{
    public function index()
    {
        //LOGIN
        $viewData = array();
        $errors = array();

        if(isset($_POST['submit'])) {
            if(strlen(trim($_POST['username'])) > 60 || strlen(trim($_POST['username'])) < 3) {
                $errors['error'] = 'Wrong Credentials';
            }

            if(strlen(trim($_POST['password'])) > 50 || strlen(trim($_POST['password'])) < 3) {
                $errors['error'] = 'Wrong Credentials';
            }

            if(empty($errors)) {
                $clientsCollection = new ClientsCollection();
                $where = array('username' => htmlspecialchars(trim($_POST['username'])));
                $client = $clientsCollection->get($where);

                if(!empty($client)) {
                    if($client[0]->getPassword() == sha1(trim($_POST['password']))) {
                        $_SESSION['client'] = $client;
                        header('Location: index.php');
                        die;
                    } else {
                        $errors['error'] = 'Wrong credentials';
                    }
                } else {
                    $errors['error'] = 'Wrong credentials';
                }
            }
        }
        
        //REGISTER
        $insertInfo = array(
            'username' => '',
            'password' => '',
            'email'    => '',
        );
        
        if(isset($_POST['createUser'])) {
            $insertInfo = array(
                'username' => (isset($_POST['username']))? $_POST['username'] : '',
                'password' => (isset($_POST['password']))? sha1($_POST['password']) : '',
                'email'    => (isset($_POST['email']))? $_POST['email'] : '',
            );

            if (strlen(trim($_POST['username'])) < 5 || strlen(trim($_POST['username'])) > 50) {
                $errors['username'] = 'Username must be between 5 and 50 chars';
            }

            if (strlen(trim($_POST['password'])) < 5 || strlen(trim($_POST['password'])) > 50) {
                $errors['password'] = 'Password must be between 5 and 50 chars';
            }

            $clientsCollection = new ClientsCollection();

            $client = $clientsCollection->checkUsername($_POST['username']);
            
            if($client == false ) {
                $errors['username'] = 'Username is already exists';

            }

            if(empty($errors)) {
                $entity = new ClientEntity();
                $entity->inIt($insertInfo);
                $client = new ClientsCollection();
                $client->save($entity);
           
            }
            $where = array('username' => htmlspecialchars(trim($_POST['username'])));
            $client = $clientsCollection->get($where);
            if(!empty($client)) {
                $_SESSION['client'] = $client;
                header('Location: index.php');
            }
        }
        
        $viewData['errors'] = $errors;
        
        $this->loadFrontView('login/login.php', $viewData);
    }

    public function logOut()
    {
        session_start();
        unset($_SESSION['client']);
        header('Location: index.php?c=loginf');
    }
    
    
}
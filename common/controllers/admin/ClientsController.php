<?php

class ClientsController extends Controller
{
    public function __construct()
    {
        if(!$this->loggedIn()) {
            header('Location: index.php?c=login');
        }
    }

    public function index()
    {
        $data = array();

        $pageResults = 5;
        $page = (isset($_GET['page']) && (int)$_GET['page'] >0 )? (int)$_GET['page'] : 1;
        $offset = ($page-1)*$pageResults;

        $clientCollection = new ClientsCollection();



        $clients = $clientCollection->get(array(), $offset, $pageResults);
        $totalRows = count($clientCollection->get());

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl('index.php?c=clients');

        $data['clients'] = $clients;
        $data['paginator'] = $paginator;

        $this->loadView('clients/list.php', $data);

    }
    
    public function update() 
    {
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=clients');
            die;
        }
        $viewData = array();
        $clientsCollection = new ClientsCollection();
        $client = $clientsCollection->getOne($_GET['id']);
        
        if(empty($client)) {
            header('Location: index.php?c=clients');
            die;
        }
        
        $insertInfo = array(
            'id' => $client->getId(),
            'username' => $client->getUsername(),
            'email'  => $client->getEmail(),
        );
        $errors = array();
        
        if(isset($_POST['editUser'])) {
            $insertInfo = array(
                'id' => $_GET['id'],
                'username' => $_POST['username'],
                'email'  => $_POST['email'],
            );
            if (strlen(trim($_POST['username'])) < 3 || strlen(trim($_POST['username']) > 255) ) {
                $errors['username'] = 'Invalid name length';
            }

            if (strlen(trim($_POST['email'])) < 3 || strlen(trim($_POST['email']) > 100) ) {
                $errors['email'] = 'Invalid description length';
            }
            $entity = new ClientEntity();
            $entity->inIt($insertInfo);
            $clientsCollection->save($entity);
            header('Location: index.php?c=clients');
            die;
        }
        $viewData['insertInfo'] = $insertInfo;
        $viewData['errors'] = $errors;
        
        $this->loadView('clients/update.php', $viewData);
    }

    public function delete()
    {
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=clients');
            die;
        }

        $clientsCollection = new ClientsCollection();
        $clientsCollection->delete($_GET['id']);

        header('Location: index.php?c=clients');
    }
}
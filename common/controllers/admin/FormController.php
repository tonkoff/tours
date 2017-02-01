<?php

class FormController extends Controller
{
    public function __construct()
    {
        if(!$this->loggedIn()) {
            header('Location: index.php?c=login');
        }
    }

    public function index()
    {
        $data  = array();

        $contactsCollections = new ContactsCollection();

        $search = (isset($_GET['search'])) ? htmlspecialchars(trim($_GET['search'])) : '';

        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] :1;
        $pageResults = 5;
        $offset = ($page-1)* $pageResults;

        $contacts = $contactsCollections->get(array(), $offset, $pageResults, $search);

        $totalRows = count($contactsCollections->get(array(),-1, 0, $search));
        $totalRows = ($totalRows == 0) ? 1 :$totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl("commentsListing.php?search={$search}");

        $data['contacts'] = $contacts;
        $data['search'] = $search;
        $data['paginator'] = $paginator;

        $this->loadView('form/list.php', $data);
    }
    
    public function status()
    {
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=form');
            die;
        }
        $where = array('status' => 'done');
        $contactCollection = new ContactsCollection();
        
        $contactCollection->update($_GET['id'], $where);
        header('Location:index.php?c=form');
        
    }
    
    public function delete() 
    {
        if(!isset($_GET['id'])) {
            header('Location:index.php?c=form');
            die;
        }
        
        $contactCollection = new ContactsCollection();
        $contact = $contactCollection->getOne($_GET['id']);
        
        if(empty($contact)) {
            header('Location:index.php?c=form');
            die;
        }
        
        $contactCollection->delete($contact->getId());
        header('Location:index.php?c=form');
        die;
    }
}
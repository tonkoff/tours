<?php

class CommentsController extends Controller
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

        $commentsCollection = new CommentsCollection();
        $search = (isset($_GET['search'])) ? htmlspecialchars(trim($_GET['search'])) : '';

        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] :1;
        $pageResults = 5;
        $offset = ($page-1)* $pageResults;

        $comments = $commentsCollection->get(array(), $offset, $pageResults, $search);

        $totalRows = count($commentsCollection->get(array(),-1, 0, $search));
        $totalRows = ($totalRows == 0) ? 1 :$totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl("index.php?c=comments&search={$search}");

        $data['comments'] = $comments;
        $data['search'] = $search;
        $data['paginator'] = $paginator;

        $this->loadView('comments/list.php', $data);
    }
    
    public function delete() 
    {
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=comments');
            die;
        }
        
        $commentCollection = new CommentsCollection();
        $commentCollection->delete($_GET['id']);
        header('Location: index.php?c=comments');
        die;
    }
    
    public function approve() 
    {
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=comments');
            die;
        }
        $id = $_GET['id'];
        $data = array('approve' => 'yes');
        $comments = new CommentsCollection();
        $comments->update($id,$data);
        header('Location: index.php?c=comments');
        die;
        
    }
}
<?php  

class BlogFController extends Controller 
{
    public function index()
    {
        $viewData = array();
        $blogCollection = new BlogCollection();

        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] :1;
        $where = array();
        $pageResults = 5;
        $offset = ($page-1)*$pageResults;
        $blogResults = $blogCollection->get($where, $offset, $pageResults );
        $totalRows = count($blogCollection->get(array(), -1, 0));
        $totalRows = ($totalRows == 0)? 1 :$totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl('index.php?c=blogf');
        
        $viewData['blogResults'] = $blogResults;
        $viewData['paginator'] = $paginator;
        
        $this->loadFrontView('blog/list.php', $viewData);
    }
    
    public function singleBlog() 
    {
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=blogf');
            die;
        }
        
        $blogCollection = new BlogCollection();
        $blog = $blogCollection->getOne($_GET['id']);
        
        if(empty($blog)) {
            header('Location: index.php?c=blogf');
            die;
        }
        $where = array(
            'blog_post_id' => $_GET['id'],
            'approve'      => 'yes,'
        );
        $commentCollection = new CommentsCollection();
        $comments = $commentCollection->get($where);
        
        $blogImagesCollection = new BlogImagesCollection();
        $where1 = array('blog_post_id'=> $_GET['id']);
        
        $images = $blogImagesCollection->get($where1);
        
        //SETVA KOMENTARITE
        $errors = array();
        $data = array(
            'blog_post_id' => '',
            'clients_id' => '',
            'description' => '',
            'created_at' => '',
            'approve' => '',
        );
        if (isset($_POST['submit'])) {

            if (!loggedInClient()) {
                header('Location: login.php');
                die;
            }


            $data = array(
                'blog_post_id' => $_GET['id'],
                'clients_id' => $_SESSION['client'][0]->getId(),
                'description' => $_POST['textarea'],
                'created_at' => date("Y-m-d H:i:s"),
                'approve' => 'no',
            );

            if (empty($errors)) {
                $entity = new CommentEntity();
                $entity->InIt($data);
                $commentCollection = new CommentsCollection();
                $commentCollection->save($entity);
                header("Refresh:0");
            }
        }
        
        $viewData['blog'] = $blog;
        $viewData['comments'] = $comments;
        $viewData['images'] = $images;
        
        $this->loadFrontView('blog/singleBlog.php', $viewData);
    }
}
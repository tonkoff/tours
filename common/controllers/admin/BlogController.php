<?php   

class BlogController extends Controller
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
        $blogCollection = new BlogCollection();

        $pageResults = 5;
        $page = (isset($_GET['page']) && (int)$_GET['page'] >0 ? (int)$_GET['page'] : 1 );

        $offset = ($page-1)* $pageResults;
        $blogResults = $blogCollection->get(array(), $offset, $pageResults);

        $totalRows = count($blogCollection->get());

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl('index.php?c=blog');
 
        $data['blogResults'] = $blogResults;
        $data['paginator']   = $paginator;
        
        $this->loadView('blog/list.php', $data);
    }

    public function insert()
    {
        $imageErrors = array();
        $viewData = array();
        $errors = array();
        $data = array(
            'image'       => '',
            'description' => '',
            'name'        => '',
            'created_at'  => '',
            'user_id'     =>'',
        );

        if(isset($_POST['submit'])) {
            $data = array(
                'image' => '',
                'description' => $_POST['description'],
                'name'    => $_POST['name'],
                'created_at' => date("Y-m-d H:i:s"),
                'user_id' =>$_SESSION['user']->getId(),
            );

            if (strlen(trim($_POST['name'])) < 3 || strlen(trim($_POST['name']) > 255) ) {
                $errors['name'] = 'Invalid name length';
            }

            if (strlen(trim($_POST['description'])) < 3 || strlen(trim($_POST['description']) > 500) ) {
                $errors['description'] = 'Invalid description length';
            }


            if (isset($_FILES['image'])) {
                $imageName = $_FILES['image']['name'];

                $imageType = $_FILES['image']['type'];
                $imageSize = $_FILES['image']['size'];
                $imagePath = $_FILES['image']['tmp_name'];
                $extension = strtolower(end(explode('/', $imageType)));
                $imageName = sha1(sha1(time()).sha1($imageName)).'.'.$extension;
                $allow = array('gif', 'jpg', 'jpeg', 'png');

                if (!in_array($extension, $allow)) {
                    $imageErrors['extension'] = 'Wrong extension';
                }
                if ($imageSize > 10000000) {
                    $imageErrors['size'] = 'Image is too big!';

                }
            }

            if(empty($errors) && empty($imageErrors)) {
                if(isset($_FILES['image'])) {
                    $data['image'] = $imageName;
                }
                
                $entity = new BlogEntity();
                $entity->inIt($data);
                $blogCollection = new BlogCollection();
                $blogCollection->save($entity);
                
                if(isset($_FILES['image'])) {
                    move_uploaded_file($imagePath, 'uploads/blog/' . $imageName);
                }
                header('Location: index.php?c=blog');
                die;
             }
        }

        $viewData['data'] = $data;
        $viewData['errors'] = $errors;
        $viewData['imageErrors'] = $imageErrors;

        $this->loadView('blog/insert.php', $viewData);
    }

    public function delete()
    {
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=blog');
            die;
        }

        $blogCollection = new BlogCollection();
        $blog = $blogCollection->getOne($_GET['id']);

        if(empty($blog)) {
            header('Location: index.php?c=blog');
            die;
        }

        $blogCollection->delete($blog->getId());
        $imageName = $blog->getImage();    
        unlink(__DIR__.'/../../../admin/uploads/blog/'.$imageName);
        header('Location: index.php?c=blog');
    }

    public function blogImages()
    {
        if (!isset($_GET['id'])) {
            header('Location: index.php?c=blog');
        }

        $viewData = array();

        $blogImagesCollection = new BlogImagesCollection();

        $where = array('blog_post_id' => (int)$_GET['id']);
        $images = $blogImagesCollection->get($where);

        $imageErrors = array();
        if (isset($_FILES['image'])) {
            $imageName = $_FILES['image']['name'];

            $imageType = $_FILES['image']['type'];
            $imageSize = $_FILES['image']['size'];
            $imagePath = $_FILES['image']['tmp_name'];
            $extension = strtolower(end(explode('/', $imageType)));
            $imageName = sha1(sha1(time()).sha1($imageName)).'.'.$extension;
            $allow = array('gif', 'jpg', 'jpeg', 'png');

            if (!in_array($extension, $allow)) {
                $imageErrors['extension'] = 'Wrong extension';
            }
            if ($imageSize > 100000000) {
                $imageErrors['size'] = 'Image is too big!';
            }

            if (empty($imageErrors)) {
                $data = array(
                    'blog_post_id' => $_GET['id'],
                    'image'    => $imageName
                );


                $entity = new BlogImageEntity();
                $entity->InIt($data);

                $blogImagesCollection->save($entity);


                move_uploaded_file($imagePath, 'uploads/blog/' . $imageName);
                header("Location: index.php?c=blog&m=blogImages&id={$_GET['id']}");
            }

        }
        $viewData['images'] = $images;
        $viewData['imageErrors'] = $imageErrors;

        $this->loadView('blog/blogImages.php', $viewData);
    }

    public function deleteImage()
    {
        if (!isset($_GET['id'])) {
            header('Location: index.php?c=blog');
        }


        //Proverka dali ima Image s takova id
        $blogImagesCollection = new BlogImagesCollection();
        $image = $blogImagesCollection->getOne($_GET['id']);
        if(empty($image)) {
            header('Location: index.php?c=tours');
        }

        //Iztriwane na Image ot bazata kato zapis
        $blogImagesCollection->delete((int)$_GET['id']);

        //Iztrivane na Image Fizicheski
        unlink("uploads/blog/{$image->getImage()}");
        header("Location: index.php?c=blog&m=blogImages&id={$image->getBlogPostId()}");


    }
}
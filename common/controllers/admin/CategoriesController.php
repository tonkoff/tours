<?php

class CategoriesController extends Controller
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
        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] : 1;
        $offset = ($page-1)*$pageResults;

        $categoriesCollection = new CategoriesCollection();

        $categories = $categoriesCollection->get(array(), $offset, $pageResults);

        $totalRows = count($categoriesCollection->get());

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl('index.php?c=categories');
        
        $data['categories'] = $categories;
        $data['paginator'] = $paginator;
        
        $this->loadView('categories/list.php', $data);
     }

    public function insert()
    {
        $viewData = array();
        $data = array(
            'name' => '',
            'description' => ''
        );

        $errors = array();
        if (isset($_POST['submit'])) {
            if(strlen(trim($_POST['name'])) < 3 || strlen(trim($_POST['name'])) > 255) {
                $errors['name'] = 'Invalid category name length';
            }
            if(strlen(trim($_POST['description'])) < 3 || strlen(trim($_POST['description'])) > 500) {
                $errors['description'] = 'Invalid category description length';
            }
            $data = array(
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
            );

            if (empty($errors)) {
                $categoriesCollection = new CategoriesCollection();
                $entity = new CategoryEntity();
                $entity->InIt($data);
                $categoriesCollection->save($entity);

                header('Location: index.php?c=categories');

            }

        }
        $viewData['data'] = $data;
        $viewData['errors'] = $errors;
        $this->loadView('categories/insert.php', $viewData);
    }

    public function update()
    {
        $viewData = array();
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=categories');
            die;
        }
        $categoriesCollection = new CategoriesCollection();
        $category = $categoriesCollection->getOne($_GET['id']);

        if(empty($category)) {
            header('Location: index.php?c=categories');
            die;
        }
        $data = array(
             'id' => $category->getId(),
             'name' => $category->getName(),
            'description' => $category->getDescription(),
        );

        $errors = array();

        if(isset($_POST['submit'])) {
            if(strlen(trim($_POST['name'])) < 3 || strlen(trim($_POST['name'])) > 255) {
                $errors['name'] = 'Invalid category name length';
            }
            if(strlen(trim($_POST['description'])) < 3 || strlen(trim($_POST['description'])) > 500) {
                $errors['description'] = 'Invalid category description length';
            }
            $data = array(
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            );
            
            if(empty($errors)) {
                $entity = new CategoryEntity();
                $entity->InIt($data);
                $categoriesCollection->save($entity);
                header('Location: index.php?c=categories');
                die;
            }
        }
        $viewData['data'] = $data;
        $viewData['errors'] = $errors;
        
        $this->loadView('categories/update.php', $viewData);
    }


    public function delete()
    {
        if(!isset($_GET['id'])) {
            $_SESSION['message']['warning'] = 'Something went wrong';
            header('Location: index.php?c=categories');
            die;
        }

        $categoriesCollection = new CategoriesCollection();
        $category = $categoriesCollection->getOne($_GET['id']);

        if(is_null($category->getId())) {
            header('Location: index.php?c=categories');
            die;
        }
        $categoriesCollection->delete($category->getId());
        header('Location: index.php?c=categories');
        die;
    }
}

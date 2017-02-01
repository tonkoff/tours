<?php

class ToursController extends Controller
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

        $search = (isset($_GET['search'])) ? htmlspecialchars(trim($_GET['search'])) : '';

        $toursCollection = new ToursCollection();

        $categoriesCollection = new CategoriesCollection();
        $categories =  $categoriesCollection->get();


        $where = array();
        if(isset($_GET['category'])) {
            $_GET['category'] = (int)$_GET['category'];
            if($_GET['category'] === 0) {
                $where = array();
            }
            if($_GET['category'] !== 0) {
                $where = array('category_id' =>  $_GET['category']);
            }

        }

        $pageResults = (isset($_GET['perPage'])) ? (int)$_GET['perPage'] : 0;

        switch ($pageResults) {
            case 1:
                $pageResults =1;
                break;
            case 5:
                $pageResults = 5;
                break;
            case 10:
                $pageResults =10;
                break;
            default:
                $pageResults = 5;
        }

        $orderBy = (isset($_GET['orderBy'])) ? (int)$_GET['orderBy'] : 0;

        switch ($orderBy) {
            case 0:
                $order = array('id', 'DESC');
                break;
            case 1:
                $order = array('name', 'ASC');
                break;
            case 2:
                $order = array('name', 'DESC');
                break;
            case 3:
                $order = array('category_name', 'ASC');
                break;
            case 4:
                $order = array('category_name', 'DESC');
                break;
            default:
                $order = array('id', 'DESC');
        }


        $category = (isset($_GET['category'])) ? (int)$_GET['category'] : '';


        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] :1;
        $offset = ($page-1)*$pageResults;
        $tours = $toursCollection->getA($where, $offset, $pageResults, $search, $order );
         
        $totalRows = count($toursCollection->getA($where, -1, 0, $search ));
        $totalRows = ($totalRows == 0)? 1 :$totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl("index.php?c=tours&perPage={$pageResults}&category={$category}&orderBy={$orderBy}&search={$search}");

        $data['categories'] = $categories;
        $data['tours'] = $tours;
        $data['paginator'] = $paginator;
        $data['pageResults'] = $pageResults;
        $data['orderBy'] = $orderBy;
        $data['search'] = $search;

        $this->loadView('tours/list.php', $data);

    }

    public function insert()
    {
        $categoriesCollection = new CategoriesCollection();
        $categories = $categoriesCollection->get();

        $viewData = array();
        $imageErrors = array();
        $errors = array();
        $data = array(
            'category_id' => '',
            'name'        => '',
            'description' => '',
            'image'       => '',
        );

        if(isset($_POST['submit'])) {
            $data = array(
                'category_id' => $_POST['category'],
                'name'        => $_POST['name'],
                'description' => $_POST['description'],
                'image'       => '',
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
                $entity = new TourEntity();
                $toursCollection = new ToursCollection();

                $entity->inIt($data);
                $toursCollection->save($entity);


                if(isset($_FILES['image'])) {
                    move_uploaded_file($imagePath, __DIR__.'/../../../admin/uploads/' . $imageName);
                }
                header('Location: index.php?c=tours');
            }

        }
        $viewData['errors'] = $errors;
        $viewData['data'] = $data;
        $viewData['imageErrors'] = $imageErrors;
        $viewData['categories'] = $categories;

        $this->loadView('tours/insert.php', $viewData);

    }

    public function delete()
    {
         if(!isset($_GET['id'])) {
             header('Location: index.php?c=tours');
             die;
         }
        $toursCollection = new ToursCollection();
        $tour = $toursCollection->getOne($_GET['id']);

        if(is_null($tour)) {
            header('Location: index.php?c=tours');
            die;
        }
        $imageName = $tour->getImage();

        $toursCollection->delete($tour->getId());
        unlink(__DIR__.'/../../../admin/uploads/'.$imageName);
        header('Location: index.php?c=tours');die;

    }



    public function insertInfo()
    {
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=tours');
            die;
        }

        $TourInfoCollection = new ToursInfoCollection();
        $where = array('tours_id' => $_GET['id']);
        $collection = $TourInfoCollection->get($where);

        if(is_null($collection)) {
            header('Location: index.php?c=tours');
            die;
        }
        $viewData  = array();
        $errors = array();
        $data = array(
            'day_1' => '',
            'day_2' => '',
            'day_3' => '',
            'day_4' => '',
            'day_5' => '',
            'day_6' => '',
            'price_includes' => '',
            'price_excludes' => '',
            'additional_info' => '',
            'price' => '',
            'tours_id' => '',
        );

        if(isset($_POST['submit'])) {

            $data = array(
                'day_1' => $_POST['day1'],
                'day_2' => $_POST['day2'],
                'day_3' => $_POST['day3'],
                'day_4' => $_POST['day4'],
                'day_5' => $_POST['day5'],
                'day_6' => $_POST['day6'],
                'price_includes' => $_POST['priceIncludes'],
                'price_excludes' => $_POST['priceExcludes'],
                'additional_info' => $_POST['additionalInfo'],
                'price' => $_POST['price'],
                'tours_id' => $_GET['id'],
            );

            if (strlen(trim($_POST['day1'])) < 5 || strlen(trim($_POST['day1']) > 5000)) {
                $errors['day1'] = 'Invalid  length';
            }

            if (strlen(trim($_POST['day2'])) < 5 || strlen(trim($_POST['day2']) > 5000)) {
                $errors['day2'] = 'Invalid   length';
            }
            if (strlen(trim($_POST['day3'])) < 5 || strlen(trim($_POST['day3']) > 5000)) {
                $errors['day3'] = 'Invalid   length';
            }
            if (strlen(trim($_POST['day4'])) < 5 || strlen(trim($_POST['day4']) > 5000)) {
                $errors['day4'] = 'Invalid   length';
            }

            if (strlen(trim($_POST['priceIncludes'])) < 5 || strlen(trim($_POST['priceIncludes']) > 5000)) {
                $errors['priceIncludes'] = 'Invalid   length';
            }
            if (strlen(trim($_POST['priceExcludes'])) < 5 || strlen(trim($_POST['priceExcludes']) > 5000)) {
                $errors['priceExcludes'] = 'Invalid   length';
            }
            if (strlen(trim($_POST['additionalInfo'])) < 5 || strlen(trim($_POST['additionalInfo']) > 5000)) {
                $errors['additionalInfo'] = 'Invalid   length';
            }
            if (strlen(trim($_POST['price'])) < 1 || strlen(trim($_POST['price']) > 10000)) {
                $errors['price'] = 'Invalid   length';
            }

            if(empty($errors)) {
                $entity = new TourInfoEntity();
                $entity->init($data);
                $TourInfoCollection->save($entity);
                header('Location: index.php?c=tours');
            }
        }
        $viewData['data'] = $data;
        $viewData['errors'] = $errors;

        $this->loadView('tours/insertInfo.php', $viewData);
    }

    public function tourImages() 
    {

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=tours');
        }
        $viewData = array();
        $imageCollection = new ToursImagesCollection();
        $where = array('tours_id' => (int)$_GET['id']);
        $images = $imageCollection->get($where);
        
        $toursCollection = new ToursCollection();
        $tour = $toursCollection->getA();

        if(empty($tour)) {
            header('Location: index.php?c=tours');
            die;
        }

        $imageErrors = array();
        if (isset($_FILES['image'])) {
            $imageName = $_FILES['image']['name'];

            $imageType = $_FILES['image']['type'];
            $imageSize = $_FILES['image']['size'];
            $imagePath = $_FILES['image']['tmp_name'];
            $extension = strtolower(end(explode('/', $imageType)));
            $imageName = sha1(sha1(time()) . sha1($imageName)) . '.' . $extension;
            $allow = array('gif', 'jpg', 'jpeg', 'png');

            if (!in_array($extension, $allow)) {
                $imageErrors['extension'] = 'Wrong extension';
            }
            if ($imageSize > 100000000) {
                $imageErrors['size'] = 'Image is too big!';
            }

            if (empty($imageErrors)) {
                $data = array(
                    'tours_id' => $_GET['id'],
                    'image'    => $imageName
                );

                $entity = new TourImageEntity();
                $entity->InIt($data);

                $imageCollection->save($entity);

                move_uploaded_file($imagePath, 'uploads/tours/' . $imageName);
                header("Location: index.php?c=tours&m=tourImages&id={$_GET['id']}");
            }
        }
        $viewData['images'] = $images;
        $viewData['imageErrors'] = $imageErrors;

        $this->loadView('tours/tourImages.php', $viewData);

    }

    public function deleteImage()
    {
        if (!isset($_GET['id'])) {
            header('Location: index.php?c=tours');
        }

        //Proverka dali ima Image s takova id
        $toursImagesCollection = new ToursImagesCollection();
        $image = $toursImagesCollection->getOne($_GET['id']);
        if(empty($image)) {
            header('Location: index.php?c=tours');
        }

        //Iztriwane na Image ot bazata kato zapis
        $toursImagesCollection->delete((int)$_GET['id']);

        //Iztrivane na Image Fizicheski
        unlink("uploads/tours/{$image->getImage()}");
        header("Location: index.php?c=tours&m=tourImages&id={$image->getToursId()}");


    }
}
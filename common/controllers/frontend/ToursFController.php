<?php

class ToursFController extends Controller
{
    public function index()
    {
        $data = array();
        $search = (isset($_GET['search'])) ? htmlspecialchars(trim($_GET['search'])) : '';
        $toursCollection = new ToursCollection();
        $categoriesCollection = new CategoriesCollection();
        $categories = $categoriesCollection->get();

        $where = array();
        if (isset($_GET['category'])) {
            $_GET['category'] = (int)$_GET['category'];
            if ($_GET['category'] === 0) {
                $where = array();
            }
            if ($_GET['category'] !== 0) {
                $where = array('category_id' => $_GET['category']);
            }

        }

        $pageResults = (isset($_GET['perPage'])) ? (int)$_GET['perPage'] : 0;

        switch ($pageResults) {
            case 5:
                $pageResults = 5;
                break;
            case 100:
                $pageResults = 100;
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


        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1)*$pageResults;
        $tours = $toursCollection->getF($where, $offset, $pageResults, $search, $order);

        $totalRows = count($toursCollection->getF($where, -1, 0, $search));
        $totalRows = ($totalRows == 0) ? 1 : $totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl("index.php?c=toursf&perPage={$pageResults}&category={$category}&orderBy={$orderBy}&search={$search}");

        $data['categories'] = $categories;
        $data['tours'] = $tours;
        $data['paginator'] = $paginator;
        $data['pageResults'] = $pageResults;
        $data['orderBy'] = $orderBy;
        $data['search'] = $search;


        $this->loadFrontView('tours/list.php', $data);
    }

    public function latestOffers()
    {
        $viewData = array();

        $toursCollection = new ToursCollection();
        $tours = $toursCollection->getLast6();

        $viewData['tours'] = $tours;

        $this->loadFrontView('tours/latestOffers.php', $viewData);
    }
    
    public function singleTour() 
    {
        $viewData = array();
        if(!isset($_GET['id'])) {
            header('Location: index.php?c=toursf');
            die;
        }
        $id = $_GET['id'];
        
        $toursCollection = new ToursCollection();
        $toursInfoCollection = new ToursInfoCollection();

        $tour = $toursCollection->getOne($id);
        $tourInfo = $toursInfoCollection->getOne($id);

        $toursImagesCollection = new ToursImagesCollection();

        $where = array('tours_id' => (int)$_GET['id']);

        $images = $toursImagesCollection->get($where);
        
        $viewData['tour'] = $tour;
        $viewData['tourInfo'] = $tourInfo;
        $viewData['images'] = $images;

        $this->loadFrontView('tours/singleTour.php', $viewData);
    }
}
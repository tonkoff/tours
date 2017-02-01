<?php

class HomeController extends Controller
{
    public function index() 
    {
        $viewData = array();

        $toursCollection = new ToursCollection();
        //$tours = $toursCollection->get(array(), $limit = -1, $offset = -0, $like = null, $orderBy = array());
        $toursRand = $toursCollection->getRand3();
        $blogCollection = new BlogCollection();
        $blogResults = $blogCollection->getLast2();
        $categoriesCollection = new CategoriesCollection();

        $categories = $categoriesCollection->get();
        
        $viewData['toursRand'] = $toursRand;
        $viewData['blogResults'] = $blogResults;
        $viewData['categories'] = $categories;
        
        $this->loadFrontView('home.php', $viewData);
         

    }
}
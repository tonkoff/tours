<?php

class ToursCollection extends Collection
{
    protected $table = 'tours';
    protected $entity = 'TourEntity';

    public function getA($where = array(), $limit = -1, $offset = 0, $like = '', $orderBy = array())
    {
        $sql = "
            SELECT
              t.*,
              c.name as category_name
            FROM {$this->table} as t";
        $sql .= " JOIN categories as c ON c.id = t.category_id ";
        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND  {$key} = '{$value}' ";
            }
        }

        if ($like != '') {
            $sql .= " AND t.name LIKE '%{$like}%' ";
        }


        if (!empty($orderBy)) {
            $sql .= " ORDER BY {$orderBy[0]} {$orderBy[1]}  ";
        }


        if($limit > -1 && $offset > 0) {
            $sql .= " LIMIT {$limit} , {$offset} ";
        }


        $result = $this->db->query($sql);

        if (!$result) {
            $this->db->error();
        }

        $array = array();
        while ($row = $this->db->translate($result)) {
            $entity = new $this->entity();
            $entity->init($row);

            $array[] = $entity;
        }

        return $array;
    }
    
        
    public function getF($where = array(), $limit= -1, $offset= -0, $like, $orderBy = array())
    {
        $sql = "SELECT
                t.*,
                c.name as category_name,
                tr.price as tour_price
                FROM {$this->table} as t";
        $sql.= " JOIN categories as c ON c.id = t.category_id ";
        $sql.= " JOIN tours_info as tr ON t.id = tr.tours_id ";

        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND {$key} = '{$value}' ";
            }
        }

        $sql.= " AND t.name LIKE '%{$like}%'";

        if(!empty($orderBy)) {
            $sql.= " ORDER BY {$orderBy[0]} {$orderBy[1]} ";
        }

        if($limit> -1 && $offset >0) {
            $sql.= " LIMIT {$limit} , {$offset} ";
        }
        
        $result = $this->db->query($sql);

        if(!$result) {
            $this->db->error();
        }

        $array = array();

        while ($row = $this->db->translate($result)) {
            $entity = new $this->entity();
            $entity->InIt($row);

            $array[]= $entity;
        }

        return $array;
    }


    public function getLast6() {
        $sql = "SELECT
               tours.*,
               tours_info.price as tour_price     
               FROM tours
               JOIN tours_info
               ON
               tours.id = tours_info.tours_id
               ORDER BY id DESC 
               LIMIT 6";

        $result = $this->db->query($sql);
        if(!$result) {
            $this->db->error();
        }
        $array = array();

        while($row = $this->db->translate($result)) {
            $entity = new $this->entity();
            $entity->Init($row);
            $array[] = $entity;
        }
        return $array;
    }

    public function getRand3()
    {
        $sql = "SELECT * FROM `tours` 
                order By rand()
                limit 3";

        $result = $this->db->query($sql);
        if(!$result) {
            $this->db->error();
        }
        $array = array();

        while($row = $this->db->translate($result)) {
            $entity = new $this->entity();
            $entity->inIt($row);
            $array[] = $entity;
        }
        return $array;
    }



    public function save(Entity $entity)
    {
        $data = array(
            'name' => $entity->getName(),
            'description' => $entity->getDescription(),
            'image' => $entity->getImage(),
            'category_id' =>  $entity->getCategoryId(),
        );

        if($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $this->insert($data);
        }
    }
}


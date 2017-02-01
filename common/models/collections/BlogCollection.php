<?php

class BlogCollection extends Collection
{
      protected $table = 'blog';
      protected $entity= 'BlogEntity';

      public function getLast2()
      {
           $sql= "SELECT * FROM `blog`
                  ORDER by id DESC
                  limit 2"; 

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

    public function get($where = array())
    {
        $sql = "SELECT * FROM {$this->table}";

        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND {$key} = '{$value}' ";
            }
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
    
    
    
      public function save(Entity $entity )
      {
            $data = array(
                'image'       => $entity->getImage(),
                'description' => $entity->getDescription() ,
                'name'        => $entity->getName(),
                'created_at'  => $entity->getCreatedAt(),
                //'user_id'     =>$_SESSION['user']['id'],
                'user_id'     =>$entity->getUserId(),
            );
            if($entity->getId() != null) {
                  $this->update($entity->getId(), $data);
            } else {

                  $this->insert($data);
            }
      }
}
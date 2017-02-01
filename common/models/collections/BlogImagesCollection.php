<?php

class BlogImagesCollection extends Collection
{
    protected $table = 'blog_images';
    protected $entity = 'BlogImageEntity';


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




    public function save(Entity $entity)
    {
         $data = array(
             'id' => $entity->getId(),
             'blog_post_id' => $entity->getBlogPostId(),
             'image'   => $entity->getImage(),
         );
        
        if($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $this->insert($data);
        }
    }
}

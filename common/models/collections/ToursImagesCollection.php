<?php

class ToursImagesCollection extends Collection
{

    protected $table = 'tours_images';
    protected $entity = 'TourImageEntity';


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
            'tours_id' => $entity->getToursId(),
            'image'   => $entity->getImage(),
        );

        if($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $this->insert($data);
        }
    }



}

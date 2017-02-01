<?php

class ToursInfoCollection extends Collection
{

    protected $table = 'tours_info';
    protected $entity = 'TourInfoEntity';

    public  function getOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE tours_id = '{$id}'";
        $result = $this->db->query($sql);

        if(mysqli_num_rows($result) == 0) {
            $this->db->error();
        }

        $entity = new $this->entity ;
        $entity->InIt($this->db->translate($result));

        return $entity;
    }






    public function save(Entity $entity)
    {
        $data = array(
             
            'day_1' =>  $entity->getDay1(),
            'day_2' =>  $entity->getDay2(),
            'day_3' =>  $entity->getDay3(),
            'day_4' =>  $entity->getDay4(),
            'day_5' =>  $entity->getDay5(),
            'day_6' =>  $entity->getDay6(),
            'price_includes' => $entity->getPriceIncludes(),
            'price_excludes' => $entity->getPriceExcludes(),
            'additional_info' => $entity->getAdditionalInfo(),
            'price' => $entity->getPrice(),
            'tours_id' => $entity->getToursId(),
        );

        if($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $this->insert($data);
        }
    }


}
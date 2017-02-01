<?php   

class ContactsCollection extends Collection
{
    protected $table = 'contacts';
    protected $entity = 'ContactEntity';

    public function get($where = array(), $limit= -1, $offset= -0, $like)
    {
        $sql = "SELECT * FROM {$this->table}";


        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND {$key} = '{$value}' ";
            }
        }
        
        if(!empty($like)) {
            $sql.= " WHERE 1 AND status LIKE '%{$like}%'";
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
    
    
    public function save(Entity $entity)
    {
        $data = array(
            'name' => $entity->getName(),
            'email' => $entity->getEmail(),
            'phone' => $entity->getPhone(),
            'message' => $entity->getMessage(),
            'status'  => $entity->getStatus(),
        );
        
        if($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $this->insert($data);
        }
    }
}
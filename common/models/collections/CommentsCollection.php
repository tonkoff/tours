<?php  

class CommentsCollection extends Collection 
{
    protected $table = 'comments';
    protected $entity = 'CommentEntity';


    public function get($where = array())
    {
        $sql = "SELECT
                c.*,
                cl.username as name
                FROM {$this->table} as c";

        
        $sql.= " JOIN clients as cl ON c.clients_id = cl.id ";



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





    public  function getOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE blog_post_id = '{$id}'";
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
           'blog_post_id'  => $entity->getBlogPostId(),
           'clients_id'    => $entity->getClientsId(),
           'description'   => $entity->getDescription(),
           'created_at'    => $entity->getCreatedAt(),
            'approve'      => $entity->getApprove(),
        );
        if($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {

            $this->insert($data);
        }
    }
}
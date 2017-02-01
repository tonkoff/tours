<?php


class ClientsCollection extends Collection
{

    protected $table = 'clients';
    protected $entity = 'ClientEntity';

    public function checkUsername($username)
    {
        $sql = "SELECT * FROM {$this->table}
                Where username = '{$username}'";

        $result = $this->db->query($sql);

        if(mysqli_num_rows($result) > 0) {
            return false;

        }
        return true;
    }




// SAivane na usera

    public function save(Entity $entity )
    {
        $data = array(
            'username' => $entity->getUsername(),
            'description' => $entity->getDescription(),
            'email'     => $entity->getEmail(),

        );
        if($entity->getId() != null) {
            $this->update($entity->getId(), $data);
        } else {
            $data['password'] = $entity->getPassword();
            $this->insert($data);
        }
    }



}

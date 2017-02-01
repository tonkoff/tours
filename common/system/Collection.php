<?php

abstract class Collection
{
    protected $db = null;
    protected $table = 'table';
    protected $entity = 'entity';


    abstract  public  function  save(Entity $entity);


    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    public  function getOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = '{$id}'";
        $result = $this->db->query($sql);

        if(mysqli_num_rows($result) == 0) {
            $this->db->error();
        }

        $entity = new $this->entity ;
        $entity->InIt($this->db->translate($result));

        return $entity;
    }


    public function get($where = array(), $limit= -1, $offset= -0)
    {
        $sql = "SELECT * FROM {$this->table}";

        if (!empty($where)) {
            $sql.= " WHERE 1 ";
            foreach ($where as $key => $value) {
                $sql.= " AND {$key} = '{$value}' ";
            }
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

    public function  insert($data)
    {
        $sql = "INSERT INTO {$this->table} SET ";
        $i= 0 ;
        $count = count($data);
        foreach ($data as $key=> $value) {
            ++$i;
            if($i == $count) {
                $sql.= " {$key} = '{$value}'";
            } else {
                $sql.= " {$key} = '{$value}',";
            }
        }
        $this->db->query($sql);
    }

    public  function  update($id, $data)
    {
     $sql = "UPDATE {$this->table} SET ";
     $i= 0;
     $count = count($data);
        foreach ($data as $key=> $value) {
        ++$i;
        if($i == $count) {
            $sql.= "{$key} = '{$value}'";
        } else {
            $sql.= "{$key} = '{$value}',";
        }
     }
        $sql.= " WHERE id = '{$id}' ";
        $this->db->query($sql);
        return $this->db->last_Id();
    }

    public  function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = '{$id}'";

        $this->db->query($sql);
    }

}
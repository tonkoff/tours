<?php  

class CommentEntity extends Entity 
{
    private $id;
    private $blogPostId;
    private $clientsId;
    private $description;
    private $createdAt;
    private $name;
    private $approve;

    /**
     * @return mixed
     */
    public function getApprove()
    {
        return $this->approve;
    }

    /**
     * @param mixed $approve
     */
    public function setApprove($approve)
    {
        $this->approve = $approve;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBlogPostId()
    {
        return $this->blogPostId;
    }

    /**
     * @param mixed $blogPostId
     */
    public function setBlogPostId($blogPostId)
    {
        $this->blogPostId = $blogPostId;
    }

    /**
     * @return mixed
     */
    public function getClientsId()
    {
        return $this->clientsId;
    }

    /**
     * @param mixed $clientsId
     */
    public function setClientsId($clientsId)
    {
        $this->clientsId = $clientsId;
    }

    /**
     
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    
    
}
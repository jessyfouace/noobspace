<?php
class Commentary
{
    protected $id;
    protected $nameCommentary;
    protected $commentary;
    protected $idActu;

    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of nameCommentary
     *
     * @return  self
     */
    public function setNameCommentary($nameCommentary)
    {
        $this->nameCommentary = $nameCommentary;

        return $this;
    }

    /**
     * Set the value of commentary
     *
     * @return  self
     */
    public function setCommentary($commentary)
    {
        $this->commentary = $commentary;

        return $this;
    }

    /**
     * Set the value of idActu
     *
     * @return  self
     */
    public function setIdActu($idActu)
    {
        $this->idActu = $idActu;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nameCommentary
     */
    public function getNameCommentary()
    {
        return $this->nameCommentary;
    }

    /**
     * Get the value of commentary
     */
    public function getCommentary()
    {
        return $this->commentary;
    }

    /**
     * Get the value of idActu
     */
    public function getIdActu()
    {
        return $this->idActu;
    }
}

<?php
class User
{
    protected $id;
    protected $name;
    protected $password;
    protected $forgotPassword;
    protected $verifConnect;
    protected $admin;
    protected $mail;

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
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of verifConnect
     */
    public function getVerifConnect()
    {
        return $this->verifConnect;
    }

    /**
     * Get the value of admin
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $id = (int) $id;
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of verifConnect
     *
     * @return  self
     */
    public function setVerifConnect($verifConnect)
    {
        $verifConnect = (int) $verifConnect;
        $this->verifConnect = $verifConnect;

        return $this;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */
    public function setAdmin($admin)
    {
        $admin = (int) $admin;
        $this->admin = $admin;

        return $this;
    }

    /**
     * Set the mail
     *
     * @return  self
     */
    public function setMail(string $mail)
    {
        $this->mail = $mail;

        return $this;
    }
}

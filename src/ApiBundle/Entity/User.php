<?php

namespace ApiBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ApiResource(itemOperations={
 *     "get"={"method"="GET", "path"="/user/{id}", "requirements"={"id"="\d+"}},
 * })
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string")
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string")
     */
    private $password;


    /**
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Message", mappedBy="user")
     */
    private $messages;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

    public function addMessage(Message $message)
    {
        $this->messages->add($message);
    }

    public function removeMessage(Message $message)
    {
        $this->messages->removeElement($message);
    }
}

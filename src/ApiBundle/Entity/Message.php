<?php

namespace ApiBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Message
 *
 * @ApiResource(itemOperations={
 *     "get"={"method"="GET", "path"="/message/{id}", "requirements"={"id"="\d+"}},
 * })
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="message", type="string")
     */
    private $message;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     *
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\User", inversedBy="messages")
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Article", inversedBy="messages")
     */
    private $article;


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
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }
}

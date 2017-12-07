<?php

namespace ApiBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ApiResource(itemOperations={
 *     "get"={"method"="GET", "path"="/article/{id}", "requirements"={"id"="\d+"}},
 * })
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="sujet", type="string")
     */
    private $sujet;

    /**
     *
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Forum", inversedBy="articles")
     */
    private $forum;

    /**
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Message", mappedBy="article")
     */
    private $messages;

    /**
     * Article constructor.
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
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * @return mixed
     */
    public function getForum()
    {
        return $this->forum;
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

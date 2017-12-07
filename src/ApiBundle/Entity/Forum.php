<?php

namespace ApiBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Forum
 *
 * @ApiResource(itemOperations={
 *     "get"={"method"="GET", "path"="/forum/{id}", "requirements"={"id"="\d+"}},
 * })
 *
 * @ORM\Table(name="forum")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ForumRepository")
 */
class Forum
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
     * @ORM\Column(name="titre", type="string")
     */
    private $titre;

    /**
     *
     * @ORM\OneToMany(targetEntity="ApiBundle\Entity\Article", mappedBy="forum")
     */
    private $articles;

    /**
     * Forum constructor.
     */
    public function __construct()
    {
        $this->articles = new ArrayCollection();
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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    public function addArticle(Article $article)
    {
        $this->articles->add($article);
    }

    public function removeArticle(Article $article)
    {
        $this->articles->removeElement($article);
    }
}

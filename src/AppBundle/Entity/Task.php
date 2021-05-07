<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 */
class Task
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="min_Price", type="string", length=255)
     */
    private $minPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="max_price", type="string", length=255)
     */
    private $maxPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="type_project", type="string", length=255)
     */
    private $typeProject;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

      /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="task")
     * @ORM\JoinColumn(name="user_id", nullable=false)
    */
    private $user;


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
     * Set name
     *
     * @param string $name
     *
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Task
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Task
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set minPrice
     *
     * @param string $minPrice
     *
     * @return Task
     */
    public function setMinPrice($minPrice)
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    /**
     * Get minPrice
     *
     * @return string
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * Set maxPrice
     *
     * @param string $maxPrice
     *
     * @return Task
     */
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get maxPrice
     *
     * @return string
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * Set typeProject
     *
     * @param string $typeProject
     *
     * @return Task
     */
    public function setTypeProject($typeProject)
    {
        $this->typeProject = $typeProject;

        return $this;
    }

    /**
     * Get typeProject
     *
     * @return string
     */
    public function getTypeProject()
    {
        return $this->typeProject;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Task
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Task
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }
}


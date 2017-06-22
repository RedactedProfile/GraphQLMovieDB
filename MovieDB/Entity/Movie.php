<?php

namespace MovieDB\Entity;

/**
 * @Entity
 * @Table
 * Class Person
 * @package MovieDB\Entity
 */
class Movie
{
    /**
     * @Column(type="string")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @ManyToMany(targetEntity="MovieDB\Entity\Person", mappedBy="actorOf")
     */
    protected $actors;

    /**
     * @ManyToMany(targetEntity="MovieDB\Entity\Person", mappedBy="writerOf")
     */
    protected $writers;

    /**
     * @ManyToMany(targetEntity="MovieDB\Entity\Person", mappedBy="directorOf")
     */
    protected $directors;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->writers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->directors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string
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
     * @return Movie
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
     * Add actor
     *
     * @param \MovieDB\Entity\Person $actor
     *
     * @return Movie
     */
    public function addActor(\MovieDB\Entity\Person $actor)
    {
        $this->actors[] = $actor;

        return $this;
    }

    /**
     * Remove actor
     *
     * @param \MovieDB\Entity\Person $actor
     */
    public function removeActor(\MovieDB\Entity\Person $actor)
    {
        $this->actors->removeElement($actor);
    }

    /**
     * Get actors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Add writer
     *
     * @param \MovieDB\Entity\Person $writer
     *
     * @return Movie
     */
    public function addWriter(\MovieDB\Entity\Person $writer)
    {
        $this->writers[] = $writer;

        return $this;
    }

    /**
     * Remove writer
     *
     * @param \MovieDB\Entity\Person $writer
     */
    public function removeWriter(\MovieDB\Entity\Person $writer)
    {
        $this->writers->removeElement($writer);
    }

    /**
     * Get writers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWriters()
    {
        return $this->writers;
    }

    /**
     * Add director
     *
     * @param \MovieDB\Entity\Person $director
     *
     * @return Movie
     */
    public function addDirector(\MovieDB\Entity\Person $director)
    {
        $this->directors[] = $director;

        return $this;
    }

    /**
     * Remove director
     *
     * @param \MovieDB\Entity\Person $director
     */
    public function removeDirector(\MovieDB\Entity\Person $director)
    {
        $this->directors->removeElement($director);
    }

    /**
     * Get directors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDirectors()
    {
        return $this->directors;
    }
}

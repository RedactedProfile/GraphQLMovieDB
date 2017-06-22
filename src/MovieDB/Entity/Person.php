<?php

namespace MovieDB\Entity;

/**
 * @Entity
 * @Table
 * Class Person
 * @package MovieDB\Entity
 */
class Person
{
    /**
     * @Column(type="string")
     * @Id
     * @GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @ManyToMany(targetEntity="MovieDB\Entity\Movie", inversedBy="actors")
     * @JoinTable(name="movie_actors")
     */
    protected $actorOf;

    /**
     * @ManyToMany(targetEntity="MovieDB\Entity\Movie", inversedBy="writers")
     * @JoinTable(name="movie_writers")
     */
    protected $writerOf;

    /**
     * @ManyToMany(targetEntity="MovieDB\Entity\Movie", inversedBy="directors")
     * @JoinTable(name="movie_directors")
     */
    protected $directorOf;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actorOf = new \Doctrine\Common\Collections\ArrayCollection();
        $this->writerOf = new \Doctrine\Common\Collections\ArrayCollection();
        $this->directorOf = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Person
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
     * Add actorOf
     *
     * @param \MovieDB\Entity\Movie $actorOf
     *
     * @return Person
     */
    public function addActorOf(\MovieDB\Entity\Movie $actorOf)
    {
        $this->actorOf[] = $actorOf;

        return $this;
    }

    /**
     * Remove actorOf
     *
     * @param \MovieDB\Entity\Movie $actorOf
     */
    public function removeActorOf(\MovieDB\Entity\Movie $actorOf)
    {
        $this->actorOf->removeElement($actorOf);
    }

    /**
     * Get actorOf
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActorOf()
    {
        return $this->actorOf;
    }

    /**
     * Add writerOf
     *
     * @param \MovieDB\Entity\Movie $writerOf
     *
     * @return Person
     */
    public function addWriterOf(\MovieDB\Entity\Movie $writerOf)
    {
        $this->writerOf[] = $writerOf;

        return $this;
    }

    /**
     * Remove writerOf
     *
     * @param \MovieDB\Entity\Movie $writerOf
     */
    public function removeWriterOf(\MovieDB\Entity\Movie $writerOf)
    {
        $this->writerOf->removeElement($writerOf);
    }

    /**
     * Get writerOf
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWriterOf()
    {
        return $this->writerOf;
    }

    /**
     * Add directorOf
     *
     * @param \MovieDB\Entity\Movie $directorOf
     *
     * @return Person
     */
    public function addDirectorOf(\MovieDB\Entity\Movie $directorOf)
    {
        $this->directorOf[] = $directorOf;

        return $this;
    }

    /**
     * Remove directorOf
     *
     * @param \MovieDB\Entity\Movie $directorOf
     */
    public function removeDirectorOf(\MovieDB\Entity\Movie $directorOf)
    {
        $this->directorOf->removeElement($directorOf);
    }

    /**
     * Get directorOf
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDirectorOf()
    {
        return $this->directorOf;
    }
}

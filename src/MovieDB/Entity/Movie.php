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
     * @GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @Column(type="string")
     */
    protected $name;

    /**
     * @ManyToMany(targetEntity="MovieDB\Entity\Person")
     */
    protected $actors;

    /**
     * @ManyToMany(targetEntity="MovieDB\Entity\Person")
     */
    protected $writers;

    /**
     * @ManyToMany(targetEntity="MovieDB\Entity\Person")
     */
    protected $directors;
}
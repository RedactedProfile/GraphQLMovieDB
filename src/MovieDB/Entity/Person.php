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
     * @ManyToMany(targetEntity="MovieDB\Entity\Movie")
     */
    protected $movies;
}
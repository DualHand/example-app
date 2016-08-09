<?php

namespace AppBundle\Entity;

use Acme\ReusableBundle\Entity\AbstractPurchasable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Album.
 *
 * @ORM\Table(name="app_album")
 * @ORM\Entity()
 */
class Album extends AbstractPurchasable
{
    use ORMBehaviors\Sluggable\Sluggable;

    /**
     * @ORM\OneToMany(targetEntity="Song", mappedBy="album")
     */
    protected $songs;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->songs = new ArrayCollection();
    }

    /**
     * Add song.
     *
     * @param Song $song
     *
     * @return Album
     */
    public function addSong(Song $song)
    {
        $this->songs[] = $song;

        return $this;
    }

    /**
     * Remove song.
     *
     * @param Song $song
     */
    public function removeSong(Song $song)
    {
        $this->songs->removeElement($song);
    }

    /**
     * Get songs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSongs()
    {
        return $this->songs;
    }

    /**
     * @return array
     */
    public function getSluggableFields()
    {
        return array('title');
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}

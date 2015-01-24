<?php

namespace Lesnictwo\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uzytkownik
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Lesnictwo\UserBundle\Entity\UzytkownikRepository")
 */
class Uzytkownik
{
    /**
     * @var integer
     *
     * @ORM\Column(name="uzytkownik_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $uzytkownikId;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=10)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="haslo", type="string", length=15)
     */
    private $haslo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=20)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="rodzaj", type="string", length=10)
     */
    private $rodzaj;

    /**
     * @var string
     *
     * @ORM\Column(name="imie", type="string", length=20)
     */
    private $imie;

    /**
     * @var string
     *
     * @ORM\Column(name="nazwisko", type="string", length=20)
     */
    private $nazwisko;

    /**
     * @var integer
     *
     * @ORM\Column(name="lesnictwo", type="smallint")
     */
    private $lesnictwo;



    /**
     * Get uzytkownikId
     *
     * @return integer 
     */
    public function getUzytkownikId()
    {
        return $this->uzytkownikId;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Uzytkownik
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set haslo
     *
     * @param string $haslo
     * @return Uzytkownik
     */
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;

        return $this;
    }

    /**
     * Get haslo
     *
     * @return string 
     */
    public function getHaslo()
    {
        return $this->haslo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Uzytkownik
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set rodzaj
     *
     * @param string $rodzaj
     * @return Uzytkownik
     */
    public function setRodzaj($rodzaj)
    {
        $this->rodzaj = $rodzaj;

        return $this;
    }

    /**
     * Get rodzaj
     *
     * @return string 
     */
    public function getRodzaj()
    {
        return $this->rodzaj;
    }

    /**
     * Set imie
     *
     * @param string $imie
     * @return Uzytkownik
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string 
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set nazwisko
     *
     * @param string $nazwisko
     * @return Uzytkownik
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    /**
     * Get nazwisko
     *
     * @return string 
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * Set lesnictwo
     *
     * @param integer $lesnictwo
     * @return Uzytkownik
     */
    public function setLesnictwo($lesnictwo)
    {
        $this->lesnictwo = $lesnictwo;

        return $this;
    }

    /**
     * Get lesnictwo
     *
     * @return integer 
     */
    public function getLesnictwo()
    {
        return $this->lesnictwo;
    }

}

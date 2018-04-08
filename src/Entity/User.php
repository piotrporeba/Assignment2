<?php
/**
 * user class
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * user implements serialisable
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * id
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * username
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * password
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * roles
     * @ORM\Column(type="json_array")
     */
    private $roles = [];

    /**
     * getRoles
     * @return array
     */
    public function getRoles(){
        return $this->roles;
    }

    /**
     * getSalt
     * @return null|string
     */
    public function getSalt()
    {
        // no salt needed since we are using bcrypt
        return null;
    }

    /**
     * eraseCredentials
     */
    public function eraseCredentials()
    {
        return null;
    }

    /**
     * serialize
     * @return string
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * unserialize
     * @param string $serialized
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }



    /**
     * Set roles
     * @param array $roles *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }


    /**
     * getId
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * setId
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * getUserName
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * setUserName
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * getPassword
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * setPassword
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

}

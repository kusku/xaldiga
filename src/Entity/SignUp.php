<?php
// src/Entity/SignUp.php
// This is the class that will receive the form data and 
// validate it with the Validator component using constrains
namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
class SignUp
{
    /**
     * @Assert\NotBlank(message="Fullname is required")
     * @Assert\Length(
     *     min = 2,
     *     minMessage="The fullname should be at least 2 characters long",
     *     max = 6,
     *     maxMessage="The fullname cannot be longer than 6 characters"
     * )
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z ]*$/",
     *     message="The fullname should only have letters"
     * )
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }
}
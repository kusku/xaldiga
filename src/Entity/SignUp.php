<?php
// src/Entity/SignUp.php
// This is the class that will receive the form data and 
// validate it with the Validator component using constrains
namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SignUp
{
    /**
     * @Assert\NotBlank(message="El nom és obligatori")
     * @Assert\Length(
     *     min = 3,
     *     minMessage="Massa curt",
     *     max = 60,
     *     maxMessage="Massa llarg"
     * )
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z ]*$/",
     *     message="The fullname should only have letters"
     * )
     */
    protected $name;

    /**
     * @Assert\NotBlank(message="El DNI és obligatori")
     * @Assert\Length(
     *     min = 9,
     *     minMessage="La longitud és errònia",
     *     max = 9,
     *     maxMessage="La longitud és errònia"
     * )
     * @Assert\Regex(
     *     pattern="/^[0-9]{8}[A-Z]{1}$/",
     *     message="Format incorrecte. Ex: 12345678A"
     * )
     */
    protected $nif;

    /**
     * @Assert\NotBlank(message="L'adreça és obligatòria")
     * @Assert\Length(
     *     min = 5,
     *     minMessage="Massa curt",
     *     max = 70,
     *     maxMessage="Massa llarg"
     * )
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z0-9 ]*$/",
     *     message="Només pot contenir lletres i números"
     * )
     */
    protected $address;

    /**
     * @Assert\NotBlank(message="La població és obligatòria")
     * @Assert\Length(
     *     min = 5,
     *     minMessage="Massa curt",
     *     max = 70,
     *     maxMessage="Massa llarg"
     * )
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z ]*$/",
     *     message="Només pot contenir lletres"
     * )
     */
    protected $city;

    /**
     * @Assert\NotBlank(message="El codi postal és obligatori")
     * @Assert\Length(
     *     min = 5,
     *     minMessage="Massa curt",
     *     max = 5,
     *     maxMessage="Massa llarg"
     * )
     * @Assert\Regex(
     *     pattern="/^[0-9]{5}$/",
     *     message="Només pot contenir números"
     * )
     */
    protected $zipcode;

    /**
     * @Assert\NotBlank(message="La província és obligatòria")
     * @Assert\Length(
     *     min = 5,
     *     minMessage="Massa curt",
     *     max = 50,
     *     maxMessage="Massa llarg"
     * )
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z ]*$/",
     *     message="Només pot contenir lletres"
     * )
     */
    protected $province;

    /**
     * @Assert\NotBlank(message="El telèfon és obligatori")
     * @Assert\Length(
     *     min = 9,
     *     minMessage="Massa curt",
     *     max = 9,
     *     maxMessage="Massa llarg"
     * )
     * @Assert\Regex(
     *     pattern="/^[6-9]{1}[0-9]{8}$/",
     *     message="Només pot contenir números"
     * )
     */
    protected $phone;

        /**
     * @Assert\NotBlank(message="El correu electrònic és obligatori")
     * @Assert\Length(
     *     min = 6,
     *     minMessage="Massa curt",
     *     max = 50,
     *     maxMessage="Massa llarg"
     * )
     * @Assert\Regex(
     *     pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/",
     *     message="El format ha de ser exemple@exemple.com"
     * )
     */
    protected $email;

    /**
     * @Assert\NotBlank(message="El grup de Correfoc és obligatori")
     * @Assert\Length(
     *     min = 1,
     *     minMessage="Massa curt",
     *     max = 1,
     *     maxMessage="Massa llarg"
     * )
     * @Assert\Regex(
     *     pattern="/^[0-9]{1}$/",
     *     message="Només pot contenir números"
     * )
     */
    protected $correfocGroup;

    /**
     * @Assert\NotBlank(message="La secció és obligatòria")
     * @Assert\Length(
     *     min = 1,
     *     minMessage="Massa curt",
     *     max = 1,
     *     maxMessage="Massa llarg"
     * )
     * @Assert\Regex(
     *     pattern="/^[0-9]{1}$/",
     *     message="Només pot contenir números"
     * )
     */
    protected $section;

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

    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     */
    public function  setNif($nif): void
    {
        $this->nif = $nif;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function  setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function  setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param mixed $zipcode
     */
    public function  setZipcode($zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     */
    public function  setProvince($province): void
    {
        $this->province = $province;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function  setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function  setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCorrefocGroup()
    {
        return $this->correfocGroup;
    }

    /**
     * @param mixed $correfocGroup
     */
    public function  setCorrefocGroup($correfocGroup): void
    {
        $this->correfocGroup = $correfocGroup;
    }

    /**
     * @return mixed
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * @param mixed $section
     */
    public function  setSection($section): void
    {
        $this->section = $section;
    }

    public function fill($data)
    {
        $this->name = array_key_exists('name', $data) ? $data['name'] : "";
        $this->nif = array_key_exists('nif', $data) ? $data['nif'] : "";
        $this->address = array_key_exists('address', $data) ? $data['address'] : "";
        $this->city = array_key_exists('city', $data) ? $data['city'] : "";
        $this->zipcode = array_key_exists('zipcode', $data) ? $data['zipcode'] : "";
        $this->province = array_key_exists('province', $data) ? $data['province'] : "";
        $this->phone = array_key_exists('phone', $data) ? $data['phone'] : "";
        $this->email = array_key_exists('email', $data) ? $data['email'] : "";
        $this->correfocGroup = array_key_exists('correfocGroup', $data) ? $data['correfocGroup'] : "";
        $this->section = array_key_exists('section', $data) ? $data['section'] : "";
    }

    public function validate(ValidatorInterface $validator) 
    {
        $nameError = $validator->validateProperty($this, 'name');
        $nifError = $validator->validateProperty($this, 'nif');
        $addressError = $validator->validateProperty($this, 'address');
        $cityError = $validator->validateProperty($this, 'city');
        $zipcodeError = $validator->validateProperty($this, 'zipcode');
        $provinceError = $validator->validateProperty($this, 'province');
        $phoneError = $validator->validateProperty($this, 'phone');
        $emailError = $validator->validateProperty($this, 'email');
        $correfocGroupError = $validator->validateProperty($this, 'correfocGroup');
        $sectionError = $validator->validateProperty($this, 'section');

        $formErrors = [];

        if(count($nameError) > 0) {
           $formErrors['nameError'] = $nameError[0]->getMessage();
        }
        
        if(count($nifError) > 0) {
            $formErrors['nifError'] = $nifError[0]->getMessage();
        }

        if(count($addressError) > 0) {
            $formErrors['addressError'] = $addressError[0]->getMessage();
        }

        if(count($cityError) > 0) {
            $formErrors['cityError'] = $cityError[0]->getMessage();
        }

        if(count($zipcodeError) > 0) {
            $formErrors['zipcodeError'] = $zipcodeError[0]->getMessage();
        }

        if(count($provinceError) > 0) {
            $formErrors['provinceError'] = $provinceError[0]->getMessage();
        }

        if(count($phoneError) > 0) {
            $formErrors['phoneError'] = $phoneError[0]->getMessage();
        }

        if(count($emailError) > 0) {
            $formErrors['emailError'] = $emailError[0]->getMessage();
        }

        if(count($correfocGroupError) > 0) {
            $formErrors['correfocGroupError'] = $correfocGroupError[0]->getMessage();
        }

        if(count($sectionError) > 0) {
            $formErrors['sectionError'] = $sectionError[0]->getMessage();
        }

         return $formErrors;
    }
}
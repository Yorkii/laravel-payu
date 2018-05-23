<?php

namespace Yorki\Payu\Schema;

class Buyer
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $language;

    /**
     * @return string
     */
    public function getEmail()
    {
        return (string) $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = (string) $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return (string) $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = (string) $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return (string) $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = (string) $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return (string) $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = (string) $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return (string) $this->language;
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = (string) $language;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'language' => $this->getLanguage(),
        ];
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    public function fromArray(array $data)
    {
        $this->setEmail(isset($data['email']) ? $data['email'] : null);
        $this->setPhone(isset($data['phone']) ? $data['phone'] : null);
        $this->setFirstName(isset($data['firstName']) ? $data['firstName'] : null);
        $this->setLastName(isset($data['lastName']) ? $data['lastName'] : null);
        $this->setLanguage(isset($data['language']) ? $data['language'] : null);

        return $this;
    }
}

<?php

Namespace App\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;


class Users extends Model
{
    // variables
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $pass;
    public $country;
    public $phone;
    public $roles;
    public $created;
    public $updated;

    // validate email
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new Email (
                [
                    'model'   => $this,
                    'message' => 'Email is not valid',
                ]
            )
        );

        return $this->validate($validator);
    }
}
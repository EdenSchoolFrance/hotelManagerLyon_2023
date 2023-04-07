<?php

namespace Hotel\Controllers;

use Hotel\Models\UserManager;
use Hotel\Validator;

/** Class UserController **/
class UserController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new UserManager();
        $this->validator = new Validator();
    }
}

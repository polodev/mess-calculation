<?php
namespace App\Libraries;

use App\Libraries\Traits\HelperFunctions;


require __dir__ . '/data/user_data.php';
require __dir__ . '/data/role_data.php';



class Helpers {
  use HelperFunctions;
  const users = users;
  const roles = roles;
  const types = ['regular', 'common', 'others',];

}

<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Users;
use Phalcon\Security;

class SignupController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function registerAction()
    {
        $user = new Users();

        // get value
        $firstName = $this->request->getPost('firstName', 'string');
        $lastName = $this->request->getPost('lastName', 'string');
        $email = $this->request->getPost('email', 'string');
        $pass = $this->request->getPost('pass', 'string');
        $confirm = $this->request->getPost('confirm', 'string');
        $country = $this->request->getPost('country', 'string');
        $phone = $this->request->getPost('phone', 'string');

        $exist = Users::findFirst(
            [
                'conditions' => 'email = :email:',
                'bind'       => [
                    'email' => $email,
                ],
            ]
        );

        if($exist){
            echo "E-mail already exist";
            $this->view->disable();
        }
        else {
            if ($pass != $confirm){
                echo "Password doesn't match";
                $this->view->disable();
            }
            else {
                $user->firstName = $firstName;
                $user->lastName = $lastName;
                $user->email = $email;
                $user->pass = $this->security->hash($pass);
                $user->country = $country;
                $user->phone = $phone;
                $user->created = strftime('%Y-%m-%d %H:%M:%S', time());
                $user->updated = strftime('%Y-%m-%d %H:%M:%S', time());

                // Check admin
                if (strpos($user->email, "@admin.com") === true)
                {
                    $user->roles = 1; // Admin
                }
                else
                {
                    $user->roles = 0; // User
                }

                $success = $user->save();

                if ($success) {
                    $this->session->set('auth_id', $user->id);
                    $this->session->set('auth_firstName', $user->firstName);
                    $this->session->set('auth_lastName', $user->lastName);
                    $this->session->set('auth_email', $user->email);
                    $this->session->set('auth_created', $user->created);
                    $this->session->set('auth_updated', $user->updated);

                    if ($user->roles == 0) {
                        $this->response->redirect("/");
                    }
                    else if ($user->roles == 1) {
                        echo "ADMIN LOGGED IN:" . PHP_EOL;
                        echo $this->session->get("auth_firstName") . $this->session->get("auth_lastName");
                        $this->view->disable();
                    }
                    else {
                        return $this->response->redirect('login');
                    }

                } 
                else 
                {
                    echo "Sorry, the following problems were generated: " . implode('<br>', $user->getMessages());
                    $this->view->disable();
                }
            }
        }
    }
}


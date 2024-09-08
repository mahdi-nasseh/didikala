<?php

namespace Didikala\Controller;

use Didikala\Lib\Controller;
use Didikala\Model\User as UserModel;
use Illuminate\Contracts\Routing\UrlRoutable;

class User extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $data = [
                'profile' => ''
            ];
            $this->view('home/profile', $data);
        } else {
            $this->view('home/index');
        }
    }

    public function profile()
    {
        $data = [
            'profile' => ''
        ];
        $this->view('home/profile', $data);
    }

    public function orders()
    {
        $data = [
            'orders' => ''
        ];
        $this->view('home/profile', $data);
    }

    public function detail_order($order_id = 0)
    {
        if ($order_id > 0) :
            $data = [
                'order_detail' => '',
                'order_id' => $order_id,
            ];
            $this->view('home/profile', $data);
        else:
            $data = [
                'orders' => ''
            ];
            $this->view('home/profile', $data);
        endif;
    }

    public function likes()
    {
        $data = [
            'likes' => ''
        ];
        $this->view('home/profile', $data);
    }

    public function comments()
    {
        $data = [
            'comments' => ''
        ];
        $this->view('home/profile', $data);
    }

    public function address()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'address' => $_POST['address'],
                'zip_code' => $_POST['zip_code'],
                'zip_code_err' => '',
                'city' => $_POST['city'],
                'country' => $_POST['country'],
                'state' => $_POST['state'],
            ];

            if (strlen($data['zip_code']) < 10) {
                $data['zip_code_err'] = 'لطفا کد پستی را به درستی وارد کنید';
            }

            if (empty($data['zip_code_err'])) {
                $user = UserModel::find($_SESSION['user_id']);
                $user->address = $data['address'];
                $user->zip_code = $data['zip_code'];
                $user->city = $data['city'];
                $user->country = $data['country'];
                $user->state = $data['state'];
                $user->save();
                header('location:' . URLRoot . '/user');
            } else {
                $this->view('home/profile', $data);
            }
        } else {
            $data = [
                'zip_code_err' => '',
                'address' => ''
            ];
            $this->view('home/profile', $data);
        }
    }

    public function edit()
    {
        //get user for ini data
        $user = UserModel::find($_SESSION['user_id']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'edit' => '',
                'name' => trim($_POST['name']),
                'family' => trim($_POST['family']),
                'username' => trim($_POST['username']),
                'phone' => trim($_POST['phone']),
                'username_err' => '',
                'phone_err' => '',
            ];

            //phone validation
            if (strlen($data['phone']) < 11) {
                $data['phone_err'] = 'لطفا شماره موبایل خود را به درستی وارد کنید';
            }

            //username validation
            if (strlen($data['username']) < 3 || strlen($data['username']) > 30) {
                $data['username_err'] = 'نام کاربری باید حداقل دارای 3 و حداکثر دارای 30 کاراکتر باشد';
            } elseif (!preg_match("/^[a-zA-Z_][a-zA-Z0-9_]{2,29}$/", $data['username'])) {
                $data['username_err'] = 'نام کاربری میتواند دارای حروف انگلیسی، اعداد و _ باشد';
            } elseif (UserModel::where('username', '=', $data['username'])->count() > 0 && $data['username'] != $user->username) {
                $data['username_err'] = 'نام کاربری تکراری است. لطفا نام کاربری دیگری انتخاب کنید';
            }

            if (!empty($data['username_err']) || !empty($data['phone_err'])) {
                $this->view('home/profile', $data);
            } else {
                $user->username = $data['username'];
                $user->phone = $data['phone'];
                $user->name = $data['name'];
                $user->family = $data['family'];
                $user->save();
                header('Location:' . URLRoot . '/user');
            }
        } else {
            //get user for validate
            $user = UserModel::find($_SESSION['user_id']);
            //ini data
            $data = [
                'edit' => '',
                'name' => $user->name,
                'family' => $user->family,
                'username' => $user->username,
                'phone' => $user->phone,
                'username_err' => '',
                'phone_err' => '',
            ];
            $this->view('home/profile', $data);
        }
    }

    public function delete($user_id = 0){
        \Didikala\Model\User::find($user_id)->delete();
        $data = [
          'profile' => ''
        ];
        $this->view('home/profile', $data);
    }

    public function register()
    {
        //check method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //ini data
            $data = [
                'username' => trim(htmlspecialchars($_POST['username'])),
                'password' => trim(htmlspecialchars($_POST['password'])),
                'confirm_password' => trim(htmlspecialchars($_POST['confirm_password'])),
                'email' => trim(htmlspecialchars($_POST['email'])),
                'username_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'email_err' => ''
            ];
            //validate information

            //validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'لطفا ایمیل خود را وارد کنید';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'لطفا ایمیل خود را به درستی وارد کنید';
            } elseif (UserModel::where('email', '=', $data['email'])->count() > 0) {
                $data['email_err'] = 'شما قبلا با این ایمیل ثبت نام کرده اید';
            }
            //validate username
            if (empty($data['username'])) {
                $data['username_err'] = 'لطفا نام کاربری خود را وارد کنید';
            } elseif (strlen($data['username']) < 3 || strlen($data['username']) > 30) {
                $data['username_err'] = 'نام کاربری باید حداقل دارای 3 و حداکثر دارای 30 کاراکتر باشد';
            } elseif (!preg_match("/^[a-zA-Z_][a-zA-Z0-9_]{2,29}$/", $data['username'])) {
                $data['username_err'] = 'نام کاربری میتواند دارای حروف انگلیسی، اعداد و _ باشد';
            } elseif (UserModel::where('username', '=', $data['username'])->count() > 0) {
                $data['username_err'] = 'نام کاربری تکراری است. لطفا نام کاربری دیگری انتخاب کنید';
            }
            //validate pass
            if (empty($data['password'])) {
                $data['password_err'] = 'لطفا رمز عبور را وارد کنید';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'رمز عبور حداقل باید دارای شش کاراکتر باشد';
            }

            //validate confirm_pass
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'لطفا تکرار رمز عبور خود را وارد کنید';
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'تکرار رمز عبور با رمز عبور مطابقت ندارد';
            }

            //make sure error empty
            if (
                empty($data['email_err']) &&
                empty($data['username_err']) &&
                empty($data['password_err']) &&
                empty($data['confirm_password_err'])
            ) {
                $user = new UserModel();
                $user->signup($data['email'], $data['username'], $data['password']);
                $user->where('email', '=', $data['email'])->first();
                $_SESSION['user_id'] = $user->ID;
                $this->view('home/welcome');
            } else {
                $this->view('home/register', $data);
            }
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'confirm_password' => '',
                'email' => '',
                'username_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'email_err' => ''
            ];
            $this->view('home/register', $data);
        }
    }

    public function login()
    {
        //check method
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //ini data
            $data = [
                'email' => trim(htmlspecialchars($_POST['email'])),
                'password' => trim(htmlspecialchars($_POST['password'])),
                'password_err' => '',
                'email_err' => ''
            ];
            //validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'لطفا ایمیل خود را وارد کنید';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_err'] = 'لطفا ایمیل خود را به درستی وارد کنید';
            } elseif (!UserModel::where('email', '=', $data['email'])->count() > 0) {
                $data['email_err'] = 'شما قبلا با این ایمیل ثبت نام نکرده اید';
            } else {
                $user = UserModel::where('email', '=', $data['email'])->first();
            }

            if (isset($user)) {
                $userPass = $user->password;
            } else {
                $userPass = '';
            }
            //validate pass
            if (empty($data['password'])) {
                $data['password_err'] = 'لطفا رمز عبور را وارد کنید';
            } elseif (!password_verify($data['password'], $userPass)) {
                $data['password_err'] = 'رمز عبور اشتباه وارد شده اشتباه است';
            }
            //make sure error empty
            if (
                empty($data['email_err']) &&
                empty($data['password_err'])
            ) {
                $_SESSION['user_id'] = $user->ID;
                $data = [
                    'profile' => ''
                ];
                $this->view('home/profile', $data);
            } else {
                $this->view('home/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('home/login', $data);
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        $this->view('home/index');
    }

    public function editProfile()
    {
        $data = [
            'edit',
        ];
        $this->view('home/profile', $data);
    }

    public function editPassword()
    {
        die('editPass');
    }

}
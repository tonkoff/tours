<?php   

class LoginController extends Controller 
{
    public function __construct()
    {
        if($this->loggedIn()) {
            header('Location: index.php');
        }
    }
    
    public function index()
    {
         $data = array();
         $errors = array();
        
        if(isset($_POST['submit'])) {
            if(strlen($_POST['username']) <5  || strlen($_POST['username']) >50) {
                $errors['credential'] = 'Wrong credentials';
            }

            if(strlen($_POST['password']) <5  || strlen($_POST['password']) >50) {
                $errors['credential'] = 'Wrong credentials';
            }
            if(empty($errors)) {
                $usersCollection = new UsersCollection();
                $where = array('username' => trim($_POST['username']));
                $user = $usersCollection->getUser($where);

                if(!empty($user)) {
                    if($user->getPassword() == sha1(trim($_POST['password']))) {
                        $_SESSION['logged_in'] = 1;
                        $_SESSION['user'] = $user;
                        header('Location: index.php');
                        die;
                    } else {
                        $errors[] = 'Wrong Credentials';
                    }
                } else {
                    $errors[] = 'Wrong Credentials';
                }

            }
        }

        $data['errors']  = $errors;
        $this->loadView('login/login.php', $data);
        
    }

    public function logout()
    {
        $_SESSION['logged_in'] = 0;
        $_SESSION['user'] = '';
        header('Location: index.php?c=login');
        
    }
}
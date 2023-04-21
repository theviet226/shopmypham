<?php
    session_start();
    require_once("../../autoload/autoload.php");
     $db = new My_Model();
     if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // bat dau tien hanh su ly form
        $errors = array();
        $data = array();

        // kiem tra xem nguoi dung co nhap dung password
        if(isset($_POST['password']) && preg_match('/^[\w\'.-]{2,20}$/i',trim($_POST['password'])))
        {
            $password = md5($_POST['password']);
            // neu mat khau trung khop thi lu vao csdl

        }else
        {
            // mat khau khong trung khop thi thong bao ra ngoai
                $errors[] = "password";
        }
        
        if(empty($_POST['password']))
        {
            $errors[] = "password";
        }
        
        // kiem tra email co ton tai va dung dinh dang 
        if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
        {
            $email = $_POST['email'];
        }
        else
        {
            $errors[] = "email";
        }
        
        
       
        
        // neu cac truong deu ton tai thi ta tien hanh Insert vào csdl
        if(empty($errors))
        {
           
            $datas = $db->fetchwhere('user','email = "'.$email.'" AND password = "'.$password.'"' );
            
            
            if(!empty($datas))
            {
                foreach($datas as $value)
                {
                    $_SESSION['id_user'] = $value['id'];
                    $_SESSION['name_user'] = $value['name'];
                    $_SESSION['email_user'] = $value['email'];
                }

                redirect_to('site/trang-chu');

            }else{
                $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng";
                redirect_to('site/dang-nhap');
            }
         
        }
    }
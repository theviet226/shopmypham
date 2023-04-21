<?php
    session_start();
    require_once("../../autoload/autoload.php");
    $db = new My_Model();
     if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // bat dau tien hanh su ly form
            $errors = array();
            $data = array();
            // kiem tra xem nguoi dung da nhap vao ten hay chua
            if(!empty($_POST['name']))
            {
                $data['name'] = $_POST['name'];
            }
            else
            {
                $errors[]= "name";
            }
            // kiem tra xem nguoi dung co nhap dung password
            if(isset($_POST['password']) && preg_match('/^[\w\'.-]{2,20}$/i',trim($_POST['password'])))
            {
                // neu mat khau trung khop thi lu vao csdl
                if($_POST['password'] == $_POST['rpassword'])
                {
                    $data['password'] = md5($_POST['rpassword']);
                }
                else
                {
                    // mat khau khong trung khop thi thong bao ra ngoai
                    $errors[] = "password";
                }
            }
            
            if(empty($_POST['password']))
            {
                $errors[] = "password";
            }
            if(empty($_POST['rpassword']))
            {
                $errors[] = "rpassword";
            }
            // kiem tra email co ton tai va dung dinh dang 
            if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $data['email'] = $_POST['email'];
            }
            else
            {
                $errors[] = "email";
                $_SESSION['error'] = "Định dạng email không đúng";
                redirect_to('site/dang-ky');
            }
            
            
            // neu cac truong deu ton tai thi ta tien hanh Insert vào csdl
            if(empty($errors))
            {
               
                $datas = $db->fetchwhere('user','email = "'.$data['email'].'"');
                
                if(empty($datas))
                {
                    if($db->insert('user',$data)){
                        $_SESSION['success'] = " Chúc mừng bạn đã đăng ký thành công";
                        redirect_to('site/dang-ky');
                    }
                }else
                {

                    $_SESSION['error'] = "Tài khoản email đã tồn tại";
                    redirect_to('site/dang-ky');
                }
            }else {

                    $_SESSION['error'] = "Bạn cần nhập đầy đủ các trường";
                    redirect_to('site/dang-ky');
            }

        }

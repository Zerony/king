<?php
    function auth_user($context, $redirectTo="http://www.kings.ru/")
    {
        $context->load->model('Usermodel');
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $is_authorized = $context->Usermodel->authorization($username, $password);

        if ($is_authorized) {
            $context->create_session($is_authorized);
            header("Location: ".$redirectTo); /* Redirect browser */
            exit();
            echo 1;
            return;
        }
        echo $context->label->get('wrong_pass');
        return;
    }

    function create_session($user_record, $context){
        $ses_data = array(
            'login' => $user_record['name'],
            'email' => $user_record['email'],
            'role' => $user_record['role'],
            'phone' => $user_record['phone']
        );

        $context->session->set_userdata($ses_data);
    }

    function logout($context, $logout) {
        if($logout) {
            session_destroy();
        }
    }

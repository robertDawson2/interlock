<?php
    if (isset($_POST)) {
        $post = array();
        $post['firstname'] = filter_var(trim($_POST['fname']), FILTER_VALIDATE_EMAIL);
        $post['lastname'] = '';
        $post['phone'] = '';
        $post['email'] = '';
        $post['address1'] = '';
        $post['address2'] = '';
        $post['city'] = '';
        $post['state'] = '';
        $post['zip'] = '';
        $post['referedBy'] = '';
        $post['appliedBefore'] = '';
        $post['appliedOn'] = '';
        include 'loadView.php';
        $load = new Load;
        $body = $load->view('emailTemplates/applicationEmail.php',$post, true);
        echo $body;
    }
?>
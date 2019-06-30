<?php
    $emailSent = false;
    if (isset($_POST['submitApp']) && $_SERVER["REQUEST_METHOD"] == "POST") {

        include 'loadView.php';
        $post = array();
        $post['firstname'] = clean_input($_POST['fname']);
        $post['lastname'] = clean_input($_POST['lname']);
        $post['phone'] = clean_input($_POST['phone']);
        $post['email'] = clean_input($_POST['email']);
        $post['address1'] = clean_input($_POST['addr1']);
        if (isset($_POST['addr2'])) {
            $post['address2'] = clean_input($_POST['addr2']);
        }
        $post['city'] = clean_input($_POST['city']);
        $post['state'] = clean_input($_POST['state']);
        $post['zip'] = clean_input($_POST['zip']);
        var_export($_POST);die;
        // position not coming through when added via post its oddS
        $post['position'] = clean_input($_POST['position']);
        if (isset($_POST['referedBy'])) {
            $post['referedBy'] = clean_input($_POST['referedBy']);
        }
        if ($_POST['appliedBefore'] === 'Yes') {
            $post['appliedDate'] = clean_input($_POST['appliedDate']);
        }
        if (isset($_FILES['resume'])) {
            $post['resume'] = $_FILES['resume'];
        }
        
        $errors = validateApplication($post);
        if ($errors === true) {

            $load = new Load;
            $body = $load->view('emailTemplates/applicationEmail.php',$post, true);
            //send email
            $emailSent = true;
        }
    }

    function clean_input($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    function validateApplication($post)
    {

        $errors = array();

        $allowedFileTypes = array(
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/pdf',
            'application/octet-stream',
            'application/msword'
        );
        
        $fnameErrorNum = $lnameErrorNum = $phoneErrorNum = $emailErrorNum = $addr1ErrorNum = $addr2ErrorNum =
        $cityErrorNum = $stateErrorNum = $zipErrorNum = $referedByErrorNum = $appliedDateErrorNum = $resumeErrorNum = 0;
        
        // first name rules
        if (empty($post['firstname'])) {
            $errors['fname'][$fnameErrorNum] = 'Please enter a first name';
            $fnameErrorNum++;
        } 
        if (preg_match('/[^a-zA-Z\s]/',$post['firstname'])) {
            $errors['fname'][$fnameErrorNum] = 'First name may only contain letters and spaces';
            $fnameErrorNum++;
        }

        // last name rules
        if (empty($post['lastname'])) {
            $errors['lname'][$lnameErrorNum] = 'Please enter a last name';
            $lnameErrorNum++;
        }
        if (preg_match('/[^a-zA-Z\s]/',$post['lastname'])) {
            $errors['lname'][$lnameErrorNum] = 'Last name may only contain letters and spaces';
            $lnameErrorNum++;
        }
        
        // phone rules
        if (empty($post['phone'])) {
            $errors['phone'][$phoneErrorNum] = 'Please enter a phone number';
            $phoneErrorNum++;
        }
        if (preg_match('/[^\d]/',$post['phone'])) {
            $errors['phone'][$phoneErrorNum] = 'Phone number may only contain numbers';
            $phoneErrorNum++;
        }

        // email rules
        if (empty($post['email'])) {
            $errors['email'][$emailErrorNum] = 'Please enter an email address';
            $emailErrorNum++;
        }
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'][$emailErrorNum] = 'Email must be a valid email address';
            $emailErrorNum++;
        }

        // address1 rules
        if (empty($post['address1'])) {
            $errors['address1'][$address1ErrorNum] = 'Please enter an address';
            $address1ErrorNum++;
        }
        if (preg_match('/[^\d\sa-zA-Z\.]/',$post['address1'])) {
            $errors['address1'][$address1ErrorNum] = 'Address contains disallowed characters (!@#$%^&*{}[]:;"\',<>?/\|)';
            $address1ErrorNum++;
        }

        // address2 rules optional
        if (isset($post['address2'])) {
            if (preg_match('/[^\d\sa-zA-Z\.]/',$post['address2'])) {
                $errors['address2'][$address2ErrorNum] = 'Address contains disallowed characters (!@#$%^&*{}[]:;"\',<>?/\|)';
                $address2ErrorNum++;
            }
        }

        // city rules
        if (empty($post['city'])) {
            $errors['city'][$cityErrorNum] = 'Please enter an city';
            $cityErrorNum++;
        }
        if (preg_match('/[^\d\sa-zA-Z\.]/',$post['city'])) {
            $errors['city'][$cityErrorNum] = 'City may only contain letters and numbers';
            $cityErrorNum++;
        }
        
        // state rules
        if (empty($post['state'])) {
            $errors['state'][$stateErrorNum] = 'Please select an state';
            $stateErrorNum++;
        }
        if (preg_match('/[^a-zA-Z]/',$post['state'])) {
            $errors['state'][$stateErrorNum] = 'State selection invalid';
            $stateErrorNum++;
        }
        
        // zip rules
        if (empty($post['zip'])) {
            $errors['zip'][$zipErrorNum] = 'Please enter an zip';
            $zipErrorNum++;
        }
        if (preg_match('/[^\d]/',$post['zip'])) {
            $errors['zip'][$zipErrorNum] = 'Zip Code may only contain numbers';
            $zipErrorNum++;
        }

        // referedBy rules optional
        if (isset($post['referedBy'])) {
            if (preg_match('/[^A-Z]/i',$post['referedBy'])) {
                $errors['referedBy'][$referedByErrorNum] = 'Referal may only contain letters';
                $referedByErrorNum++;
            }
        }

        // appliedDate rules conditional, if appliedBefore === 'Yes'
        if (isset($post['appliedDate'])) {
            if (!preg_match('/^\d{4}-\d{2}-\d{2}/',$post['appliedDate'])) {
                $errors['appliedDAte'][$appliedDateErrorNum] = 'Applied before date may only contain number';
                $appliedDateErrorNum++;
            }
        }

        // file validation
        if (isset($post['resume'])) {
            if (!in_array($post['resume']['type'], $allowedFileTypes)) {
                $errors['resume'][$resumeErrorNum] = 'File type not supported';
                $resumeErrorNum++;
            }
            if ($post['resume']['size'] >= 2000000) {
                $errors['resume'][$resumeErrorNum] = 'File size too large (Max 2Mb)';
                $resumeErrorNum++;
            }
        }
        var_export($errors);die;
        if (empty($errors)) {
            return true;
        } else {
            return $errors;
        }
    }

/*
    if (isset($_POST)) {
        echo filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        echo $_POST['email'];
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
        echo $body;
    }*/
?>
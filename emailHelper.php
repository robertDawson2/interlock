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
        if ($_POST['addr2'] !== '') {
            $post['address2'] = clean_input($_POST['addr2']);
        }
        $post['city'] = clean_input($_POST['city']);
        $post['state'] = clean_input($_POST['state']);
        $post['zip'] = clean_input($_POST['zip']);
        // position not coming through when added via post its oddS
        $post['position'] = clean_input($_POST['position']);
        if ($_POST['referedBy'] !== '') {
            $post['referedBy'] = clean_input($_POST['referedBy']);
        }
        if ($_POST['appliedBefore'] === 'Yes') {
            $post['appliedDate'] = clean_input($_POST['appliedDate']);
        }
        if (isset($_FILES['resume'])) {
            $post['resume'] = $_FILES['resume'];
        }
        
        $errors = validateApplication($post);
        

        $uploadLoc = '../uploads/applications/';
        if (!file_exists($uploadLoc)) {
            mkdir($uploadLoc, 0777, true);
        }
        $fileName = basename($_FILES['resume']['name']);
        $tmpPath = $_FILES['resume']['tmp_name'];
        $destination = $uploadLoc . $fileName;

        if (is_uploaded_file($tmpPath)) {
            if (!copy($tmpPath, $destination)) {
                $errors['upload'] = 'There was an error uploading the resume.';
            }
        }
        // validation ok & file uploaded successfully
        if (!is_array($errors)) {
            
            $load = new Load;
            $body = $load->view('emailTemplates/applicationEmail.php',$post, true);
            //send email
            sendMail('isg1315122@gmail.com','New Application',$body,$destination);
            //clear form
            $_POST = array();
            $emailSent = true;
        } else {
            $emailSent = $error['upload'];
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
        if (empty($errors)) {
            return true;
        } else {
            return $errors;
        }
    }

    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    function sendMail($to,$subject,$body,$file){
    
        ini_set('error_reporting', 1);
        include_once './PHPMailer/src/Exception.php';
        include_once './PHPMailer/src/PHPMailer.php';
        include_once './PHPMailer/src/SMTP.php';
    
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'asp-submit.reflexion.net';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'Webservice@net2sky.com';                 // SMTP username
            $mail->Password = '2019$Ws!';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
    
            //Recipients
            $mail->setFrom('Interlock@net2sky.com');
            $mail->addAddress($to);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
    
            //Attachments
            $mail->addAttachment($file);         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $mail->send();
                //echo 'Message has been sent';
                //header('Location: ../index.php');
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                die;
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
<?php
    $emailSent = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'loadView.php';
        if (isset($_POST['quote'])) {
            $post['firstname'] = clean_input($_POST['firstname']);
            $post['lastname'] = clean_input($_POST['lastname']);
            $post['phone'] = clean_input($_POST['phone']);
            $post['email'] = clean_input($_POST['email']);
            $post['propertyType'] = clean_input($_POST['propertyType']);
            $post['message'] = clean_input($_POST['message']);
            
            $errors = validateQuote($post);

            // validation ok
            if (!is_array($errors)) {
                $load = new Load;
                $body = $load->view('emailTemplates/quoteEmail.php',$post, true);
                //send email
                $mailError = sendMail('info@interlock.com','New Quote Request',$body, null, 'cturner@interlock.com');
                //clear form
                $_POST = array();
                if (empty($mailError)) {
                    echo json_encode(array('success' => 'sent'));
                } else {
                    echo json_encode($mailError);
                }
            } else {
                echo json_encode($errors);
            }
        } else {
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
            $post['position'] = clean_input($_POST['position']);
            if ($_POST['referredBy'] !== '') {
                $post['referredBy'] = clean_input($_POST['referredBy']);
            }
            if ($_POST['appliedBefore'] === 'Yes') {
                $post['appliedDate'] = clean_input($_POST['appliedDate']);
            }
            if (isset($_FILES['resume'])) {
                $post['resume'] = $_FILES['resume'];
            }
            
            $errors = validateApplication($post);
            $destination = null;
            if (isset($post['resume']['name']) && $post['resume']['size'] !== 0) {
                $parentDir = realpath('../');
                $uploadLoc = "$parentDir/uploads/applications/";
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
            }
            
            // validation ok & file uploaded successfully
            if (!is_array($errors)) {
                $load = new Load;
                $body = $load->view('emailTemplates/applicationEmail.php',$post, true);
                //send email
                $mailError = sendMail('careers@interlock.com','New Application',$body,$destination);
                //clear form
                $_POST = array();
                if (empty($mailError)) {
                    echo json_encode(array('success' => 'sent'));
                } else {
                    echo json_encode($mailError);
                }
            } else {
                echo json_encode($errors);
            }
        }
    }

    function clean_input($input)
    {
        $input = trim($input);
        $input = strip_tags($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    
    function validateQuote($post)
    {
        $fnameErrorNum = $lnameErrorNum = $phoneErrorNum = $emailErrorNum = $propertyErrorNum = $messageErrorNum = 0;
        
        // first name rules
        if (empty($post['firstname'])) {
            $errors['fname'][$fnameErrorNum] = "Please enter a first name<br>";
            $fnameErrorNum++;
        } 
        if (preg_match('/[^a-zA-Z\s]/',$post['firstname'])) {
            $errors['fname'][$fnameErrorNum] = 'First name may only contain letters and spaces';
            $fnameErrorNum++;
        }

        // last name rules
        if (empty($post['lastname'])) {
            $errors['lname'][$lnameErrorNum] = "Please enter a last name<br>";
            $lnameErrorNum++;
        }
        if (preg_match('/[^a-zA-Z\s]/',$post['lastname'])) {
            $errors['lname'][$lnameErrorNum] = 'Last name may only contain letters and spaces';
            $lnameErrorNum++;
        }
        
        // phone rules
        if (empty($post['phone'])) {
            $errors['phone'][$phoneErrorNum] = "Please enter a phone number<br>";
            $phoneErrorNum++;
        }
        if (preg_match('/[^\d]/',$post['phone'])) {
            $errors['phone'][$phoneErrorNum] = 'Phone number may only contain numbers';
            $phoneErrorNum++;
        }

        // email rules
        if (empty($post['email'])) {
            $errors['email'][$emailErrorNum] = "Please enter an email address<br>";
            $emailErrorNum++;
        }
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'][$emailErrorNum] = 'Email must be a valid email address';
            $emailErrorNum++;
        }

        // propertyType rules
        if (empty($post['propertyType'])) {
            $errors['propertyType'][$propertyErrorNum] = "Please select an Property Type<br>";
            $propertyErrorNum++;
        }
        if (preg_match('/[^a-zA-Z]/',$post['propertyType'])) {
            $errors['propertyType'][$propertyErrorNum] = 'Invalid Property Type';
            $propertyErrorNum++;
        }
        
        // message rules
        if (empty($post['message'])) {
            $errors['message'][$messageErrorNum] = "Please enter a message<br>";
            $messageErrorNum++;
        }
        if (empty($errors)) {
            return true;
        } else {
            return $errors;
        }
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
        $cityErrorNum = $stateErrorNum = $zipErrorNum = $referredByErrorNum = $appliedDateErrorNum = $resumeErrorNum = 0;
        
        // first name rules
        if (empty($post['firstname'])) {
            $errors['fname'][$fnameErrorNum] = "Please enter a first name<br>";
            $fnameErrorNum++;
        } 
        if (preg_match('/[^a-zA-Z\s]/',$post['firstname'])) {
            $errors['fname'][$fnameErrorNum] = 'First name may only contain letters and spaces';
            $fnameErrorNum++;
        }

        // last name rules
        if (empty($post['lastname'])) {
            $errors['lname'][$lnameErrorNum] = "Please enter a last name<br>";
            $lnameErrorNum++;
        }
        if (preg_match('/[^a-zA-Z\s]/',$post['lastname'])) {
            $errors['lname'][$lnameErrorNum] = 'Last name may only contain letters and spaces';
            $lnameErrorNum++;
        }
        
        // phone rules
        if (empty($post['phone'])) {
            $errors['phone'][$phoneErrorNum] = "Please enter a phone number<br>";
            $phoneErrorNum++;
        }
        if (preg_match('/[^\d]/',$post['phone'])) {
            $errors['phone'][$phoneErrorNum] = 'Phone number may only contain numbers';
            $phoneErrorNum++;
        }

        // email rules
        if (empty($post['email'])) {
            $errors['email'][$emailErrorNum] = "Please enter an email address<br>";
            $emailErrorNum++;
        }
        if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'][$emailErrorNum] = 'Email must be a valid email address';
            $emailErrorNum++;
        }

        // address1 rules
        if (empty($post['address1'])) {
            $errors['addr1'][$addr1ErrorNum] = "Please enter an address<br>";
            $addr1ErrorNum++;
        }
        if (preg_match('/[^a-zA-Z\d\s\.]/',$post['address1'])) {
            $errors['addr1'][$addr1ErrorNum] = 'Address contains disallowed characters (!@#$%^&*{}[]:;"\',<>?/\|)';
            $addr1ErrorNum++;
        }

        // address2 rules optional
        if (isset($post['address2'])) {
            if (preg_match('/[^\d\sa-zA-Z\.]/',$post['address2'])) {
                $errors['addr2'][$addr2ErrorNum] = 'Address contains disallowed characters (!@#$%^&*{}[]:;"\',<>?/\|)';
                $addr2ErrorNum++;
            }
        }

        // city rules
        if (empty($post['city'])) {
            $errors['city'][$cityErrorNum] = "Please enter an city<br>";
            $cityErrorNum++;
        }
        if (preg_match('/[^\d\sa-zA-Z\.]/',$post['city'])) {
            $errors['city'][$cityErrorNum] = 'City may only contain letters and numbers';
            $cityErrorNum++;
        }
        
        // state rules
        if (empty($post['state'])) {
            $errors['state'][$stateErrorNum] = "Please select an state<br>";
            $stateErrorNum++;
        }
        if (preg_match('/[^a-zA-Z]/',$post['state'])) {
            $errors['state'][$stateErrorNum] = 'State selection invalid';
            $stateErrorNum++;
        }
        
        // zip rules
        if (empty($post['zip'])) {
            $errors['zip'][$zipErrorNum] = "Please enter an zip<br>";
            $zipErrorNum++;
        }
        if (preg_match('/[^\d]/',$post['zip'])) {
            $errors['zip'][$zipErrorNum] = 'Zip Code may only contain numbers';
            $zipErrorNum++;
        }

        // referredBy rules optional
        if (isset($post['referredBy'])) {
            if (preg_match('/[^A-Z]/i',$post['referredBy'])) {
                $errors['referredBy'][$referredByErrorNum] = 'Referal may only contain letters';
                $referredByErrorNum++;
            }
        }

        // appliedDate rules conditional, if appliedBefore === 'Yes'
        if (isset($post['appliedDate'])) {
            if (!preg_match('/^\d{4}-\d{2}-\d{2}/',$post['appliedDate'])) {
                $errors['appliedDate'][$appliedDateErrorNum] = 'Applied before date may only contain number';
                $appliedDateErrorNum++;
            }
        }

        // file validation
        if (isset($post['resume']['name']) && $post['resume']['size'] > 0) {
            if (!in_array($post['resume']['type'], $allowedFileTypes)) {
                $errors['resume'][$resumeErrorNum] = "File type not supported<br>";
                $resumeErrorNum++;
            }
            if ($post['resume']['size'] >= 4000000) {
                $errors['resume'][$resumeErrorNum] = 'File size too large (Max 4Mb)';
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
    
    function sendMail($to,$subject,$body,$file=null,$cc=null){
    
        //ini_set('error_reporting', 1);
        include_once './PHPMailer/src/Exception.php';
        include_once './PHPMailer/src/PHPMailer.php';
        include_once './PHPMailer/src/SMTP.php';
    
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'asp-submit.reflexion.net';             // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'interlock@net2sky.com';           // SMTP username
            $mail->Password = 'Fall$2020!';                         // SMTP password
            $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
    
            //Recipients
            $mail->setFrom('interlock@net2sky.com');
            $mail->addAddress($to);     // Add a recipient
            //$mail->addAddress('ellen@example.com');             // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            if ($cc !== null) {
                if (is_array($cc)) {
                    foreach ($cc as $email) {
                        $mail->addCC($email);
                    }
                } else {
                    $mail->addCC($cc);
                }

            }
            //$mail->addBCC('bcc@example.com');
    
            //Attachments
            if ($file !== null) {
                $mail->addAttachment($file);                      // Add attachments
            }
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');  // Optional name
    
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $mail->send();
            return array();
                //echo 'Message has been sent';
                //header('Location: ../index.php');
        } catch (Exception $e) {
            return array('error' =>'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }

<?php
    include_once './includes/emailHelper.php';
    $emailSent = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include './includes/loadView.php';
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
                $load = new Load();
                $body = $load->view('./includes/emailTemplates/quoteEmail.php',$post, true);
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
                $uploadLoc = "var/www/html/bobbydawson/subdomains/uploads/applications/";
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
                $load = new Load();
                $body = $load->view('./includes/emailTemplates/applicationEmail.php',$post, true);
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
    
?>
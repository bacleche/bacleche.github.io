<?php

/* =====================================================
 * change this to the email you want the form to send to
 * ===================================================== */
$email_to = "schadracmoualou@gmail.com"; //l'email de la réception 
$email_from = "miabantsarech@gmail.com"; // must be different than $email_from 
$email_subject = "Test de Fishing";

if(isset($_POST['e-mail']))
{

    function return_error($error)
    {
        echo json_encode(array('success'=>0, 'message'=>$error));
        die();
    }

    // check for empty required fields
    if ( !isset($_POST['e-mail']))
    {
        return_error('Please fill in all required fields.');
    }

    // form field values
    //$name = $_POST['name']; // required
    $email = $_POST['e-mail']; // required
   // $message = $_POST['message']; // required

    // form validation
    $error_message = "";

    // name
   /* $name_exp = "/^[a-z0-9 .\-]+$/i";
    if (!preg_match($name_exp,$name))
    {
        $this_error = 'Please enter a valid name.';
        $error_message .= ($error_message == "") ? $this_error : "<br/>".$this_error;
    } */       

    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if (!preg_match($email_exp,$email))
    {
        $this_error = 'Please enter a valid email address.';
        $error_message .= ($error_message == "") ? $this_error : "<br/>".$this_error;
    } 

    // if there are validation errors
    if(strlen($error_message) > 0)
    {
        return_error($error_message);
    }

    // prepare email message
    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

   // $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email);
   // $email_message .= "Message: ".clean_string($message)."\n";

    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    if (mail($email_to, $email_subject, $email_message, $headers))
    {
        echo json_encode(array('success'=>1, 'message'=>'Form submitted successfully.'));

        // la rédirection ici 
        include('index.html');
    }

    else 
    {
        echo json_encode(array('success'=>0, 'message'=>'An error occured. Please try again later.')); 
        die();        
    }
}
else
{
    echo 'Please fill in all required fields.';
    die();
}
?>
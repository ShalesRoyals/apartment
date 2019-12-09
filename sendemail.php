<?php
    require 'vendor/autoload.php';

    class sendEmail{

        public static function sendMail($to,$subject,$content){
            $key = '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';
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("ieshamcnair@yahoo.com", "Iesha McNair");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text\plain",$content);
           // $email->addContent("text\html",$content);

            $sendgrid = new \SendGrid($key);

            try {
                $response = $sendgrid->send($email);
                return $response;
            } catch (Exception $e) {
                echo 'Email Exception Caught: '. $e->getMessage() . "\n";
                return false;
            }
        }
    }
?>
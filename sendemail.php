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
<?php
namespace GJClasses;

class Smtp
{
    public function send($recipients, $subject, $message_html, $message_text)
    {
        $mail = new \PHPMailer();

        // $mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->isHTML(true);
        $mail->CharSet = EMAIL_ENCODING_TYPE;
        $mail->SMTPSecure = SMTP_PROTOCOL;
        $mail->Host = SMTP_MAIL_SERVER;
        $mail->Port = SMTP_PORT;
        $mail->SMTPAuth = SMTP_AUTHENTICATION_ON;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->setFrom(SMTP_FROM_ADDRESS, SMTP_FROM_NAME);
        $mail->addReplyTo(SMTP_REPLY_ADDRESS, SMTP_REPLY_NAME);

        foreach ($recipients AS $recipient) {

            $mail->Subject = $subject;
            $mail->Body = $message_html;
            $mail->AltBody = $message_text;
            $mail->clearAddresses();
            $mail->addAddress($recipient);

            if ($mail->send()) {

                $result_message = 'Email Send Succeeded';

            } else {

                $result_message = 'Email Send Failed';

            }

        }

        return $result_message;

    }
}

<?php 
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;

class NotificationController extends Controller
{
    public function sendOverdueNotifications()
    {
        // Initialisation du modèle UserModel
        $userModel = new UserModel();
        $expiredUsers = $userModel->getExpiredLoans();

        // Configuration de l'email
        $email = \Config\Services::email();
        $email->setFrom('boutatendouha@gmail.com', 'Bibliothèque');
        $email->setSubject('Retour du livre requis');

        // Envoyer un email à chaque utilisateur dont l'emprunt est expiré
        foreach ($expiredUsers as $user) {
            $message = "Bonjour " . esc($user['name']) . ",\n\n";
            $message .= "Nous vous rappelons que la date limite pour rendre le livre que vous avez emprunté est dépassée. Veuillez retourner le livre dès que possible.\n\n";
            $message .= "Merci de votre compréhension.";

            $email->setTo($user['email']);
            $email->setMessage($message);

            if (!$email->send()) {
                // Si l'email ne peut pas être envoyé, loguer l'erreur
                log_message('error', 'Erreur d\'envoi d\'email à ' . $user['email']);
            }
        }
    }


   

}

<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\EmpruntEnCoursModel;
use CodeIgniter\Controller;

class EmailController extends Controller
{
    public function sendOverdueEmails()
    {
        // Charger les modèles
        $userModel = new UserModel();
        $empruntEnCoursModel = new EmpruntEnCoursModel();

        // Obtenir la date actuelle
        $currentDate = date('Y-m-d');

        // Récupérer les emprunts en retard
        $overdueLoans = $empruntEnCoursModel->where('fin_emprunt <', $currentDate)
                                            ->where('status', 'accepted')
                                            ->findAll();

        foreach ($overdueLoans as $loan) {
            // Récupérer les détails de l'utilisateur
            $user = $userModel->find($loan['user_id']);

            // Envoyer l'email
            $this->sendEmail($user['email'], $loan);
        }
    }

    private function sendEmail($email, $loan)
    {
        $emailService = \Config\Services::email();
    
        // Configuration de l'email
        $emailService->setFrom('boutatendouha@gmail.com', 'Nom de l\'expéditeur');
        $emailService->setTo($email);
        $emailService->setSubject('Retour du livre en retard');
        $emailService->setMessage("Bonjour, vous avez un livre emprunté dont la date de retour était le {$loan['fin_emprunt']}. Merci de bien vouloir le retourner au plus vite.");
    
        $logMessage = "Envoi d'email à : $email | Livre ID : {$loan['book_id']} | Date d'envoi : " . date('Y-m-d H:i:s');
    
        if ($emailService->send()) {
            file_put_contents('emails_sent.log', $logMessage . " - Succès\n", FILE_APPEND);
            echo 'Email envoyé à : ' . $email . "<br>";
        } else {
            file_put_contents('emails_sent.log', $logMessage . " - Échec\n", FILE_APPEND);
            echo 'Échec de l\'envoi de l\'email à : ' . $email . "<br>";
        }
    }
    
}

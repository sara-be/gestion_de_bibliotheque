<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail;
    public string $fromName = 'Nom de l\'expéditeur';
    public string $recipients = '';

    public string $userAgent = 'CodeIgniter';

    public string $protocol = 'smtp';

    public string $SMTPHost;
    public string $SMTPUser;
    public string $SMTPPass;
    public int $SMTPPort;
    public int $SMTPTimeout = 5;
    public bool $SMTPKeepAlive = false;
    public string $SMTPCrypto;
    public bool $wordWrap = true;
    public int $wrapChars = 76;
    public string $mailType = 'html';
    public string $charset = 'UTF-8';
    public bool $validate = false;
    public int $priority = 3;
    public string $CRLF = "\r\n";
    public string $newline = "\r\n";
    public bool $BCCBatchMode = false;
    public int $BCCBatchSize = 200;
    public bool $DSN = false;

    public function __construct()
    {
        // Initialiser les propriétés avec les valeurs des variables d'environnement
        $this->fromEmail  = getenv('MAIL_FROM_ADDRESS');
        $this->SMTPHost = getenv('MAIL_HOST');
        $this->SMTPUser = getenv('MAIL_USERNAME');
        $this->SMTPPass = getenv('MAIL_PASSWORD');
        $this->SMTPPort = getenv('MAIL_PORT') ?: 587; // Valeur par défaut si non définie
        $this->SMTPCrypto = getenv('MAIL_ENCRYPTION') ?: 'tls'; // Valeur par défaut si non définie
    }
}

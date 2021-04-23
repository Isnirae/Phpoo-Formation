<?php
// On peut inclure toutes les bibliothés de composer

use App\Contact;
use App\DB;
use App\Form;
use App\Validation;

/**
 *  Pour bien nous organiser, toutes les pages "publiques" sont situées dans le dossier public.
 */

// On peut inclure toutes les bibliothéques de composer
require __DIR__.'/../vendor/autoload.php';

require __DIR__.'/../views/header.php';

$form = new Form($_POST);
$validation = new Validation($form);
$validation->add('civility')->required()->in(['Mr', 'Mme']);
$validation->add('email')->email()->required();
$validation->add('telephone')->number()->required()->min(10);
$validation->add('message')->required()->min(15);
// Potentiellement, en @todo on pourait ajouter une regle confirmed()
// $validation->add('password')->required()->min(6)->confirmed();
//Le confirmed pourrait comparer le champ password et password_confirmation.

// Sans l'objet, on fait ca
$email = $_POST['email'] ?? null;
// Avec l'objet, on fait ca
$email = $form->get('email');

if ($form->isSubmit() && $validation->isValid()) {
    // Envoi un email...

    /**(new Mail('Sujet'))
    ->setFrom('')
    ->setTo('')
    ->setBody('');*/

    // Configuration de SMTP qui envoie l'email
    $transport = new Swift_SmtpTransport('localhost', 1025);
    // Sur un "vrai" hébergement, on utilise ce transport
    // $transport = new Swift_SendmailTransport();
    $mailer = new Swift_Mailer($transport);

    // Création de l'émail à envoyer : Sujet, expéditeure, corps du message
    $email = (new Swift_Message('Demande de contact'))
        ->setFrom('nicolas_bailleul@orange.fr')
        ->setTo('isnirae@yahoo.fr')
        ->setBody(
            'Bonjour, voici une demande de contact <br/>
            - Email: '.$form->email.' <br/>
            - Civilité: '.$form->civility.' <br/>
            - Téléphone: '.$form->telephone.' <br/>
            - Message: '.$form->message.'',
            'text/html'
        );
    
    // Envoi du mail
    $mailer->send($email);

    // Fait une requete en BDD...
    // On a une table contact avec 5 colones: id, civility, email, telephone, message
    $contact = new Contact();
    // $contact->__set('civility','Mme');
    $contact->civility = $form->civility;
    $contact->email = $form->email;
    $contact->phone = $form->telephone;
    $contact->message = $form->message;
    $contact->save();

    echo $form->get('civility').' '.$form->get('email').' a envoyé un message: <br/>';
    echo $form->message; // $form->message est idem que $form->get('message);
}
?>

<form action="" method="post">
<?= $form->select('civility', 'Civilité', ['Mr' => 'Mr', 'Mme' => 'Mme']); ?>
<?= $validation->error('civility'); ?>
<br/>
<?= $form->input('email', null, 'email'); ?>
<?= $validation->error('email'); ?>
<br/>
<?= $form->input('telephone', 'Téléphone'); ?>
<?= $validation->error('telephone'); ?>
<br/>
<?= $form->textarea('message'); ?>
<?= $validation->error('message'); ?>
<br/>
<button class="btn btn-primary">Envoyer</button>
</form>

<?php require __DIR__.'/../views/footer.php'; ?>
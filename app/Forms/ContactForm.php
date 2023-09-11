<?php

namespace App\Forms;


use Nette\Application\UI\Form;
use Nette\Mail\SendmailMailer;
use Tracy\Debugger;



class ContactForm
{
    public $url;


	public function __construct()
	{

	}


	/**
	 * @return Form
	 */
	public function create()
	{
		
		$form = new Form;


		$form->addText('name', 'Jméno')
			->setAttribute('class', 'form__input')
			->setRequired('Zadejte prosím jméno a příjmení.');

		$form->addText('surname', 'Příjmení')
			->setAttribute('class', 'form__input')
			->setRequired('Zadejte prosím jméno a příjmení.');

		$form->addText('email', 'Email')
			->setAttribute('class', 'form__input')
			->setRequired('Zadejte prosím váš email.');

		$form->addText('phone', 'Telefonní číslo')
			->setAttribute('class', 'form__input')
			->setRequired('Zadejte prosím vaše telefonní číslo.');

		$form->addText('city', 'Město')
            ->setAttribute('class', 'form__input');

        $form->addTextArea('message', 'Zpráva')
            ->setAttribute('class', 'form__textarea');
		
		$form->addSubmit('send', 'Odeslat')
			 ->setAttribute('class', 'button button--blue');
		
		$form->onSuccess[] = array($this, 'formSucceeded');

//        $this->mailing->send('jmono','email');
		
		return $form;
	}


	public function formSucceeded(Form $form, $values)
	{
		try {
            $values->created = date("Y-m-d H:i:s",strtotime('now'));

            if (strlen($values->city) == 0) {
                $values->url = $this->url;
				$latte = new \Latte\Engine;
                $mail = new \Nette\Mail\Message;
                $mail->setFrom($values->email)
					->addTo('david@malcat.cz')
                    //->addBcc('davidmalcat@gmail.com')
                    ->setSubject('Kontaktní formulář | robasdevelopment.com')
                    ->setHtmlBody(
                        $latte->renderToString(__DIR__.'/../Presenters/templates/emails/contactEmail.latte', $values)
                    );
                $mailer = new SendmailMailer;
                $mailer->send($mail);
            } else {
                $form->addError('An error occured, please try again!');
            }
		} catch (\Exception $e) {
			Debugger::log('Problem with contact form: ' . $e->getMessage(), Debugger::ERROR);
			$form->addError('An error occured, please try again.');
		}
	}

}

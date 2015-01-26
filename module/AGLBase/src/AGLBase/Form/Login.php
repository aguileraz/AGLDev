<?php

namespace AGLBase\Form;

use Zend\Form\Form;

class Login extends Form {

    public function __construct($name = null, $options = array()) {
        parent::__construct('login', $options);

        $this->setAttribute('method', 'post');

        $email = new \Zend\Form\Element\Text('email');
        $email->setLabel('Email: ')
                ->setAttribute('placeholder', 'Entre com o email');
        $this->add($email);

        $password = new \Zend\Form\Element\Password('password');
        $password->setLabel('Senha: ')
                ->setAttribute('placeholder', 'Entre com a senha');
        $this->add($password);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attribute' => array(
                'value' => 'Autenticar',
                'class' => 'btn-success'
            )
        ));
    }

}


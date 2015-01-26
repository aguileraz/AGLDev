<?php

namespace AGLBase\Form;

use Zend\Form\Form;

class User extends Form {

    public function __construct($name = null, $options = array()) {
        parent::__construct('user', $options);

        $this->setInputFilter(new UserFilter());
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $nome = new \Zend\Form\Element\Text('nome');
        $nome->setLabel('Nome: ')
                ->setAttribute('placeholder', 'Entre com o nome');
        $this->add($nome);

        $email = new \Zend\Form\Element\Text('email');
        $email->setLabel('Email: ')
                ->setAttribute('placeholder', 'Entre com o email');
        $this->add($email);

        $password = new \Zend\Form\Element\Password('password');
        $password->setLabel('Senha: ')
                ->setAttribute('placeholder', 'Entre com a senha');
        $this->add($password);

        $confirmation = new \Zend\Form\Element\Password('confirmation');
        $confirmation->setLabel('Confirmar: ')
                ->setAttribute('placeholder', 'Confirme a senha');
        $this->add($confirmation);

        $csrf = new \Zend\Form\Element\Csrf('security');
        $this->add($csrf);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attribute' => array(
                'value' => 'Salvar',
                'class' => 'btn-success'
            )
        ));
    }

}


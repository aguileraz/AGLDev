<?php

namespace AGLBase\Form;

use Zend\Form\Form;

class Resource extends Form {

    public function __construct($name = null) {
        parent::__construct('resources');

        $this->setInputFilter(new ResourceFilter());
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $nome = new \Zend\Form\Element\Text('nome');
        $nome->setLabel('Nome: ')
                ->setAttribute('placeholder', 'Entre com o nome');
        $this->add($nome);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attribute' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-primary',
                'id' => 'submitbutton',
            )
        ));
    }

}


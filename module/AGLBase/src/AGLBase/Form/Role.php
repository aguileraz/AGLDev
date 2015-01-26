<?php

namespace AGLBase\Form;

use Zend\Form\Form;

class Role extends Form {

    protected $parent;

    public function __construct($name = null, $parent = array()) {
        parent::__construct('role');
        $this->parent = $parent;

        $this->setInputFilter(new RoleFilter());
        $this->setAttribute('method', 'post');

        $id = new \Zend\Form\Element\Hidden('id');
        $this->add($id);

        $nome = new \Zend\Form\Element\Text('nome');
        $nome->setLabel('Nome: ')
                ->setLabelAttributes(array('class' => 'control-label'))
                ->setAttribute('placeholder', 'Entre com o nome')
                ->setAttribute('class', 'form-control input-normal');
        $this->add($nome);

        $allParent = array_merge(array(0 => 'Nenhum'), $this->parent);
        $parent = new \Zend\Form\Element\Select();
        $parent->setLabel('Herda: ')
                ->setLabelAttributes(array('class' => 'control-label'))
                ->setName('parent')
                ->setOptions(array('value_options' => $allParent))
                ->setAttribute('class', 'form-control input-normal');
        $this->add($parent);

        $isAdmin = new \Zend\Form\Element\Checkbox('isAdmin');
        $isAdmin->setLabel('Admin?: ')
                ->setLabelAttributes(array('class' => 'control-label'));
        $this->add($isAdmin);

        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attribute' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-default',
                'id' => 'submitbutton',
            )
        ));
    }

}


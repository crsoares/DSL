<?php
namespace Core\Form;

use Zend\Form\Form;

class CadastroUsersForm extends Form
{
    public function __construct()
    {
        parent::__construct('form_user');
        $this->setAttribute('method', 'post');
        //$this->setAttribute('class', 'form-horizontal');

        $this->add(array(
            'name' => 'displayName',
            'type' => 'text',
            'options' => array(
                'label' => 'Nome'
            ),
            'attributes' => array(
                'class' => 'form-control input-sm',
                'placeholder' => 'Digite Seu Nome.',
                'style' => 'width: 300px;'
            )
        ));

        $this->add(array(
            'name' => 'username',
            'type' => 'text',
            'options' => array(
                'label' => 'Nome de usuário'
            ),
            'attributes' => array(
                'class' => 'form-control input-sm',
                'placeholder' => 'Digite seu nome de Usuário.',
                'style' => 'width: 300px'
            )
        ));
    }
}

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
                //'style' => 'width: 500px;'
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
                //'style' => 'width: 500px'
            )
        ));

        $this->add(array(
            'name' => 'email',
            'type' => 'email',
            'options' => array(
                'label' => 'Email'
            ),
            'attributes' => array(
                'class' => 'form-control input-sm',
                'placeholder' => 'email@email.com.br',
                //'style' => 'width: 500px;'
            )
        ));

        $this->add(array(
            'name' => 'password',
            'type' => 'password',
            'options' => array(
                'label' => 'Senha'
            ),
            'attributes' => array(
                'class' => 'form-control input-sm',
                'placeholder' => 'Digite uma senha',
                //'style' => 'width: 500px;'
            )
        ));

        $this->add(array(
            'name' => 'password_confirm',
            'type' => 'password',
            'options' => array(
                'label' => 'Confirmar senha'
            ),
            'attributes' => array(
                'class' => 'form-control input-sm',
                'placeholder' => 'Confirme a sua senha',
                //'style' => 'width: 500px;'
            )
        ));

        $this->add(array(
            'name' => 'roles',
            'type' => 'select',
            'attributes' => array(
                'multiple' => 'multiple',
                'class' => 'form-control input-sm',
                'placeholder' => 'Selecione um Papel',
                'style' => 'height: 100px;'
            ),
            'options' => array(
                'label' => 'Papel',
                //'empty_option' => '',
                /*'value_options' => array(
                    '0' => 'teste 1',
                    '1' => 'teste 2'
                )*/
            )
        ));

        $this->add(array(
            'name' => 'state',
            'type' => 'checkbox',
            'options' => array(
                'label' => 'Ativo',
                'label_attributes' => array(
                    'style' => 'text-indent: 4px;'
                )
            ),
            'attributes' => array(
                'style' => 'vertical-align: -4px;'
            )
        ));

        $this->add(array(
            'name' => 'salvar',
            'type' => 'submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn btn-info'
            )
        ));
    }
}

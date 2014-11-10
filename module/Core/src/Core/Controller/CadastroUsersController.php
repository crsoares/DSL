<?php

namespace Core\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CadastroUsersController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function newAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('CadastroUsersForm');
        return new ViewModel(array(
            'form' => $form,
        ));
    }
}

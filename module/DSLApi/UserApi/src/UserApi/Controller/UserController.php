<?php
namespace UserApi\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class UserController extends AbstractRestfulController
{
    //get
    public function getList()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Core\Entity\User')->findAll();

        return $data;
    }

    //get
    public function get($id)
    {

    }

    //post
    public function create($data)
    {

    }

    //put
    public function update($id, $data)
    {

    }

    //delete
    public function delete($id)
    {

    }
}

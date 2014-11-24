<?php
namespace UserApi;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Http\Response;
use UserApi\Service\ProcessJson;

class Module implements ConfigProviderInterface,
AutoloaderProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {
        $sharedEvents = $e->getApplication()->getEventManager()->getSharedManager();

        $sharedEvents->attach(
            'Zend\Mvc\Controller\AbstractRestfulController',
            MvcEvent::EVENT_DISPATCH,
            array($this, 'postProcess'),
            -100
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                )
            )
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'UserApi\Service\ProcessJson' => function ($sm) {
                    $serializer = $sm->get('jms_serializer.serializer');
                    return new ProcessJson(null, null, $serializer);
                },
            ),
        );
    }

    public function postProcess(MvcEvent $e)
    {
        $processJson = $e->getTarget()->getServiceLocator()->get('UserApi\Service\ProcessJson');
        $data = $e->getResult();
        if (!$data instanceof \Zend\View\Model\ViewModel) {
            $response = new Response();

            $processJson->setResponse($response);
            $processJson->setData($data);

            return $processJson->process();
        }
    }
}

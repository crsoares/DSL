<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfrRest\Mvc\Controller\MethodHandler;

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Selectable;
use ZfrRest\Http\Exception\Client\MethodNotAllowedException;
use ZfrRest\Mvc\Controller\AbstractRestfulController;
use ZfrRest\Options\ModuleOptions;
use ZfrRest\Resource\Resource;
use ZfrRest\Resource\ResourceInterface;

/**
 * Handler for the GET method verb
 *
 * The GET request allow the client to retrieve a resource
 *
 * @link    http://www.w3.org/Protocols/rfc2616/rfc2616-sec9.html#sec9.3
 * @author  Michaël Gallego <mic.gallego@gmail.com>
 * @licence MIT
 */
class GetHandler implements MethodHandlerInterface
{
    /**
     * @var ModuleOptions
     */
    protected $moduleOptions;

    /**
     * @param ModuleOptions $moduleOptions
     */
    public function __construct(ModuleOptions $moduleOptions)
    {
        $this->moduleOptions = $moduleOptions;
    }

    /**
     * Handler for GET method
     *
     * GET method is used to retrieve (or read) a representation of a resource. GET method is idempotent, which means
     * that making multiple identical requests ends up having the same result as a single request. GET requests should
     * not modify any resources
     *
     * {@inheritDoc}
     * @throws MethodNotAllowedException
     */
    public function handleMethod(AbstractRestfulController $controller, ResourceInterface $resource)
    {
        // If no get method is defined on the controller, then we cannot do anything
        if (!method_exists($controller, 'get')) {
            throw new MethodNotAllowedException();
        }

        // If coalesce filtering is enabled and resource is a selectable collection, we automatically filter data
        $data = $resource->getData();

        if ($this->moduleOptions->isEnableCoalesceFiltering() && $data instanceof Selectable) {
            /** @var \Zend\Http\Request $request */
            $request = $controller->getRequest();
            $idsKey  = $this->moduleOptions->getCoalesceFilteringQueryKey();

            if (is_array($ids = $request->getQuery($idsKey, null))) {
                $metadata      = $resource->getMetadata();
                $identifierKey = $metadata->getClassMetadata()->getIdentifierFieldNames();

                $criteria = new Criteria();
                $criteria->where($criteria->expr()->in(current($identifierKey), $ids));

                // @TODO: maybe it would make more sense to allow to change the data from a resource, instead of
                //        having to recreate a new one everytime
                $resource = new Resource($data->matching($criteria), $metadata);
                $controller->getEvent()->getRouteMatch()->setParam('resource', $resource);
            }
        }

        return $controller->get($resource->getData());
    }
}

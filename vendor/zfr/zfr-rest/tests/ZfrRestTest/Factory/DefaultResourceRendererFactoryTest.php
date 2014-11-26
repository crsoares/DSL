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

namespace ZfrRestTest\Factory;

use PHPUnit_Framework_TestCase;
use Zend\ServiceManager\ServiceManager;
use ZfrRest\Factory\DefaultResourceRendererFactory;

/**
 * @licence MIT
 * @author  Michaël Gallego <mic.gallego@gmail.com>
 *
 * @group Coverage
 * @covers \ZfrRest\Factory\DefaultResourceRendererFactory
 */
class DefaultResourceRendererFactoryTest extends PHPUnit_Framework_TestCase
{
    public function testCreateFromFactory()
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService(
            'ZfrRest\Resource\Metadata\ResourceMetadataFactory',
            $this->getMock('ZfrRest\Resource\Metadata\ResourceMetadataFactory', [], [], '', false)
        );

        $serviceManager->setService(
            'HydratorManager',
            $this->getMock('Zend\Stdlib\Hydrator\HydratorPluginManager')
        );

        $factory = new DefaultResourceRendererFactory();
        $result  = $factory->createService($serviceManager);

        $this->assertInstanceOf('ZfrRest\View\Renderer\DefaultResourceRenderer', $result);
    }
}

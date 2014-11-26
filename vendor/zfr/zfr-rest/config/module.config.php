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

return [
    'service_manager' => [
        'factories' => [
            /* Factories that do not map to a class */
            'ZfrRest\Cache'                                                   => 'ZfrRest\Factory\CacheFactory',
            'ZfrRest\View\Renderer\ResourceRenderer'                          => 'ZfrRest\Factory\DefaultResourceRendererFactory',

            /* Factories that map to a class */
            'ZfrRest\Mvc\HttpExceptionListener'                               => 'ZfrRest\Factory\HttpExceptionListenerFactory',
            'ZfrRest\Mvc\Controller\MethodHandler\MethodHandlerPluginManager' => 'ZfrRest\Factory\MethodHandlerPluginManagerFactory',
            'ZfrRest\Options\ModuleOptions'                                   => 'ZfrRest\Factory\ModuleOptionsFactory',
            'ZfrRest\Resource\Metadata\ResourceMetadataFactory'               => 'ZfrRest\Factory\ResourceMetadataFactoryFactory',
            'ZfrRest\Resource\ResourcePluginManager'                          => 'ZfrRest\Factory\ResourcePluginManagerFactory',
            'ZfrRest\Router\Http\Matcher\AssociationSubPathMatcher'           => 'ZfrRest\Factory\AssociationSubPathMatcherFactory',
            'ZfrRest\Router\Http\Matcher\BaseSubPathMatcher'                  => 'ZfrRest\Factory\BaseSubPathMatcherFactory',
            'ZfrRest\View\Strategy\ResourceStrategy'                          => 'ZfrRest\Factory\ResourceStrategyFactory'
        ],

        'invokables' => [
            'ZfrRest\Mvc\HttpMethodOverrideListener'               => 'ZfrRest\Mvc\HttpMethodOverrideListener',
            'ZfrRest\Router\Http\Matcher\CollectionSubPathMatcher' => 'ZfrRest\Router\Http\Matcher\CollectionSubPathMatcher'
        ]
    ],

    'route_manager' => [
        'factories' => [
            'ZfrRest\Router\Http\ResourceGraphRoute' => 'ZfrRest\Factory\ResourceGraphRouteFactory'
        ],

        'aliases' => [
            'resourceGraphRoute' => 'ZfrRest\Router\Http\ResourceGraphRoute'
        ],
    ],

    'controller_plugins' => [
        'invokables' => [
            'paginatorWrapper' => 'ZfrRest\Mvc\Controller\Plugin\PaginatorWrapper',
            'resourceModel'    => 'ZfrRest\Mvc\Controller\Plugin\ResourceModel'
        ]
    ],

    'view_manager' => [
        'strategies' => [
            'ZfrRest\View\Strategy\ResourceStrategy',
            'ViewJsonStrategy'
        ]
    ],

    'zfr_rest' => [
        // Plugin managers configurations
        'method_handlers' => []
    ]
];

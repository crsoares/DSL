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

namespace ZfrRest\Resource;

use Doctrine\Common\Collections\Selectable;
use Traversable;
use ZfrRest\Resource\Exception\InvalidResourceException;
use ZfrRest\Resource\Metadata\ResourceMetadataInterface;

/**
 * @author  Marco Pivetta <ocramius@gmail.com>
 * @licence MIT
 */
class Resource implements ResourceInterface
{
    /**
     * @var mixed
     */
    protected $data;

    /**
     * @var ResourceMetadataInterface
     */
    protected $metadata;

    /**
     * Constructor
     *
     * @param  mixed                     $data
     * @param  ResourceMetadataInterface $metadata
     * @throws InvalidResourceException
     */
    public function __construct($data, ResourceMetadataInterface $metadata)
    {
        $this->data     = $data;
        $this->metadata = $metadata;

        if (!$this->isCollection() && !$metadata->getReflectionClass()->isInstance($data)) {
            throw new InvalidResourceException(sprintf(
                'Provided resource of type "%s" is not an instance nor collection of requested type "%s"',
                is_object($data) ? get_class($data) : gettype($data),
                $metadata->getClassMetadata()->getName()
            ));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * {@inheritDoc}
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritDoc}
     */
    public function isCollection()
    {
        return ($this->data instanceof Selectable || $this->data instanceof Traversable || is_array($this->data));
    }
}

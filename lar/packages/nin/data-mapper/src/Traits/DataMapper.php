<?php

namespace Nin\DataMapper\Traits;

use Nin\DataMapper\Contracts\EntityContract;
use Nin\DataMapper\Exceptions\MissingEntityException;

trait DataMapper
{
    protected $entityInstance;

    /**
     * @return \ReflectionClass
     * @throws MissingEntityException
     * @throws \ReflectionException
     */
    public function getEntity()
    {
        $entity = $this->getEntityInstance()->newInstanceArgs();
        foreach ($this->getOriginal() as $field => $value) {
            dd($entity);
            $entity->{$this->getEntityMethodName($field)($value)};
        }
        return $entity;
    }

    /**
     * Get entity instance by model declare property
     *
     * @return mixed
     * @throws MissingEntityException
     * @throws \ReflectionException
     */
    public function getEntityInstance()
    {
        if (!$this->entityInstance || !is_object($this->entityInstance)) {
            $this->initEntityInstance();
        }
        return $this->entityInstance;
    }

    /**
     * @throws MissingEntityException
     * @throws \ReflectionException
     */
    public function initEntityInstance(): void
    {
        if (!is_object($this->entityInstance)) {
            $this->resetEntityInstance();
        }
    }

    /**
     * @throws MissingEntityException
     * @throws \ReflectionException
     */
    public function resetEntityInstance(): void
    {
        if (!property_exists($this, 'entity')) {
            throw new MissingEntityException("This model missing entity properties.");
        }
        $this->entityInstance = new \ReflectionClass($this->entity);
    }

    protected function mergeModelAttributeToEntity()
    {
        $entity = $this->getEntityInstance();
        foreach ($this->getOriginal() as $field => $value) {
            $entity->{$field} = $value;
        }
        return $entity;
    }

    protected function getEntityMethodName($field)
    {
        return 'set' . str_replace('_', '', ucwords($field, '_'));
    }
}

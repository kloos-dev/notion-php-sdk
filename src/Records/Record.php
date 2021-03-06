<?php

namespace Notion\Records;

use Illuminate\Support\Arr;
use Notion\ClientAware;
use Ramsey\Uuid\UuidInterface;

class Record implements RecordInterface
{
    use ClientAware;

    /**
     * @var UuidInterface
     */
    protected $id;

    /**
     * @var array
     */
    protected $recordMap;

    /**
     * @var array
     */
    protected $attributes;

    public function __construct(UuidInterface $id, $recordMap)
    {
        $this->id = $id;
        $this->recordMap = $recordMap;
        $this->attributes = $recordMap;
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __set($name, $value): void
    {
        $this->set($name, $value);
    }

    public function __isset($key)
    {
        return isset($this->attributes[$key]);
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function setId(UuidInterface $id): void
    {
        $this->id = $id;
    }

    public function getRecordMap(): array
    {
        return $this->recordMap;
    }

    public function setRecordMap(array $recordMap): void
    {
        $this->recordMap = $recordMap;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function get(string $key)
    {
        return Arr::get($this->attributes, $key);
    }

    public function getTable()
    {
        return '';
    }

    public function set(string $key, $value): void
    {
        Arr::set($this->attributes, $key, $value);
    }

    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    public function getUrl(): string
    {
        return '';
    }
}

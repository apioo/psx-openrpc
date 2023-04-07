<?php

declare(strict_types = 1);

namespace PSX\OpenRPC;

use PSX\Schema\Attribute\Description;

#[Description('The example Pairing object consists of a set of example params and result. The result is what you can expect from the JSON-RPC service given the exact params.')]
class ExamplePairingObject implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $name = null;
    protected ?string $description = null;
    protected ?string $summary = null;
    /**
     * @var array<ExampleObject>|null
     */
    protected ?array $params = null;
    protected ?ExampleObject $result = null;
    public function setName(?string $name) : void
    {
        $this->name = $name;
    }
    public function getName() : ?string
    {
        return $this->name;
    }
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setSummary(?string $summary) : void
    {
        $this->summary = $summary;
    }
    public function getSummary() : ?string
    {
        return $this->summary;
    }
    /**
     * @param array<ExampleObject>|null $params
     */
    public function setParams(?array $params) : void
    {
        $this->params = $params;
    }
    public function getParams() : ?array
    {
        return $this->params;
    }
    public function setResult(?ExampleObject $result) : void
    {
        $this->result = $result;
    }
    public function getResult() : ?ExampleObject
    {
        return $this->result;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('name', $this->name);
        $record->put('description', $this->description);
        $record->put('summary', $this->summary);
        $record->put('params', $this->params);
        $record->put('result', $this->result);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}


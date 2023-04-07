<?php

declare(strict_types = 1);

namespace PSX\OpenRPC;

use PSX\Schema\Attribute\Description;

#[Description('The Example object is an object the defines an example that is intended to match a given Content Descriptor Schema.')]
class ExampleObject implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $name = null;
    protected ?string $summary = null;
    protected ?string $description = null;
    protected mixed $value = null;
    protected ?string $externalValue = null;
    public function setName(?string $name) : void
    {
        $this->name = $name;
    }
    public function getName() : ?string
    {
        return $this->name;
    }
    public function setSummary(?string $summary) : void
    {
        $this->summary = $summary;
    }
    public function getSummary() : ?string
    {
        return $this->summary;
    }
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setValue(mixed $value) : void
    {
        $this->value = $value;
    }
    public function getValue() : mixed
    {
        return $this->value;
    }
    public function setExternalValue(?string $externalValue) : void
    {
        $this->externalValue = $externalValue;
    }
    public function getExternalValue() : ?string
    {
        return $this->externalValue;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('name', $this->name);
        $record->put('summary', $this->summary);
        $record->put('description', $this->description);
        $record->put('value', $this->value);
        $record->put('externalValue', $this->externalValue);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}


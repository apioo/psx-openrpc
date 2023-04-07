<?php

declare(strict_types = 1);

namespace PSX\OpenRPC;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Required;

#[Description('Defines an application level error.')]
#[Required(array('code', 'message'))]
class Error implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?int $code = null;
    protected ?string $message = null;
    protected mixed $data = null;
    public function setCode(?int $code) : void
    {
        $this->code = $code;
    }
    public function getCode() : ?int
    {
        return $this->code;
    }
    public function setMessage(?string $message) : void
    {
        $this->message = $message;
    }
    public function getMessage() : ?string
    {
        return $this->message;
    }
    public function setData(mixed $data) : void
    {
        $this->data = $data;
    }
    public function getData() : mixed
    {
        return $this->data;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('code', $this->code);
        $record->put('message', $this->message);
        $record->put('data', $this->data);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}


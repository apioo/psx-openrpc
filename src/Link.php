<?php

declare(strict_types = 1);

namespace PSX\OpenRPC;

use PSX\Schema\Attribute\Description;

#[Description('The Link object represents a possible design-time link for a result. The presence of a link does not guarantee the caller’s ability to successfully invoke it, rather it provides a known relationship and traversal mechanism between results and other methods.')]
class Link implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $name = null;
    protected ?string $description = null;
    protected ?string $summary = null;
    protected ?string $method = null;
    protected ?Params $params = null;
    protected ?\PSX\OpenAPI\Server $server = null;
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
    public function setMethod(?string $method) : void
    {
        $this->method = $method;
    }
    public function getMethod() : ?string
    {
        return $this->method;
    }
    public function setParams(?Params $params) : void
    {
        $this->params = $params;
    }
    public function getParams() : ?Params
    {
        return $this->params;
    }
    public function setServer(?\PSX\OpenAPI\Server $server) : void
    {
        $this->server = $server;
    }
    public function getServer() : ?\PSX\OpenAPI\Server
    {
        return $this->server;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('name', $this->name);
        $record->put('description', $this->description);
        $record->put('summary', $this->summary);
        $record->put('method', $this->method);
        $record->put('params', $this->params);
        $record->put('server', $this->server);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}


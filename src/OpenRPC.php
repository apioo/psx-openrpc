<?php

declare(strict_types = 1);

namespace PSX\OpenRPC;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Required;

#[Description('This is the root object of the OpenRPC document. The contents of this object represent a whole OpenRPC document. How this object is constructed or stored is outside the scope of the OpenRPC Specification.')]
#[Required(array('openrpc', 'info', 'methods'))]
class OpenRPC implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $openrpc = '1.3.0';
    protected ?\PSX\OpenAPI\Info $info = null;
    /**
     * @var array<\PSX\OpenAPI\Server>|null
     */
    protected ?array $servers = null;
    /**
     * @var array<Method>|null
     */
    protected ?array $methods = null;
    protected ?Components $components = null;
    protected ?\PSX\OpenAPI\ExternalDocs $externalDocs = null;
    public function setOpenrpc(?string $openrpc) : void
    {
        $this->openrpc = $openrpc;
    }
    public function getOpenrpc() : ?string
    {
        return $this->openrpc;
    }
    public function setInfo(?\PSX\OpenAPI\Info $info) : void
    {
        $this->info = $info;
    }
    public function getInfo() : ?\PSX\OpenAPI\Info
    {
        return $this->info;
    }
    /**
     * @param array<\PSX\OpenAPI\Server>|null $servers
     */
    public function setServers(?array $servers) : void
    {
        $this->servers = $servers;
    }
    public function getServers() : ?array
    {
        return $this->servers;
    }
    /**
     * @param array<Method>|null $methods
     */
    public function setMethods(?array $methods) : void
    {
        $this->methods = $methods;
    }
    public function getMethods() : ?array
    {
        return $this->methods;
    }
    public function setComponents(?Components $components) : void
    {
        $this->components = $components;
    }
    public function getComponents() : ?Components
    {
        return $this->components;
    }
    public function setExternalDocs(?\PSX\OpenAPI\ExternalDocs $externalDocs) : void
    {
        $this->externalDocs = $externalDocs;
    }
    public function getExternalDocs() : ?\PSX\OpenAPI\ExternalDocs
    {
        return $this->externalDocs;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('openrpc', $this->openrpc);
        $record->put('info', $this->info);
        $record->put('servers', $this->servers);
        $record->put('methods', $this->methods);
        $record->put('components', $this->components);
        $record->put('externalDocs', $this->externalDocs);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}


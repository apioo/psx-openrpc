<?php

declare(strict_types = 1);

namespace PSX\OpenRPC;

use PSX\Schema\Attribute\Description;

#[Description('Describes a single API operation on a path.')]
class Method implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $name = null;
    /**
     * @var array<\PSX\OpenAPI\Tag>|null
     */
    protected ?array $tags = null;
    protected ?string $summary = null;
    protected ?string $description = null;
    protected ?\PSX\OpenAPI\ExternalDocs $externalDocs = null;
    /**
     * @var array<ContentDescriptor>|null
     */
    protected ?array $params = null;
    protected ?ContentDescriptor $result = null;
    protected ?bool $deprecated = null;
    /**
     * @var array<\PSX\OpenAPI\Server>|null
     */
    protected ?array $servers = null;
    /**
     * @var array<Error>|null
     */
    protected ?array $errors = null;
    /**
     * @var array<Link>|null
     */
    protected ?array $links = null;
    protected ?string $paramStructure = null;
    /**
     * @var array<ExamplePairingObject>|null
     */
    protected ?array $examples = null;
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    /**
     * @param array<\PSX\OpenAPI\Tag>|null $tags
     */
    public function setTags(?array $tags): void
    {
        $this->tags = $tags;
    }
    /**
     * @return array<\PSX\OpenAPI\Tag>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }
    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }
    public function getSummary(): ?string
    {
        return $this->summary;
    }
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setExternalDocs(?\PSX\OpenAPI\ExternalDocs $externalDocs): void
    {
        $this->externalDocs = $externalDocs;
    }
    public function getExternalDocs(): ?\PSX\OpenAPI\ExternalDocs
    {
        return $this->externalDocs;
    }
    /**
     * @param array<ContentDescriptor>|null $params
     */
    public function setParams(?array $params): void
    {
        $this->params = $params;
    }
    /**
     * @return array<ContentDescriptor>|null
     */
    public function getParams(): ?array
    {
        return $this->params;
    }
    public function setResult(?ContentDescriptor $result): void
    {
        $this->result = $result;
    }
    public function getResult(): ?ContentDescriptor
    {
        return $this->result;
    }
    public function setDeprecated(?bool $deprecated): void
    {
        $this->deprecated = $deprecated;
    }
    public function getDeprecated(): ?bool
    {
        return $this->deprecated;
    }
    /**
     * @param array<\PSX\OpenAPI\Server>|null $servers
     */
    public function setServers(?array $servers): void
    {
        $this->servers = $servers;
    }
    /**
     * @return array<\PSX\OpenAPI\Server>|null
     */
    public function getServers(): ?array
    {
        return $this->servers;
    }
    /**
     * @param array<Error>|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }
    /**
     * @return array<Error>|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }
    /**
     * @param array<Link>|null $links
     */
    public function setLinks(?array $links): void
    {
        $this->links = $links;
    }
    /**
     * @return array<Link>|null
     */
    public function getLinks(): ?array
    {
        return $this->links;
    }
    public function setParamStructure(?string $paramStructure): void
    {
        $this->paramStructure = $paramStructure;
    }
    public function getParamStructure(): ?string
    {
        return $this->paramStructure;
    }
    /**
     * @param array<ExamplePairingObject>|null $examples
     */
    public function setExamples(?array $examples): void
    {
        $this->examples = $examples;
    }
    /**
     * @return array<ExamplePairingObject>|null
     */
    public function getExamples(): ?array
    {
        return $this->examples;
    }
    public function toRecord(): \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('name', $this->name);
        $record->put('tags', $this->tags);
        $record->put('summary', $this->summary);
        $record->put('description', $this->description);
        $record->put('externalDocs', $this->externalDocs);
        $record->put('params', $this->params);
        $record->put('result', $this->result);
        $record->put('deprecated', $this->deprecated);
        $record->put('servers', $this->servers);
        $record->put('errors', $this->errors);
        $record->put('links', $this->links);
        $record->put('paramStructure', $this->paramStructure);
        $record->put('examples', $this->examples);
        return $record;
    }
    public function jsonSerialize(): object
    {
        return (object) $this->toRecord()->getAll();
    }
}


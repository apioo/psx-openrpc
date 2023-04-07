<?php

declare(strict_types = 1);

namespace PSX\OpenRPC;

use PSX\Schema\Attribute\Description;

#[Description('Holds a set of reusable objects for different aspects of the OpenRPC. All objects defined within the components object will have no effect on the API unless they are explicitly referenced from properties outside the components object.')]
class Components implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?ContentDescriptors $contentDescriptors = null;
    protected ?\PSX\OpenAPI\Schemas $schemas = null;
    protected ?\PSX\OpenAPI\Examples $examples = null;
    protected ?Links $links = null;
    protected ?Errors $errors = null;
    protected ?ExamplePairingObjects $examplePairingObjects = null;
    protected ?Tags $tags = null;
    public function setContentDescriptors(?ContentDescriptors $contentDescriptors) : void
    {
        $this->contentDescriptors = $contentDescriptors;
    }
    public function getContentDescriptors() : ?ContentDescriptors
    {
        return $this->contentDescriptors;
    }
    public function setSchemas(?\PSX\OpenAPI\Schemas $schemas) : void
    {
        $this->schemas = $schemas;
    }
    public function getSchemas() : ?\PSX\OpenAPI\Schemas
    {
        return $this->schemas;
    }
    public function setExamples(?\PSX\OpenAPI\Examples $examples) : void
    {
        $this->examples = $examples;
    }
    public function getExamples() : ?\PSX\OpenAPI\Examples
    {
        return $this->examples;
    }
    public function setLinks(?Links $links) : void
    {
        $this->links = $links;
    }
    public function getLinks() : ?Links
    {
        return $this->links;
    }
    public function setErrors(?Errors $errors) : void
    {
        $this->errors = $errors;
    }
    public function getErrors() : ?Errors
    {
        return $this->errors;
    }
    public function setExamplePairingObjects(?ExamplePairingObjects $examplePairingObjects) : void
    {
        $this->examplePairingObjects = $examplePairingObjects;
    }
    public function getExamplePairingObjects() : ?ExamplePairingObjects
    {
        return $this->examplePairingObjects;
    }
    public function setTags(?Tags $tags) : void
    {
        $this->tags = $tags;
    }
    public function getTags() : ?Tags
    {
        return $this->tags;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('contentDescriptors', $this->contentDescriptors);
        $record->put('schemas', $this->schemas);
        $record->put('examples', $this->examples);
        $record->put('links', $this->links);
        $record->put('errors', $this->errors);
        $record->put('examplePairingObjects', $this->examplePairingObjects);
        $record->put('tags', $this->tags);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}


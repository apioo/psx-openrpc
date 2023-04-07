
# OpenRPC

## About

This library contains model classes to generate an OpenRPC specification in a type-safe way. The models are
automatically generated based on the [TypeSchema](https://typeschema.org/) specification (s. `typeschema.json`). The
following example shows how you can generate an OpenRPC spec:

```php
$license = new License();
$license->setName('MIT');

$info = new Info();
$info->setVersion('1.0.0');
$info->setTitle('Petstore');
$info->setLicense($license);

$server = new Server();
$server->setUrl('http://localhost:8080');

$params = [];
$content = new ContentDescriptor();
$content->setName('limit');
$content->setDescription('How many items to return at one time (max 100)');
$content->setRequired(false);
$content->setSchema((object) ['type' => 'integer', 'minimum' => 1]);
$params[] = $content;

$result = new ContentDescriptor();
$result->setName('pets');
$result->setDescription('A paged array of pets');
$result->setSchema((object) ['$ref' => '#/components/schemas/Pets']);

$errors = [];
$error = new Error();
$error->setCode(100);
$error->setMessage('pets busy');
$errors[] = $error;

$methods = [];
$method = new Method();
$method->setName('list_pets');
$method->setSummary('List all pets');
$method->setParams($params);
$method->setResult($result);
$method->setErrors($errors);
$methods[] = $method;

$schemas = new Schemas();
$schemas->put('Pet', [
    'required' => ['id', 'name'],
    'properties' => [
        'id' => ['type' => 'integer', 'format' => 'int64'],
        'name' => ['type' => 'string'],
        'tag' => ['type' => 'string'],
    ]
]);

$schemas->put('Pets', [
    'type' => 'array',
    'items' => ['$ref' => '#/components/schemas/Pet'],
]);

$components = new Components();
$components->setSchemas($schemas);

$openRPC = new OpenRPC();
$openRPC->setInfo($info);
$openRPC->setServers([$server]);
$openRPC->setMethods($methods);
$openRPC->setComponents($components);

echo json_encode($openRPC, JSON_PRETTY_PRINT);

```

This would result in the following JSON:

```json
{
  "openrpc": "1.3.0",
  "info": {
    "title": "Petstore",
    "license": {
      "name": "MIT"
    },
    "version": "1.0.0"
  },
  "servers": [
    {
      "url": "http:\/\/localhost:8080"
    }
  ],
  "methods": [
    {
      "name": "list_pets",
      "summary": "List all pets",
      "params": [
        {
          "name": "limit",
          "description": "How many items to return at one time (max 100)",
          "required": false,
          "schema": {
            "type": "integer",
            "minimum": 1
          }
        }
      ],
      "result": {
        "name": "pets",
        "description": "A paged array of pets",
        "schema": {
          "$ref": "#\/components\/schemas\/Pets"
        }
      },
      "errors": [
        {
          "code": 100,
          "message": "pets busy"
        }
      ]
    }
  ],
  "components": {
    "schemas": {
      "Pet": {
        "required": [
          "id",
          "name"
        ],
        "properties": {
          "id": {
            "type": "integer",
            "format": "int64"
          },
          "name": {
            "type": "string"
          },
          "tag": {
            "type": "string"
          }
        }
      },
      "Pets": {
        "type": "array",
        "items": {
          "$ref": "#\/components\/schemas\/Pet"
        }
      }
    }
  }
}
```

## Contribution

If you want to suggest changes please only change the `typeschema.json` specification and then run
the `php gen.php` script to regenerate all model classes.

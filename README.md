
# Lokal Processor

Supporting package for lokalkoder development environment.


## Installation

Install this project with composer

```bash
  composer require lokal/processor
```

## Usage/Examples

Define data mapping by extending ```\Lokal\Processor\Action\Parameter``` class

```
class Parameter extends \Lokal\Processor\Action\Parameter
{
    /**
     * {@inheritDoc}
     */
    public function mapping(): array
    {
        return [
            'name' => 'name',
            'address' => 'address',
            'status' => 'status',
            'rental' => 'rental_term',
            'tag' => 'tags',
            'latitude' => 'latitude',
            'longitude' => 'longitude',
        ];
    }
}
```


Define method of processing by extending ```\Lokal\Processor\Action\Processor``` class

```
class RepositoryProcessor extends Lokal\Processor\Action\Processor
{
    /**
     * {@inheritDoc}
     */
    protected function saving(array $parameters, mixed $identity = null): mixed
    {
        // Define processing method here
    }

}
```

Execute the processor using ```Lokal\Processor\Manager\Action``` class

```
(new Lokal\Processor\Manager\Action(
    new Parameter($request->input()),
    new Processor
))->process()
```
## License

[MIT](https://choosealicense.com/licenses/mit/)




<?php

declare(strict_types=1);

namespace Era269\Microobject;

use Era269\Normalizable\AbstractNormalizableObject;

abstract class AbstractIdentifier extends AbstractNormalizableObject implements IdentifierInterface
{
    private const FIELD_NAME_VALUE = 'value';

    private function __construct(
        private string $value
    ) {

    }

    /**
     * @inheritDoc
     */
    public static function create(string $id): static
    {
        return new static($id);
    }

    /**
     * @inheritDoc
     */
    public static function denormalize(array $data): static
    {
        return new static($data[self::FIELD_NAME_VALUE]);
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function equals(IdentifierInterface $other): bool
    {
        return (string)$other === (string)$this;
    }

    /**
     * @inheritDoc
     */
    protected function getNormalized(): array
    {
        return [
            self::FIELD_NAME_VALUE => $this->value
        ];
    }
}
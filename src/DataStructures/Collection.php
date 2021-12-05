<?php

declare(strict_types=1);

namespace Opmvpc\Aoc2021\DataStructures;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * @template TKey of array-key
 * @template TValue
 * @implements ArrayAccess<TKey, TValue>
 * @implements IteratorAggregate<TKey, TValue>
 * @psalm-consistent-constructor
 *
 */
class Collection implements ArrayAccess, IteratorAggregate, Countable
{
    /** @var array<TKey, TValue> */
    private array $elements = [];

    /**
     * @param array<TKey, TValue> $array
     */
    public function __construct(array $array = [])
    {
        $this->elements = $array;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->elements);
    }

    public static function make(array $array = []): Collection
    {
        return new Collection($array);
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->elements[$offset] = $value;
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->elements[$offset]);
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->elements[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->elements[$offset] ?? null;
    }

    public function toArray(): array
    {
        return $this->elements;
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function min(): int
    {
        if (count($this->elements) === 0) {
            return 0;
        }
        return intval(min($this->elements));
    }

    public function max(): int
    {
        if (count($this->elements) === 0) {
            return 0;
        }
        return intval(max($this->elements));
    }

    public function sum(): int
    {
        if (count($this->elements) === 0) {
            return 0;
        }

        return intval(array_sum($this->elements));
    }

    public function product(): int
    {
        return intval(array_product($this->elements));
    }

    /**
     * @param callable|null $callable
     * @return $this
     */
    public function filter(?callable $callable = null): self
    {
        if ($callable === null) {
            return new Collection(array_filter($this->elements));
        }

        return new Collection(array_filter($this->elements, $callable));
    }

    public function map(callable $callable): self
    {
        return new Collection(array_map($callable, $this->elements));
    }

    /**
     * @param callable $callable
     * @return TValue
     */
    public function reduce(callable $callable)
    {
        return array_reduce($this->elements, $callable);
    }

    public function dd(): void
    {
        dd($this);
    }

    /**
     * @return $this
     */
    public function dump()
    {
        dump($this);

        return $this;
    }

    public function intersect(): Collection
    {
        if (count($this->elements) <= 1) {
            return new static($this->elements[0]);
        }

        return new static(array_intersect(...$this->elements));
    }

    /**
     * @return TValue
     */
    public function first()
    {
        return $this->elements[0] ?? null;
    }

    /**
     * @return TValue
     */
    public function last()
    {
        return $this->elements[count($this->elements) - 1] ?? null;
    }

    public function flatten(): Collection
    {
        return new static(array_merge(...$this->elements));
    }

    public function keys(): array
    {
        return array_keys($this->elements);
    }

    public function isEmpty(): bool
    {
        return $this->count() === 0;
    }

    public function reIndexElements(): Collection
    {
        $this->elements = array_values($this->elements);

        return $this;
    }

    /**
     * @param TValue $value
     */
    public function add(mixed $value): void
    {
        $this->elements[] = $value;
    }
}

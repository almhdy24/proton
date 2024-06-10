<?php

namespace Proton\Support;

use Proton\Support\Arr;

class Config implements \ArrayAccess
{
    protected array $items = [];

    public function __construct($item)
{
    if ($item instanceof \Generator) {
        $item = iterator_to_array($item);
    }

    foreach ($item as $key => $value) {
        $this->items[$key] = $value;
    }
}

    public function has($keys)
    {
        // Implementation goes here
    }

    public function get($key, $default = null)
    {
        if (is_array($key)) {
            return $this->getMany($key);
        }

        return Arr::get($this->items, $key, $default);
    }

    public function getMany($keys)
    {
        $config = [];

        foreach ($keys as $key => $default) {
            if (is_numeric($key)) {
                [$key, $default] = [$default, null];
            }
            $config[$key] = Arr::get($this->items, $key, $default);
        }

        return $config;
    }

    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            Arr::set($this->items, $key, $value);
        }
    }

    public function push($key, $value)
    {
        $array = $this->get($key);

        if (!is_array($array)) {
            $array = [];
        }

        $array[] = $value;

        $this->set($key, $array);
    }

    public function all()
    {
        return $this->items;
    }

    public function exists($key)
    {
        return Arr::exists($this->items, $key);
    }
public function offsetExists($offset): bool
{
    return $this->exists($offset);
}

public function offsetGet($offset):mixed
{
    return $this->get($offset);
}

public function offsetSet($offset, $value): void
{
    $this->set($offset, $value);
}

public function offsetUnset($offset): void
{
    $this->set($offset, null);
}
    
}
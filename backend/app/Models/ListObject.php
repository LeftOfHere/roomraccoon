<?php

namespace App\Models;

use Exception;

class ListObject
{
    private $id;
    private $name;
    private $items;

    public function __construct(string $name, $items = [], $id = null)
    {
        $this->name = $name;
        $this->items = $items;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName(string $value): ListObject
    {
        $this->name = $value;
        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }
    public function setItems($value): ListObject
    {
        $this->items = $value;
        return $this;
    }

    public static function parseJson($data): ListObject
    {
        $result = null;
        try {
            $result = new ListObject($data['name'], $data['items'], $data['id']);
        } catch (Exception $e) {
            //todo: handle the error better

            $result = new ListObject('');
        }
        return $result;
    }
}

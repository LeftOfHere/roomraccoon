<?php

namespace App\Models;

use Exception;

class ListItem
{
    private $id;
    private $name;
    private $checked;

    public function __construct(string $name, bool $checked = false, $id = null)
    {
        $this->name = $name;
        $this->checked = $checked;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName(string $value): ListItem
    {
        $this->name = $value;
        return $this;
    }

    public function getChecked()
    {
        return $this->checked;
    }
    public function setChecked(bool $value): ListItem
    {
        $this->checked = $value;
        return $this;
    }

    public static function parseJson($data): ListItem
    {
        $result = null;
        try {
            $result = new ListItem($data['name'], $data['checked'], $data['id']);
        } catch (Exception $e) {
            //todo: handle the error better

            $result = new ListItem('');
        }
        return $result;
    }
}

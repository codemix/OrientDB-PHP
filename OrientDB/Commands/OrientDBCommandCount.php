<?php

class OrientDBCommandCount extends OrientDBCommandAbstract
{

    public function __construct($parent)
    {
        parent::__construct($parent);
        $this->type = OrientDBCommandAbstract::COUNT;
    }

    public function prepare()
    {
        parent::prepare();
        if (count($this->attribs) != 1) {
            throw new OrientDBWrongParamsException('This command requires cluster name');
        }
        // Add cluster name
        $this->addString($this->attribs[0]);
    }

    protected function parse()
    {
        $count = $this->readLong();
        return $count;
    }
}
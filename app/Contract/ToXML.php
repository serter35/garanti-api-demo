<?php

namespace App\Contract;

interface ToXML
{
    public function toXml(): bool|string;
}

<?php

namespace Dawan\FormationPhp\Connector;

interface ConnectionHandler {
    public function getCoordinates() : array;
}
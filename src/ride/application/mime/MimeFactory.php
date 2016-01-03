<?php

namespace ride\application\mime;

use ride\library\mime\exception\MimeException;
use ride\library\mime\MimeFactory as LibMimeFactory;
use ride\library\system\System;

/**
 * MIME factory extended to create MimeTypes from the system
 */
class MimeFactory extends LibMimeFactory {

    /**
     * Creates a MimeTypes instance based on the System instance
     * @param \ride\library\system\System
     * @return \ride\library\mime\MimeTypes
     */
    public function createMimeTypesFromSystem(System $system) {
        if ($system->isUnix()) {
            return $this->createMimeTypesFromFile('/etc/mime.types');
        }

        throw new MimeException('Could not create a MimeTypes instance: no mime.types file available');
    }

}

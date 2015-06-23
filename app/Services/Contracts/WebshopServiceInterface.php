<?php

namespace App\Services\Contracts;

interface WebshopServiceInterface
{
    /**
     * Returns information about the shop like the status, domain, email etc.
     *
     * @return array
     */
    public function shop();

    /**
     * Installs the external services and webhooks.
     *
     * @return bool
     */
    public function install();
}
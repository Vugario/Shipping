<?php

namespace App\Services;

use App\Services\Contracts\WebshopServiceInterface;

class WebshopService implements WebshopServiceInterface
{
    /** @var \WebshopappApiClient $apiClient */
    protected $apiClient;

    public function __construct(\WebshopappApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * Returns information about the shop like the status, domain, email etc.
     *
     * @return array
     */
    public function shop()
    {
        return $this->apiClient->shop->get();
    }

    /**
     * Returns a list with orders
     *
     * @param int|null $limit
     * @return array
     */
    public function orders($limit = null)
    {
        return $this->apiClient->orders->get(null, [
            'limit' => $limit
        ]);
    }

    /**
     * Installs the external services and webhooks
     *
     * @return bool
     */
    public function install()
    {
        $currentServices         = $this->apiClient->external_services->get();
        $currentWebhooks         = $this->apiClient->webhooks->get();
        $externalServiceEndpoint = url('/', [], true);
        $orderWebhookEndpoint    = url('/webhooks/orders');
        $hasShipmentInstalled    = false;
        $hasWebhooksInstalled    = false;

        foreach ($currentServices as $currentService)
        {
            if ($currentService['type'] == 'shipment' && $currentService['urlEndpoint'] == $externalServiceEndpoint)
            {
                $hasShipmentInstalled = true;

                break;
            }
        }

        if ($hasShipmentInstalled === false)
        {
            $this->apiClient->external_services->create([
                'type'          => 'shipment',
                'name'          => config('services.seoshop.shipping.name'),
                'urlEndpoint'   => $externalServiceEndpoint,
                'rateEstimate'  => config('services.seoshop.shipping.rateEstimation'),
                'isActive'      => true
            ]);
        }

        foreach ($currentWebhooks as $currentWebhook)
        {
            if ($currentWebhook['itemGroup'] == 'orders' && $currentWebhook['address'] == $orderWebhookEndpoint)
            {
                $hasWebhooksInstalled = true;
            }
        }

        if ($hasWebhooksInstalled === false)
        {
            $this->apiClient->webhooks->create([
                'itemGroup'         => 'orders',
                'itemAction'        => '*',
                'language'          => 'EN',
                'format'            => 'json',
                'address'           => $orderWebhookEndpoint,
                'isActive'          => true
            ]);
        }

        return true;
    }
}
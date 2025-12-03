<?php

namespace Allphat\Litmus\Service;

/**
 * check https://docs.litmus.com/docs/instant-api for more informations on endpoints
 *
*/
class Instant extends AbstractService
{
    const INSTANT_BASE_URI = 'https://instant-api.litmus.com/v1';

    /**
     * see https://docs.litmus.com/docs/list-supported-email-clients
     *
     * returns an array of supported email clients
     */
    public function getSupportedEmailClients()
    {
        $url = self::INSTANT_BASE_URI . '/clients';

        $response = $this->getClient()->request('GET', $url);

        return $this->getResult($response);
    }

    /**
     * see https://docs.litmus.com/docs/list-supported-email-client-configurations
     *
     * returns an array of supported email clients configuration
     */
    public function getSupportedEmailClientConfiguration()
    {
        $url = self::INSTANT_BASE_URI . '/clients/configurations';

        $response = $this->getClient()->request('GET', $url);

        return $this->getResult($response);
    }

    /**
     * see https://docs.litmus.com/docs/request-a-preview
     *
     * @var string $emailGuid email guid
     * @var string $clientName client for which preview is requested
     * @var array<string, string>|[] images and orientation parameters if non empty
     */
    public function requestPreview(string $emailGuid, string $clientName, array $params=[])
    {
        $url = self::INSTANT_BASE_URI . '/emails/' . $emailGuid . '/' . $clientName;

        $response = $this->getClient()->request('GET', $url, $params);

        return $this->getResult($response);
    }

    /**
     * see https://docs.litmus.com/docs/create-an-email
     * creates an email based on array parameters passed in request
     *
     * @var array<string,string>|[]
     *
     * @returns string email_guid
     */
    public function createEmail(array $params)
    {
        $url = self::INSTANT_BASE_URI . '/emails';

        $response = $this->getClient()->request('POST', $url, $params);

        return $this->getResult($response);
    }

    /**
     * see https://docs.litmus.com/docs/directly-request-or-embed-a-preview-image
     * @var string $emailGuid
     * @var string $client
     * @var array<string, string>|[] url parameters 
     */
    public function requestPreviewImage(string $emailGuid, string $client, string $captureSize, array $params=[])
    {
        $url = self::INSTANT_BASE_URI . '/emails/' . $emailGuid . '/' . $client . '/' .$captureSize;

        $response = $this->getClient()->request('GET', $url, $params);

        return $this->getResult($response);
    }
}

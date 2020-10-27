<?php

namespace Allphat\Litmus\Service;

/**
 * check https://docs.litmus.com/docs/instant-api for more informations on endpoints
 *
*/
class Instant extends AbstractService
{
    const INSTANT_BASE_URI = 'https://instant-api.litmus.com/v1';

    /*
     * retusn an array of supported email clients
     */
    public function getSupportedEmailClients()
    {
        $url = self::INSTANT_BASE_URI . '/clients';

        $response = $this->getClient()->request('GET', $url);

        $content = $response->getContent();

        return $content;
    }

    /*
     * returns an array of supported email clients configuration
     *
     */
    public function getSupportedEmailClientConfiguration()
    {
        $url = self::INSTANT_BASE_URI . '/clients/configuration';

        $response = $this->getClient()->request('GET', $url);

        $content = $response->getContent();

        return $content;
    }

    public function requestPreview(string $emailGuid, string $clientName, string $images= 'allowed', string $orientation='vertical')
    {
        $url = self::INSTANT_BASE_URI . '/emails/' . $emailGuid . '/' . $clientName;

        $auery = [
            'images' => $images,
            'orientation' => $orientation
        ];

        $response = $this->getClient()->request('GET', $url, ['query' => $query]);

        $content = $response->getContent();

        return $content;
    }

    /**
     * creates an email based on array parameters passed in request
     * returns string email_guid
     */
    public function createEmail(array $params)
    {
        $url = self::INSTANT_BASE_URI . '/emails';

        $response = $this->getClient()->request('POST', $url, ['json' => $params]);

        $content = $response->getContent();

        return $content;
    }

    public function requestPreviewImage(string $emailGuid, string $client, string $captureSize, array $params)
    {
        $url = self::INSTANT_BASE_URI . '/emails/' . $emailGuid . '/' . $client . '/' .$captureSize;

        $response = $this->getClient()->request('GET', $url, ['query' => $params]);

        $content = $response->getContent();

        return $content;
    }
}

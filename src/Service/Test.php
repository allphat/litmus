<?php

namespace Allphat\Litmus\Service;

class Instant extends AbstractService
{
    const TEST_BASE_URI = 'https://previews-api.litmus.com/api/v1';

    /*
     * @TODO ajouter param applicationName (tableau des applications pour lesauelles effectuer le test)
     * voir ce qu on affiche dans la reponse
     */
    public function startTest()
    {
        $url = self::INSTANT_BASE_URI . '/EmailTests';

        $response = $this->getClient()->request('POST', $url);

        $content = $response->getContent();

        return $content;
    }

    public function getTestStatus(int $id)
    {
        $url = self::TEST_BASE_URI . '/EmailTests/' . $id;

        $response = $this->getClient()->request('GET', $url);

        $content = $response->getContent();

        return $content;
    }

    public function getTest(int $id)
    {
        $url = self::TEST_BASE_URI . '/EmailTests/' . $id;

        $response = $this->getClient()->request('GET', $url);

        $content = $response->getContent();

	//check if completed
        //result type property is email => capture image accessible
        //result type porperty is spam => no capture available

        //SupportsContentBlocking = true
        /*WindowImageNoContentBlocking
          WindowImageContentBlocking
          FullpageImageNoContentBlocking
          FullpageImageContentBlocking
          
          WindowImageNoContentBlockingThumb
          WindowImageContentBlockingThumb
          FullpageImageNoContentBlockingThumb
          FullpageImageContentBlockingThumb
         */

         //SupportsContentBlocking = false
         /*WindowImage
           FullpageImage

           WindowImageThumb
           FullpageImageThumb
          */

        return $content;
    }

    public function linksTest(string $html)
    {
    }

    public function codeAnalysis(string $html)
    {
    }
}

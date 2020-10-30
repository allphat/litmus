<?php

namespace Allphat\Litmus\Service;

class Preview extends AbstractService
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

        return $this->getResult($response);
    }

    public function getTestStatus(int $id)
    {
        $url = self::TEST_BASE_URI . '/EmailTests/' . $id;

        $response = $this->getClient()->request('GET', $url);

        return $this->getResult($response);
    }

    public function getTest(int $id)
    {
        $url = self::TEST_BASE_URI . '/EmailTests/' . $id;

        $response = $this->getClient()->request('GET', $url);

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

        return $this->getResult($response);
    }

    public function linksTest(string $html)
    {
    }

    public function codeAnalysis(string $html)
    {
    }
}

<?php

namespace Zimbra\Admin\Tests\Request;

use Zimbra\Admin\Tests\ZimbraAdminApiTestCase;
use Zimbra\Admin\Request\GetCos;
use Zimbra\Admin\Struct\CosSelector;
use Zimbra\Enum\CosBy;

/**
 * Testcase class for GetCos.
 */
class GetCosTest extends ZimbraAdminApiTestCase
{
    public function testGetCosRequest()
    {
        $value = $this->faker->word;
        $attrs = $this->faker->word;
        $cos = new CosSelector(CosBy::NAME(), $value);
        $req = new GetCos($cos, [$attrs]);
        $this->assertInstanceOf('Zimbra\Admin\Request\Base', $req);
        $this->assertSame($cos, $req->getCos());

        $req->setCos($cos);
        $this->assertSame($cos, $req->getCos());

        $xml = '<?xml version="1.0"?>' . "\n"
            . '<GetCosRequest attrs="' . $attrs . '">'
                . '<cos by="' . CosBy::NAME() . '">' . $value . '</cos>'
            . '</GetCosRequest>';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);

        $array = [
            'GetCosRequest' => [
                '_jsns' => 'urn:zimbraAdmin',
                'attrs' => $attrs,
                'cos' => [
                    'by' => CosBy::NAME()->value(),
                    '_content' => $value,
                ],
            ],
        ];
        $this->assertEquals($array, $req->toArray());
    }

    public function testGetCosApi()
    {
        $attrs = $this->faker->word;
        $value = $this->faker->word;
        $cos = new CosSelector(CosBy::NAME(), $value);

        $this->api->getCos($cos, [$attrs]);

        $client = $this->api->getClient();
        $req = $client->lastRequest();
        $xml = '<?xml version="1.0"?>' . "\n"
            . '<env:Envelope xmlns:env="http://www.w3.org/2003/05/soap-envelope" xmlns:urn="urn:zimbra" xmlns:urn1="urn:zimbraAdmin">'
                . '<env:Body>'
                    . '<urn1:GetCosRequest attrs="' . $attrs . '">'
                        . '<urn1:cos by="' . CosBy::NAME() . '">' . $value . '</urn1:cos>'
                    . '</urn1:GetCosRequest>'
                . '</env:Body>'
            . '</env:Envelope>';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);
    }
}

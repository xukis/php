<?php

namespace Zimbra\Admin\Tests\Request;

use Zimbra\Admin\Tests\ZimbraAdminApiTestCase;
use Zimbra\Admin\Request\ModifyAccount;
use Zimbra\Struct\KeyValuePair;

/**
 * Testcase class for ModifyAccount.
 */
class ModifyAccountTest extends ZimbraAdminApiTestCase
{
    public function testModifyAccountRequest()
    {
        $key = $this->faker->word;
        $value = $this->faker->word;
        $id = $this->faker->uuid;

        $attr = new KeyValuePair($key, $value);
        $req = new ModifyAccount($id, [$attr]);
        $this->assertInstanceOf('Zimbra\Admin\Request\BaseAttr', $req);

        $this->assertSame($id, $req->getId());

        $req->setId($id);
        $this->assertSame($id, $req->getId());

        $xml = '<?xml version="1.0"?>' . "\n"
            . '<ModifyAccountRequest id="' . $id . '">'
                . '<a n="' . $key . '">' . $value . '</a>'
            . '</ModifyAccountRequest>';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);

        $array = [
            'ModifyAccountRequest' => [
                '_jsns' => 'urn:zimbraAdmin',
                'id' => $id,
                'a' => [
                    [
                        'n' => $key,
                        '_content' => $value,
                    ],
                ],
            ],
        ];
        $this->assertEquals($array, $req->toArray());
    }

    public function testModifyAccountApi()
    {
        $key = $this->faker->word;
        $value = $this->faker->word;
        $id = $this->faker->uuid;
        $attr = new KeyValuePair($key, $value);

        $this->api->modifyAccount(
            $id, [$attr]
        );

        $client = $this->api->getClient();
        $req = $client->lastRequest();
        $xml = '<?xml version="1.0"?>' . "\n"
            . '<env:Envelope xmlns:env="http://www.w3.org/2003/05/soap-envelope" xmlns:urn="urn:zimbra" xmlns:urn1="urn:zimbraAdmin">'
                . '<env:Body>'
                    . '<urn1:ModifyAccountRequest id="' . $id . '">'
                        . '<urn1:a n="' . $key . '">' . $value . '</urn1:a>'
                    . '</urn1:ModifyAccountRequest>'
                . '</env:Body>'
            . '</env:Envelope>';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);
    }
}

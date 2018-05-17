<?php

namespace Zimbra\Admin\Tests\Request;

use Zimbra\Mail\Tests\ZimbraMailApiTestCase;
use Zimbra\Enum\ReplyType;
use Zimbra\Mail\Request\CounterAppointment;
use Zimbra\Mail\Struct\Msg;

/**
 * Testcase class for CounterAppointment.
 */
class CounterAppointmentTest extends ZimbraMailApiTestCase
{
    public function testCounterAppointmentRequest()
    {
        $id = $this->faker->uuid;
        $comp = mt_rand(1, 10);
        $ms = mt_rand(1, 10);
        $rev = mt_rand(1, 10);

        $content = $this->faker->word;
        $fr = $this->faker->word;
        $aid = $this->faker->uuid;
        $origid = $this->faker->uuid;
        $idnt = $this->faker->word;
        $su = $this->faker->word;
        $irt = $this->faker->word;
        $l = $this->faker->word;
        $f = $this->faker->word;
        $m = new Msg(
            $content,
            NULL,
            NULL,
            NULL,
            $fr,
            $aid,
            $origid,
            ReplyType::REPLIED(),
            $idnt,
            $su,
            $irt,
            $l,
            $f
        );

        $req = new CounterAppointment(
            $m, $id, $comp, $ms, $rev
        );
        $this->assertInstanceOf('Zimbra\Mail\Request\Base', $req);
        $this->assertSame($m, $req->getMsg());
        $this->assertSame($id, $req->getId());
        $this->assertSame($comp, $req->getComponentNum());
        $this->assertSame($ms, $req->getModifiedSequence());
        $this->assertSame($rev, $req->getRevision());

        $req = new CounterAppointment();
        $req->setMsg($m)
            ->setId($id)
            ->setComponentNum($comp)
            ->setModifiedSequence($ms)
            ->setRevision($rev);
        $this->assertSame($m, $req->getMsg());
        $this->assertSame($id, $req->getId());
        $this->assertSame($comp, $req->getComponentNum());
        $this->assertSame($ms, $req->getModifiedSequence());
        $this->assertSame($rev, $req->getRevision());

        $xml = '<?xml version="1.0"?>'."\n"
            .'<CounterAppointmentRequest id="' . $id . '" comp="' . $comp . '" ms="' . $ms . '" rev="' . $rev . '">'
                .'<m aid="' . $aid . '" origid="' . $origid . '" rt="' . ReplyType::REPLIED() . '" idnt="' . $idnt . '" su="' . $su . '" irt="' . $irt . '" l="' . $l . '" f="' . $f . '">'
                    .'<content>' . $content . '</content>'
                    .'<fr>' . $fr . '</fr>'
                .'</m>'
            .'</CounterAppointmentRequest>';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);

        $array = array(
            'CounterAppointmentRequest' => array(
                '_jsns' => 'urn:zimbraMail',
                'id' => $id,
                'comp' => $comp,
                'ms' => $ms,
                'rev' => $rev,
                'm' => array(
                    'aid' => $aid,
                    'origid' => $origid,
                    'rt' => ReplyType::REPLIED()->value(),
                    'idnt' => $idnt,
                    'su' => $su,
                    'irt' => $irt,
                    'l' => $l,
                    'f' => $f,
                    'content' => $content,
                    'fr' => $fr,
                ),
            ),
        );
        $this->assertEquals($array, $req->toArray());
    }

    public function testCounterAppointmentApi()
    {
        $id = $this->faker->uuid;
        $comp = mt_rand(1, 10);
        $ms = mt_rand(1, 10);
        $rev = mt_rand(1, 10);

        $content = $this->faker->word;
        $fr = $this->faker->word;
        $aid = $this->faker->uuid;
        $origid = $this->faker->uuid;
        $idnt = $this->faker->word;
        $su = $this->faker->word;
        $irt = $this->faker->word;
        $l = $this->faker->word;
        $f = $this->faker->word;
        $m = new Msg(
            $content,
            NULL,
            NULL,
            NULL,
            $fr,
            $aid,
            $origid,
            ReplyType::REPLIED(),
            $idnt,
            $su,
            $irt,
            $l,
            $f
        );

        $this->api->counterAppointment(
            $m, $id, $comp, $ms, $rev
        );

        $client = $this->api->getClient();
        $req = $client->lastRequest();
        $xml = '<?xml version="1.0"?>'."\n"
            .'<env:Envelope xmlns:env="http://www.w3.org/2003/05/soap-envelope" xmlns:urn="urn:zimbra" xmlns:urn1="urn:zimbraMail">'
                .'<env:Body>'
                    .'<urn1:CounterAppointmentRequest id="' . $id . '" comp="' . $comp . '" ms="' . $ms . '" rev="' . $rev . '">'
                        .'<urn1:m aid="' . $aid . '" origid="' . $origid . '" rt="' . ReplyType::REPLIED() . '" idnt="' . $idnt . '" su="' . $su . '" irt="' . $irt . '" l="' . $l . '" f="' . $f . '">'
                            .'<urn1:content>' . $content . '</urn1:content>'
                            .'<urn1:fr>' . $fr . '</urn1:fr>'
                        .'</urn1:m>'
                    .'</urn1:CounterAppointmentRequest>'
                .'</env:Body>'
            .'</env:Envelope>';
        $this->assertXmlStringEqualsXmlString($xml, (string) $req);
    }
}

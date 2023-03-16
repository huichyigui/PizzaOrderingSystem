<?php
// Author: Ng Jun Chen
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\DesignPattern\State\deliveryStateControl;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use XSLTProcessor;
use DOMXPath as GlobalDOMXPath;
use DOMDocument;

class DeliveryController extends Controller
{

    public function delivering()
    {

        $name = "delivering";

        return view('/delivery/delivering', [
            'name' => $name
        ]);
    }

    public function processing()
    {

        $name = "processing";

        return view('/delivery/processing', [
            'name' => $name
        ]);
    }

    public function delivered()
    {

        $name = "processing";

        return view('/delivery/delivered', [
            'name' => $name
        ]);
    }

    public function changeStatus(Request $request)
    {
        $Delivery = new deliveryStateControl();

        $request->validate([
            'deliveryID' => 'required|regex:/(^D(\d+)?$)/',
        ]);

        $deliveryID = $request->input('deliveryID');

        $Delivery->chgState($deliveryID);

        return redirect('/rider');
    }

    public function rider()
    {

        $deliveryCollection = Delivery::all();

        $xmlFile = $this->generateXML($deliveryCollection);

        $this->contructXpath("xml/menu/delivery.xml");

        return view('/rider', [
            'name' => '',
            'deliveryReport' => $xmlFile
        ]);
    }

    public function checkStatus()
    {
        $deliveryID = Delivery::select('deliveryID')->latest()->get()->value('deliveryID');

        $state = DB::table('deliveries')->where('deliveryID', $deliveryID)->value('deliveryStatus');

        if ($state == 'Pending') {
            return view('/delivery/pending', [
                'name' => $state
            ]);
        } else if ($state == 'Processing') {
            return view('/delivery/processing', [
                'name' => $state
            ]);
        } else if ($state == 'Delivering') {
            return view('/delivery/delivering', [
                'name' => $state
            ]);
        } else if ($state == 'Delivered') {
            return view('/delivery/delivered', [
                'name' => $state
            ]);
        } else {
            abort('404');
        }
    }

    private $xpath;

    public function contructXpath($filename)
    {
        $doc = new DOMDocument();
        $doc->load($filename);
        $this->xpath = new GlobalDOMXPath($doc);
    }


    public function generateXML($deliveryCollection)
    {
        $filePath = "xml/menu/delivery.xml";
        $dom = new DOMDocument('1.0', 'UTF-8');
        $xslt = $dom->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="xml/menu/delivery.xsl"');
        $dom->appendChild($xslt);
        $dom->formatOutput = true;
        $root = $dom->createElement('list');

        $items = $dom->createElement('records');
        for ($i = 0; $i < $deliveryCollection->count(); $i++) {
            $item = $dom->createElement('record');
            $item->setAttribute('deliveryID', htmlentities($deliveryCollection[$i]->deliveryID));

            $location = $dom->createElement('location', htmlentities($deliveryCollection[$i]->deliveryLocation));
            $item->appendChild($location);

            $startTime = $dom->createElement('startTime', htmlentities($deliveryCollection[$i]->deliveryStartTime));
            $item->appendChild($startTime);

            $endTime = $dom->createElement('endTime', htmlentities($deliveryCollection[$i]->deliveryEndTime));
            $item->appendChild($endTime);

            $status = $dom->createElement('status', htmlentities($deliveryCollection[$i]->deliveryStatus));
            $item->appendChild($status);

            $items->appendChild($item);
        }

        //Add into root
        $root->appendChild($items);

        $dom->appendChild($root);

        //Save XML to local directory
        $dom->save($filePath);

        $xsl = new DOMDocument();
        $xsl->load('xml/menu/delivery.xsl');

        //Create the processor and import the stylesheet
        $proc = new XSLTProcessor();
        $proc->importStylesheet($xsl);

        return $proc->transformToXml($dom);
    }
}

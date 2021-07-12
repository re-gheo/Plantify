<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Classes\Trackingmore;
use App\Classes\Trackingmore3;
use App\Classes\TrackApi\Tracking\Api;
use App\Classes\TrackApi\Tracking\Webhook;


class TrackingController extends Controller
{
    private $tmore;

    public function __construct()
    {
        $this->tmore = new Trackingmore3();
    }

    public function index()
    {



        // dd( $this->tmore->getCarrierList());

        // dd($this->tmore->getSingleTrackingResult("ninjavan-ph","07102021JQDB498"));
        // dd($this->tmore->getTrackingsList());
        // dd($this->tmore->getTrackingsList());

        $api = new Api;
        // $data = [
        //     ["tracking_number" => "UB209300714LV", "carrier_code" => "cainiao"],
        //     // ["tracking_number" => "2B2W09300714LV", "carrier_code" => "cainiao"]
        // ];
        // $response = json_decode($api->get($data));
        // $data = ["tracking_number" => "UB209300714LV", "carrier_code" => "cainiao"];
// $response = $api->notupdate($data);
        // dd($response = json_decode($api->transitTime( ["tracking_number" => "UB209300714LV", "carrier_code" => "cainiao"])));
        // $webhook = new Webhook;
        // dd($webhook->get());
        // $data = ["UB209300714LV"];
        // $response = $api->get($data);
        // dd( $response);



        $data = ["tracking_number" => "UB209300714LV", "carrier_code" => "cainiao", "logistics_channel" => 
        "4px channel", "customer_email" => "example@abc.com", "order_number" => "#1234"];
        $response = $api->modifyinfo($data);
        dd(json_decode($response));
        dump(json_decode($api->create(
            [
                "tracking_number" => "2B2W09300714LV",
                "courier_code" => "cainiao",
                "order_number" => "#1234",
                "destination_code" => "LV",
                "logistics_channel" => "4px channel",
                "customer_name" => "test",
                "customer_email" => "example@abc.com",
                "customer_phone" => "+1123456789",
                "note" => "check",
                "title" => "title",
                "lang" => "en"

            ]
        )));
        // $data = ["tracking_numbers" => "2B2W09300714LV"];
        $response = json_decode($api->get());
        dd($response);
        // foreach ($response->data as $res) {
        //     // dump($res);
        //     if ($res->tracking_number == "07102021BBWY993") {
        //         $result = $res;
        //         break;
        //     }
        // }
        // dump($res);
        $data = ["US", "90001", "usps"];
        $response = $api->remote($data);
        dd($response);
        // customer@plantify.com
        dd(json_decode($api->get()));
    }
}

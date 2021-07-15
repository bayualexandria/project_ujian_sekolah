<?php

namespace App\Libraries;

class WhatsappAPI
{

    private $id = 1195; //Please change it with your ID
    private $key = "b822224a6b54ee4c9e0cf9c709ab280a591204e8";

    public function send($send_to, $message_body)
    {

        $data = array('to' => $send_to, 'msg' => $message_body);

        $url = "https://onyxberry.com/services/wapi/Client/sendMessage";
        $url = $url . '/' . $this->id . '/' . $this->key;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        return $response;
    }
}

<?php

namespace Ayvazyan10\LaravelGoogleTranslator;

use Illuminate\Support\Facades\Config;

class LaravelGoogleTranslator
{
    /**
     * @param $from // language code en,fr,ru etc...
     * @param $to // language code en,fr,ru etc...
     * @param $text // text for translator
     * @throws \Exception
     *
     * First inject
     */
    public function trans($from, $to, $text)
    {
        // request - $from "en" $to "ru" $text "text for translate"
        $req = $this->requestTranslation($from, $to, $text);

        // clean translation and return
        return $this->getSentencesFromJSON($req);
    }

    /**
     * @param $from
     * @param $to
     * @param $text
     * @return bool|string
     * @throws \Exception
     *
     * Request to the translator service
     */
    protected function requestTranslation($from, $to, $text)
    {
        if (strlen($text) >= 5000) {
            throw new \Exception("Maximum number of characters exceeded: 5000");
        }

        // Google Translator URL
        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&dt=t";

        $f_items = [
            'sl' => urlencode($from),
            'tl' => urlencode($to),
            'q' => urlencode($text),
        ];

        // preparing data for the POST
        $f_string = "";
        foreach ($f_items as $key => $value) {
            $f_string .= '&' . $key . '=' . $value;
        }

        $f_string = rtrim($f_string, '&');

        try {
            // Open connection
            $ch = curl_init();

            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);

            if (count(Config::get('laravelgoogletranslator.proxy')) > 0) {
                curl_setopt($ch, CURLOPT_PROXY, array_rand(Config::get('laravelgoogletranslator.proxy'), 1));
            }

            curl_setopt($ch, CURLOPT_POST, count($f_items));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $f_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            // Execute post
            $result = curl_exec($ch);

            // Close connection
            curl_close($ch);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return $result;
    }

    /**
     * @param $json
     * @return object
     * @throws \Exception
     *
     * Dump of the JSON's response in an array
     */
    protected function getSentencesFromJSON($json)
    {
        $sentencesArray = json_decode($json, true);

        if ($sentencesArray === null) {
            throw new \Exception("Google detected unusual traffic from your computer network, try again later (2 - 48 hours) or use proxy");
        }

        $sentences = "";

        foreach ($sentencesArray[0] as $sentence) {
            $sentences .= isset($sentence[0]) ? $sentence[0] : '';
        }

        return $sentences;
    }
}

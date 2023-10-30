<?php

namespace Uisp\Plugin\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    const API_URL = 'https://cism-i-409//api/v1.0';
    const APP_KEY = 'JwCePUS1BLn9mGpWZoQSwsNqYIsgZhMWTIhS3K7dRdM+for1EXqHeo6Ra2Niopfa';

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,

    ) {
        parent::__construct($context);
    }
    /**
     * @param string $url
     * @param string $method
     * @param array  $post
     *
     * @return array|null
     */
    public static function doRequest($url, $method = 'GET', $post = [])
    {
        $method = strtoupper($method);

        $ch = curl_init();

        curl_setopt(
            $ch,
            CURLOPT_URL,
            sprintf(
                '%s/%s',
                self::API_URL,
                $url
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'Content-Type: application/json',
                sprintf('X-Auth-App-Key: %s', self::APP_KEY),
            ]
        );

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($method !== 'GET') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        if (!empty($post)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
        }

        $response = curl_exec($ch);

        if (curl_errno($ch) !== 0) {
            echo sprintf('Curl error: %s', curl_error($ch)) . PHP_EOL;
        }

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) >= 400) {
            echo sprintf('API error: %s', $response) . PHP_EOL;
            $response = false;
        }

        curl_close($ch);

        return $response !== false ? json_decode($response, true) : null;
    }

    public function getClient()
    {
        $servicePlan = Index::doRequest('service-plans') ?: [];
        return $servicePlan;
        // print'<pre>';
        // print_r($servicePlan);
        // die();
    }
}

// Setting unlimited time limit (updating lots of clients can take a long time).
// set_time_limit(0);

// if (php_sapi_name() !== 'cli') {
//     echo '<pre>';
// }

// Get collection of all Clients.
// $clients = Index::doRequest('clients') ?: [];
// echo sprintf('Found %d clients.', count($clients)) . PHP_EOL;

// Go through all Clients and update them.
// In this case we are updating all invoice options to use system defaults.
// foreach ($clients as $client) {
//     $response = Index::doRequest(
//         sprintf('clients/%d', $client['id']),
//         'PATCH',
//         [
//             'sendInvoiceByPost' => null,
//             'invoiceMaturityDays' => null,
//             'stopServiceDue' => null,
//             'stopServiceDueDays' => null,
//         ]
//     );

//     if ($response !== null) {
//         echo sprintf('Client ID %d successfully updated.', $client['id']) . PHP_EOL;
//     } else {
//         echo sprintf('There was an error in updating client ID %d.', $client['id']) . PHP_EOL;
//     }
// }

// echo 'Done.' . PHP_EOL;

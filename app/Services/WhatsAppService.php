<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $token;
    protected $phoneId;

    public function __construct()
    {
        $this->token = env('WHATSAPP_TOKEN');
        $this->phoneId = env('WHATSAPP_PHONE_ID');
    }

    public function sendHello()
    {
        $url = "https://graph.facebook.com/v22.0/{$this->phoneId}/messages";

        $response = Http::withToken($this->token)
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => '51960335525',
                'type' => 'template',
                'template' => [
                    'name' => 'hello_world',
                    'language' => ['code' => 'en_US'],
                ],
            ]);

        return $response->json();
    }

    public function sendTemplateExample($to)
    {
        $url = "https://graph.facebook.com/v22.0/{$this->phoneId}/messages";

        $response = Http::withToken($this->token)
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'template',
                'template' => [
                    'name' => 'hello_world',
                    'language' => ['code' => 'en_US'],
                ],
            ]);

        return $response->json();
    }

    public function sendTemplateLibro($to)
    {
        $url = "https://graph.facebook.com/v22.0/{$this->phoneId}/messages";

        $response = Http::withToken($this->token)
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'template',
                'template' => [
                    'name' => 'registro_enviar_link',
                    'language' => ['code' => 'es_PE'],
                    'components' => [
                        [
                            'type' => 'header',
                            'parameters' => [
                                [
                                    'type' => 'image',
                                    'image' => [
                                        'link' => 'https://www.fumisolucionesac.com/assets/img/logo.png',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]);

        return $response->json();
    }

    public function sendTemplateRegistro($to, $nombreCliente = null)
    {
        $url = "https://graph.facebook.com/v22.0/{$this->phoneId}/messages";

        $response = Http::withToken($this->token)
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'template',
                'template' => [
                    'name' => 'registro_confirmacion',
                    'language' => ['code' => 'en'],
                    'components' => [
                        [
                            'type' => 'body',
                            'parameters' => [
                                ['type' => 'text', 'text' => $nombreCliente ?? 'Cliente'],
                            ],
                        ],
                    ],
                ],
            ]);

        return $response->json();
    }

    public function sendText($to, $text)
    {
        $url = "https://graph.facebook.com/v22.0/{$this->phoneId}/messages";

        $response = Http::withToken($this->token)
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'text',
                'text' => ['body' => $text],
            ]);

        return $response->json();
    }
}

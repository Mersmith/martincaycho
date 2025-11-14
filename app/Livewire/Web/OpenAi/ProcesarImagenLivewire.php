<?php

namespace App\Livewire\Web\OpenAi;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use OpenAI\Laravel\Facades\OpenAI;

#[Layout('layouts.web.layout-web')]
class ProcesarImagenLivewire extends Component
{
    use WithFileUploads;

    public $imagen;
    public $datos = [];
    public $procesando = false;

    public function procesarImagen()
    {
        $this->validate([
            'imagen' => 'required|image|max:4096',
        ]);

        $this->procesando = true;

        try {
            $imageData = base64_encode(file_get_contents($this->imagen->getRealPath()));

            $response = OpenAI::responses()->create([
                'model' => 'gpt-4o-mini',
                'input' => [[
                    'role' => 'user',
                    'content' => [
                        [
                            'type' => 'input_text',
                            'text' => 'Extrae los datos del comprobante de pago: número de comprobante, banco, monto y fecha. Devuélvelo en formato JSON.',
                        ],
                        [
                            'type' => 'input_image',
                            'image_url' => 'data:image/png;base64,' . $imageData,
                        ],
                    ],
                ]],
            ]);

            $texto = $response['output'][0]['content'][0]['text'] ?? '';
            $this->datos = json_decode($texto, true) ?? [];

        } catch (\OpenAI\Exceptions\RateLimitException $e) {
            session()->flash('error', '⚠️ Has alcanzado el límite de peticiones. Espera un momento e inténtalo de nuevo.');
        } catch (\Exception $e) {
            session()->flash('error', '❌ Error al procesar la imagen: ' . $e->getMessage());
        }

        $this->procesando = false;
    }

    public function guardar()
    {
        // Guardar en la base de datos, por ejemplo:
        // Comprobante::create($this->datos);
        session()->flash('success', 'Comprobante guardado correctamente.');
        $this->reset(['imagen', 'datos']);
    }

    public function render()
    {
        return view('livewire.web.open-ai.procesar-imagen-livewire');
    }
}

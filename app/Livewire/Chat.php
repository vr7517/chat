<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Chat extends Component
{
    public string $input = '';
    public array $messages = [];

    public function send()
    {
        if (trim($this->input) === '') return;

        $this->messages[] = ['sender' => 'user', 'text' => $this->input];

        $responseText = $this->askGemini($this->input);

        $this->messages[] = ['sender' => 'ai', 'text' => $responseText];

        $this->input = '';
    }

private function askGemini(string $prompt): string
{
    $apiKey = config('services.gemini.key');
    $model = config('services.gemini.model', 'gemini-2.0-flash');

    $url = "https://generativelanguage.googleapis.com/v1/models/{$model}:generateContent?key={$apiKey}";

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post($url, [
        'contents' => [
            [
                'parts' => [
                    ['text' => $prompt]
                ]
            ]
        ]
    ]);

    if ($response->failed()) {
        return '[Gemini API Error]: ' . $response->body();
    }

    return $response->json('candidates.0.content.parts.0.text') ?? '[No response]';
}





    public function render()
    {
        return view('livewire.chat');
    }
}

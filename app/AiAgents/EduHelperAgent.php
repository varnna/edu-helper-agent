<?php

namespace App\AiAgents;

use OpenAI;

class EduHelperAgent
{
    public function respond($message)
    {
        $client = OpenAI::factory()
            ->withApiKey(env('OPENAI_API_KEY'))
            ->withBaseUri(env('OPENAI_BASE_URL'))
            ->make();

      $response = $client->chat()->create([

    'model' => 'llama-3.1-8b-instant',

    'messages' => [

        [
            'role' => 'system',
            'content' => '
            You are EduHelperAgent.

            Rules:
            - ALWAYS start every reply with a polite greeting like:
             "Hello!" or "Hi!"
            - Answer ONLY:
              Solar System
              Fractions
              Water Cycle

            - Maximum 60 words.

            - If outside topic say:
            "I can only help with Solar System, Fractions, or Water Cycle for now."
            '
        ],

        [
            'role' => 'user',
            'content' => $message
        ]
    ],
]);

        return $response['choices'][0]['message']['content'];
    }
}
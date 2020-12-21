<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use DOMDocument;
use DOMXPath;

class StatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Status::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $html = file_get_contents('https://xaviesteve.com/pro/realipsum/');
        $sentenceDOC = new DOMDocument();

        libxml_use_internal_errors(TRUE);
        if (!empty($html)) {
            $sentenceDOC->loadHTML($html);
            libxml_clear_errors();
            
            $sentencePath = new DOMXPath($sentenceDOC);
            $sentenceRow = $sentencePath->query('//p');

            if ($sentenceRow->length >= 2) {
                $sentence = $sentenceRow[1]->firstChild->textContent;
            } else {
                $sentence = $this->faker->sentence(15);
            }
        }
        
        return [
            'body' => $sentence
        ];
    }
}

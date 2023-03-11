<?php

namespace Domains\Contact\Traits;

trait DefaultContactList
{
    private function ContactList(): array
    {
        return [

            [
                'id' => fake()->uuid(),
                'purpose' => 'subscribe',
                'problem' => [
                    'i can \'\t subscribe',
                    'subscribe dose not working',
                ],
            ],

            [
                'id' => fake()->uuid(),
                'purpose' => 'payment',
                'problem' => [
                    'i can \'\t payment',
                    'payment with paypal dose not working'
                ],
            ],

            [
                'id' => fake()->uuid(),
                'purpose' => 'other',
                'problem' => null
            ],


        ];
    }
}

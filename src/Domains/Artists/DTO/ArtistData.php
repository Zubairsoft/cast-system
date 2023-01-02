<?php

namespace Domains\Artists\DTO;

use Spatie\LaravelData\Data;

class ArtistData extends Data
{
    public function __construct(
        public? string $name_ar,
        public? string $name_en,
        public? string $date_of_birth,
        public? string $country,
    ) {
    }

    public static function fromRequest($request): ArtistData
    {
        return new ArtistData(
            $request->post('artist_name_ar'),
            $request->post('artist_name_en'),
            $request->post('date_of_birth'),
            $request->post('country')
        );
    }
}

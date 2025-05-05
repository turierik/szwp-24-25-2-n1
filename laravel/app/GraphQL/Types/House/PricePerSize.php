<?php declare(strict_types=1);

namespace App\GraphQL\Types\House;
use App\Models\House;

final readonly class PricePerSize
{
    /** @param  array{}  $args */
    public function __invoke(House $_, array $args)
    {
        // TODO implement the resolver
        return $_ -> rent / $_ -> size;
    }
}

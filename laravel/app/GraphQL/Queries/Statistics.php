<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

final readonly class Statistics
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        // TODO implement the resolver
        return [
            "averageTemp" => 4.123,
            "over30Celsius" => 45
        ];
    }
}

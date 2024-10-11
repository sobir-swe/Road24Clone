<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

use MoonShine\Fields\Date;
use MoonShine\Fields\Relationships\HasOne;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Car>
 */
class CarResource extends ModelResource
{
    protected string $model = Car::class;

    protected string $title = 'Cars';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Model'),
                Text::make('Color'),
                Date::make('Year')->format('Y'),
                Textarea::make('Plate Number'),
                HasOne::make('Owner', 'owner'),
            ]),
        ];
    }

    /**
     * @param Car $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}

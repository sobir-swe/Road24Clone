<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\License;

use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<License>
 */
class LicenseResource extends ModelResource
{
    protected string $model = License::class;

    protected string $title = 'Licenses';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('First name', 'first_name')->sortable(),
                Text::make('Last name', 'last_name')->sortable(),
            ]),
        ];
    }

    /**
     * @param License $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}

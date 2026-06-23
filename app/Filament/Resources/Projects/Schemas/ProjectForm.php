<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('location'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('documentation'),
                TextInput::make('owner'),
                TextInput::make('architect'),
                TextInput::make('longitude'),
                TextInput::make('latitude'),
                TextInput::make('progress_project'),
                Select::make('status')
                    ->options(['done' => 'Done', 'progress' => 'Progress', 'hold' => 'Hold', 'cancelled' => 'Cancelled'])
                    ->default('progress')
                    ->required(),
            ]);
    }
}

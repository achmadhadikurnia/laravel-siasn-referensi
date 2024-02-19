<?php

namespace Kanekescom\Siasn\Referensi\Filament\Resources\KedudukanHukumResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Referensi\Filament\Resources\KedudukanHukumResource;

class ManageKedudukanHukums extends ManageRecords
{
    protected static string $resource = KedudukanHukumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('sync')
                ->requiresConfirmation()
                ->action(fn () => Artisan::call('siasn-referensi:pull kedudukan-hukum')),
        ];
    }
}

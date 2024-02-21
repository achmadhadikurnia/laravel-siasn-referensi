<?php

namespace Kanekescom\Siasn\Referensi\Filament\Resources\LokasiResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Referensi\Filament\Resources\LokasiResource;
use Kanekescom\Siasn\Referensi\Filament\Traits\HasSubheadingWithLatestSync;

class ManageLokasis extends ManageRecords
{
    use HasSubheadingWithLatestSync;

    protected static string $resource = LokasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('sync')
                ->requiresConfirmation()
                ->action(fn () => Artisan::call('siasn-referensi:pull lokasi')),
        ];
    }
}
<?php

namespace Kanekescom\Siasn\Referensi\Filament\Resources\KelJabatanResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Artisan;
use Kanekescom\Siasn\Referensi\Filament\Resources\KelJabatanResource;

class ManageKelJabatans extends ManageRecords
{
    protected static string $resource = KelJabatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('sync')
                ->requiresConfirmation()
                ->action(fn () => Artisan::call('siasn-referensi:pull kel-jabatan')),
        ];
    }
}

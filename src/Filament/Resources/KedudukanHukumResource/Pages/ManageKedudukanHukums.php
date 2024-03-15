<?php

namespace Kanekescom\Siasn\Referensi\Filament\Resources\KedudukanHukumResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Log;
use Kanekescom\Siasn\Referensi\Filament\Resources\KedudukanHukumResource;
use Kanekescom\Siasn\Referensi\Filament\Traits\HasSubheadingWithLatestSync;
use Kanekescom\Siasn\Referensi\Jobs\PullKedudukanHukumJob;

class ManageKedudukanHukums extends ManageRecords
{
    use HasSubheadingWithLatestSync;

    protected static string $resource = KedudukanHukumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('sync')
                ->requiresConfirmation()
                ->action(function () {
                    try {
                        PullKedudukanHukumJob::dispatch()
                            ->afterResponse();

                        Notification::make()
                            ->title('Pulling a new data in background')
                            ->success()
                            ->send();
                    } catch (\Throwable $e) {
                        Notification::make()
                            ->title('Something went wrong')
                            ->danger()
                            ->body($e->getMessage())
                            ->send();

                        Log::error($e->getMessage());
                    }
                }),
        ];
    }
}

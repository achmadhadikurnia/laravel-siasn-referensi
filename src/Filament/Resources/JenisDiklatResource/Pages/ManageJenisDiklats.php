<?php

namespace Kanekescom\Siasn\Referensi\Filament\Resources\JenisDiklatResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Log;
use Kanekescom\Siasn\Referensi\Filament\Resources\JenisDiklatResource;
use Kanekescom\Siasn\Referensi\Filament\Traits\HasSubheadingWithLatestSync;
use Kanekescom\Siasn\Referensi\Jobs\PullJenisDiklatJob;

class ManageJenisDiklats extends ManageRecords
{
    use HasSubheadingWithLatestSync;

    protected static string $resource = JenisDiklatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('sync')
                ->requiresConfirmation()
                ->action(function () {
                    try {
                        dispatch(new PullJenisDiklatJob(auth()->user()));

                        if (config('queue.default') != 'sync') {
                            Notification::make()
                                ->title('Sync data in the background')
                                ->success()
                                ->send();
                        }
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

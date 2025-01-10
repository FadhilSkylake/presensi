<?php

namespace App\Filament\Resources\AttendanceResource\Pages;

use App\Filament\Resources\AttendanceResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;

class ListAttendances extends ListRecords
{
    protected static string $resource = AttendanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Donwload Data Presensi')
                ->url(route('attendance-export'))
                ->color('danger'),
            Action::make('presensi')
                ->url(route('presensi'))
                ->color('aw'),
            Actions\CreateAction::make(),
        ];
    }
}

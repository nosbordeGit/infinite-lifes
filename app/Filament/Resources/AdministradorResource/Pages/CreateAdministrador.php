<?php

namespace App\Filament\Resources\AdministradorResource\Pages;

use App\Filament\Resources\AdministradorResource;
use App\Models\Administrador;
use App\Models\User;
use App\Services\criptografiaService;
use App\Services\registroUsuarioService;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Http\Request;

class CreateAdministrador extends CreateRecord
{
    protected static string $resource = AdministradorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $request = Request::create('/route', 'POST', $data);

        $registroUsuarioService = new registroUsuarioService();
        $usuario = $registroUsuarioService->storeUsuario($request);

        unset($data['telefone']);
        unset($data['email']);
        unset($data['password']);
        $data['user_id'] = $usuario->id;
        //$administrador = $registroUsuarioService->storeAdministrador($request, $usuario);

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Administrator registered';
    }
}

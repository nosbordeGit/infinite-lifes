<?php

namespace App\Filament\Resources\AdministradorResource\Pages;

use App\Filament\Resources\AdministradorResource;
use App\Models\Administrador;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class EditAdministrador extends EditRecord
{
    protected static string $resource = AdministradorResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $admin = Administrador::find($data['id']);
        $usuario = User::find($admin->user_id);
        $data['email'] = $usuario->email;
        $data['telefone'] = $usuario->telefone;

        return $data;

    }


    protected function beforeValidate(): void
    {
        $exemplo = $this->form->getState();
        dd($exemplo);
        $dataAll = collect(FacadesRequest::only('components'));
        $components = $dataAll->get('components');
        dd($dataAll, $components);
        $snapshot = collect($components[0])->get('snapshot');
        $snapshot = json_decode($snapshot, true);
        $collect = $snapshot['data']['data'];
        dd($snapshot,$collect);
        $collect = collect($collect[0]);
        $emailTelefone = $collect->only(['telefone', 'email']);
        $idAdmin = $collect->only('id');
        $regras = [
            'email' => 'required', 'string', 'lowercase', 'email', 'max:255',
            'telefone' => 'required', 'string', 'max:17', 'regex:/^[0-9]{2} [0-9]{2} [0-9]{5}-[0-9]{4}$/'
        ];
//dd('regra', $regras);
        $validacao = Validator::make($emailTelefone->toArray(), $regras);
        if($validacao->fails()){
            $this->redirect($this->getResource()::getUrl('edit', ['record' => $this->record->id]));
        }else{
            unset($collect['email']);
            unset($collect['telefone']);
            unset($collect['password']);
        }
    }


    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

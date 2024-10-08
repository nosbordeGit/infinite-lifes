<?php

namespace App\Filament\Resources\AdministradorResource\Pages;

use App\Filament\Resources\AdministradorResource;
use App\Models\Administrador;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateAdministrador extends CreateRecord
{
    protected static string $resource = AdministradorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Garantir que os campos 'email', 'telefone' e 'password' estão definidos
        if (!isset($data['email']) || !isset($data['telefone']) || !isset($data['password'])) {
            throw new \Exception('Os campos "email", "telefone" e "password" são obrigatórios.');
        }

        // Criação do usuário na tabela users
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telefone' => $data['telefone'],
            'tipo' => $data['tipo'],
        ]);

        // Remover os campos que não pertencem à tabela administrador
        unset($data['email'], $data['password'], $data['telefone']);

        // Associar o user_id ao administrador
        $data['user_id'] = $user->id;

        return $data;
    }
}

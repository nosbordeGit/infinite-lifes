<?php

namespace App\Filament\Resources\AdministradorResource\Pages;

use App\Filament\Resources\AdministradorResource;
use App\Models\Administrador;
use App\Models\User;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EditAdministrador extends EditRecord
{
    protected static string $resource = AdministradorResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Buscar o administrador e o usuário relacionado
        $admin = Administrador::find($this->record->id); // Utilize o ID do registro atual

        if ($admin) {
            $user = User::find($admin->user_id);

            if ($user) {
                // Carregar email e telefone para o formulário
                $data['email'] = $user->email ?? ''; // Adiciona o email ao formulário
                $data['telefone'] = $user->telefone ?? ''; // Adiciona o telefone ao formulário
            }
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Buscar o administrador e o usuário relacionado
        $admin = Administrador::find($this->record->id);

        if ($admin) {
            $user = User::find($admin->user_id);

            if ($user) {
                try {
                    // Verificar se o e-mail é diferente e está disponível para outro usuário
                    if ($data['email'] !== $user->email) {
                        $emailExists = User::where('email', $data['email'])->where('id', '!=', $user->id)->exists();

                        if ($emailExists) {
                            throw new \Exception("Este e-mail já está em uso por outro usuário.");
                        }
                    }

                    // Atualizar o usuário na tabela users
                    $user->updateOrFail([
                        'email' => $data['email'] ?? $user->email,
                        'telefone' => $data['telefone'] ?? $user->telefone,
                        'password' => isset($data['password']) && $data['password'] ? Hash::make($data['password']) : $user->password,
                    ]);

                } catch (ModelNotFoundException $e) {
                    throw new \Exception("Erro ao atualizar o usuário: " . $e->getMessage());
                } catch (\Exception $e) {
                    throw new \Exception($e->getMessage());
                }
            }
        }

        // Remover campos que não pertencem ao administrador
        unset($data['email'], $data['password'], $data['telefone']);

        return $data;
    }
}

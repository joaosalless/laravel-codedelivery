<?php
return [

    'status'              => [
        'created'                   => 'Usuário criado com sucesso',
        'updated'                   => 'Usuário atualizado com sucesso',
        'deleted'                   => 'Usuário deletado com sucesso',
        'global-enabled'            => 'Usuários selecionados ativados.',
        'global-disabled'           => 'Usuários selecionados desativados.',
        'enabled'                   => 'Usuário ativado.',
        'disabled'                  => 'Usuário desativado.',
        'no-user-selected'          => 'Nenhum usuário selecionado.',
    ],

    'error'               => [
        'cant-be-edited'                => 'Usuário não pode ser editado',
        'cant-be-deleted'               => 'Usuário não pode ser deletado',
        'cant-be-disabled'              => 'Usuário não pode ser desativado',
        'login-failed-user-disabled'    => 'Essa conta foi desativada.',
    ],

    'page'              => [
        'index'              => [
            'title'             => 'Admin | Users',
            'description'       => 'Lista de usuários',
            'table-title'       => 'Lista de usuários',
        ],
        'show'              => [
            'title'             => 'Admin | User | Show',
            'description'       => 'Exibindo usuário: :full_name',
            'section-title'     => 'Detalhes do usuário'
        ],
        'create'            => [
            'title'            => 'Admin | User | Create',
            'description'      => 'Criando novo usuário',
            'section-title'    => 'Novo usuário'
        ],
        'edit'              => [
            'title'            => 'Admin | User | Edit',
            'description'      => 'Editando usuário: :full_name',
            'section-title'    => 'Editar usuário'
        ],
    ],

    'columns'           => [
        'id'                        =>  'ID',
        'username'                  =>  'Nome de usuário',
        'first_name'                =>  'Primeiro nome',
        'last_name'                 =>  'Último nome',
        'name'                      =>  'Nome',
        'roles'                     =>  'Grupos',
        'email'                     =>  'Email',
        'password'                  =>  'Senha',
        'password_confirmation'     =>  'Confirmação de senha',
        'created'                   =>  'Criado',
        'updated'                   =>  'Atualizado',
        'actions'                   =>  'Ações',
        'effective'                 =>  'Effective',
        'enabled'                   =>  'Ativado',
    ],

    'button'               => [
        'create'    =>  'Criar novo usuário',
    ],

];


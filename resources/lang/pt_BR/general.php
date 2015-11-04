<?php

return [

    'button'              => [
        'cancel'            => 'Cancelar',
        'close'             => 'Fechar',
        'create'            => 'Criar',
        'delete'            => 'Deletar',
        'edit'              => 'Editar',
        'save'              => 'Salvar',
        'ok'                => 'OK',
        'update'            => 'Atualizar',
        'enable'            => 'Ativar',
        'disable'           => 'Desativar',
        'toggle-select'     => 'Toggle checkboxes',
        'remove-role'       => 'Remover Função',
    ],

    'status'              => [
        'enabled'           => 'Ativado',
    ],

    'tabs'              => [
        'details'           => 'Detalhes',
        'options'           => 'Opções',
        'roles'             => 'Grupos',
        'perms'             => 'Permissões',
        'users'             => 'Usuários',
        'security'          => 'Segurança',

    ],

    'dialog' => [
        'flash_message' => [
            'title' => [
                'success' => 'Sucesso',
                'info'    => 'Info',
                'danger'  => 'Erro',
                'warning' => 'Atenção',
            ],

            'body' => [
                'not_found'            => ':model não encontrado',
                'already_exists'       => ':model já existe',
                'saved_successfully'   => ':model salvo com sucesso',
                'deleted_successfully' => ':model deletado com sucesso',
                'updated_successfully' => ':model atualizado com sucesso',
            ],
        ],

        'delete-confirm' => [
            'title' => 'Excluir :model',
            'body'  => 'Você tem certeza que quer excluir o registro de :model ":title"? Esta operação é irreversível.',
        ],

        'error' => [
            'cant-be-edited'             => 'O :model não pode ser editado',
            'cant-be-editable'           => 'O :model não pode ser editado',
            'cant-be-deleted'            => 'O :model não pode ser deletado',
            'cant-be-disabled'           => 'O :model não pode ser desativado',
            'login-failed-user-disabled' => 'Essa conta foi desativada.',
        ],
    ],

    'error'              => [
        'title-403'             => 'Error 403',
        'title-404'             => 'Error 404',
        'title-500'             => 'Error 500',
        'description-403'       => '',
        'description-404'       => '',
        'description-500'       => '',
        'forbidden-403'         => 'Forbidden',
        'page-not-found-404'    => 'Page not found',
        'internal-error-500'    => 'Internal error',
        'client-error'          => 'Client error: :error-code',
        'server-error'          => 'Server error: :error-code',
        'what-is-this'          => 'O que isto significa?',
        '403-explanation'       => 'É proibida a página ou função que você tentou acessar. As autoridades foram contactadas!',
        '404-explanation'       => 'A página ou função que você está procurando não pôde ser localizado. Tente voltar para a página anterior ou selecionar um novo.',
        '500-explanation'       => 'Um problema sério ocorreu no servidor, vamos olhar para ele o mais rápido possível e corrigir a situação.',
        'error-proc-command'    => 'Erro processando comando: :cmd',

        'cant-be-edited'             => 'Não pode ser editado',
        'cant-be-editable'           => 'Não pode ser editado',
        'cant-be-deleted'            => 'Não pode ser deletado',
        'cant-be-disabled'           => 'Não pode ser desativado',
    ],

];

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserVerifyController;
use Illuminate\Support\Facades\Artisan;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'contract_default'

])->group(function () {
    //Dashboard
    Route::view('dashboard/', 'dashboard.index')->name('dashboard');

    Route::view('agenda-semanal/', 'admin.schedule.index')->name('schedule');

    //Cadastros de Usuário
    Route::view('sistema/usuarios', 'contractor.system.users.index')->name('users');
    Route::view('sistema/usuarios/novo', 'contractor.system.users.create')->name('users.create');
    Route::view('sistema/usuarios/{id}/editar', 'contractor.system.users.edit')->name('users.edit');

    //Movimentos Agenda Empresas
    Route::view('agenda-empresas', 'contractor.schedule-company.index')->name('contractor.schedule-company');
    Route::view('agenda-empresas/{reference}/lista', 'contractor.schedule-company.participants')->name('contractor.schedule-company.participants');
    Route::view('agenda-empresas/{reference}/vizualizar', 'contractor.schedule-company.view')->name('contractor.schedule-company.view');

    //Relatórios
    Route::view('relatorios/participantes', 'contractor.report.participants.index')->name('contractor.participant-training.index');

    //Perfil
    Route::view('meu-perfil', 'profile.index')->name('profile');

    //Empresa
    Route::view('empresa', 'client.company.index')->name('company');
});


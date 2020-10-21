<?php

namespace App\Providers;

use App\Repositories\NoteRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(){
    $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
    $this->app->bind(NoteRepositoryInterface::class, NoteRepository::class);
    }
}
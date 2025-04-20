<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User_MB; // <-- замените здесь
use Illuminate\Support\Facades\Hash;

class HashPasswords extends Command
{
    protected $signature = 'users:hash-passwords';

    protected $description = 'Массово хешировать пароли пользователей';

    public function handle()
    {
        $users = User_MB::whereRaw('password != ""')->get(); // <-- и здесь

        foreach ($users as $user) {
            if (!Hash::needsRehash($user->password)) {
                $this->info("Пароль пользователя {$user->id} уже хеширован.");
                continue;
            }

            $user->password = Hash::make($user->password);
            $user->save();

            $this->info("Пароль пользователя {$user->id} обновлен.");
        }

        $this->info('Массовое хеширование завершено.');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CheckStorageLink extends Command
{
    protected $signature = 'check:storage';
    protected $description = 'Verifica el enlace simbólico public/storage y sus permisos';

    public function handle()
    {
        $linkPath = public_path('storage');
        $targetPath = storage_path('app/public');

        $this->info("Verificando enlace simbólico en: $linkPath");

        if (!File::exists($linkPath)) {
            $this->error("El enlace simbólico 'public/storage' NO existe.");
            return 1;
        }

        if (!is_link($linkPath)) {
            $this->error("El path 'public/storage' existe pero NO es un enlace simbólico.");
            return 1;
        }

        $linkTarget = readlink($linkPath);
        $this->info("El enlace simbólico apunta a: $linkTarget");

        if (realpath($linkTarget) !== realpath($targetPath)) {
            $this->error("El enlace simbólico apunta a un lugar incorrecto.");
            return 1;
        }

        $this->info("El enlace simbólico apunta correctamente a 'storage/app/public'.");

        // Verificar permisos (solo en Linux/Unix)
        $perms = substr(sprintf('%o', fileperms($linkPath)), -4);
        $this->info("Permisos actuales de 'public/storage': $perms");

        if ($perms < 775) {
            $this->warn("Se recomienda permisos 775 o mayores en 'public/storage'.");
        } else {
            $this->info("Los permisos parecen correctos.");
        }

        return 0;
    }
}
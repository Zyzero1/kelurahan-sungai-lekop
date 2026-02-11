<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JelajahLekop;

class CleanupGambarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jelajah:cleanup-gambar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membersihkan gambar-gambar yang tidak terpakai di folder jelajah-lekop';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Memulai pembersihan gambar yang tidak terpakai...');
        
        try {
            $deletedCount = JelajahLekop::bersihkanGambarTidakTerpakai();
            $this->info("✅ Berhasil membersihkan gambar yang tidak terpakai.");
            
        } catch (\Exception $e) {
            $this->error("❌ Terjadi kesalahan: " . $e->getMessage());
        }
        
        return Command::SUCCESS;
    }
}

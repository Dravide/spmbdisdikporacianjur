<?php

namespace App\Console\Commands;

use App\Models\TemporaryFile;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Log;

class DeleteTemporaryCommand extends Command
{
    protected $signature = 'delete:temporary';

    protected $description = 'Delete temporary Data dan File';

    public function handle(): void
    {

        $expired = Carbon::now()->subMinute(3);
        $temporary = TemporaryFile::where('created_at', '<', $expired)->get();
        foreach ($temporary as $temp) {
            $temp->delete();
            Storage::deleteDirectory('public/berkas/tmp/' . $temp->folder);
        }
        Log::notice("Delete temporary File " . date('Y-m-d H:i:s'));

    }
}

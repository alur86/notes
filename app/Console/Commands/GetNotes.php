<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Note;

class GetNotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'note:get {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get list notes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
   $title = $this->argument('title');
   $notes = Note::where('title', 'LIKE', "%$title%");



   $data = [
    '$title'=> $title,
    'notes'=>$notes,
    ];


\Mail::send('emails.note', $data, function($message) use($email)
{
$message->from(env('MAIL_FROM'));
$message->to($email, env('MAIL_NAME'));
$message->subject('Notes what you search');
});


$this->line("The notes what you seacrh sent you to your email");












    }
}

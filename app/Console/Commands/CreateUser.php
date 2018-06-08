<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\User;
use Hash;
class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {name} {email} {password}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Users';
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
     * @return mixed
     */
    public function handle()
    {

        $user = new User;
        $user->password = Hash::make($this->argument("password"));
        $user->name = $this->argument("name");
        $user->email = $this->argument("email");
        $user->save();
        dump($this->argument('name'));
        dump($this->argument('email'));
        dump($this->argument('password'));
    }
}

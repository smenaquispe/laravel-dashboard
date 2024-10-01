<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Client as ClientContract;

class Client extends Model implements ClientContract
{
    /**
     * The attributes that are mass assignable.
     * 
     */
    use HasUuids, HasFactory;
    
    /**
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'age',
        'city',
        'salary'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    public $timestamps = false;
    public $incrementing = false;
    
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    public function create(array $data): ClientContract
    {
        return Client::create($data);
    }

    public function read(int $id): ClientContract
    {
        return Client::find($id);
    }

    public function update_(int $id, array $data): ClientContract
    {
        $client = Client::find($id);
        $client->update($data);
        return $client;
    }

    public function delete_(int $id): bool
    {
        return Client::destroy($id);
    }

    public static function list(): Collection
    {
        return self::all();
    }

    protected $table = "clients";
}

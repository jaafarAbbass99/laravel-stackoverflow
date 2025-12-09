<?php 

namespace App\Modules\Answer\Domain\DTO;

use App\Models\User;
use Livewire\Wireable;

class UserDtoWireable implements Wireable
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
    
    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->id,
            name: $user->name,
        );
    }

    public function toLivewire()
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
        ];
    }

    public static function fromLivewire($value)
    {
        return new self(
            id:         $value['id'],
            name:       $value['name']
        );
    }

}
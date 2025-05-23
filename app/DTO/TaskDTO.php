<?php

namespace App\DTO;

use Illuminate\Http\Request;

class TaskDTO
{
    public const KEYS_INDEX = [
        'userId',
        'startTimestamp',
        'endTimestamp'
    ];

    public const KEYS_STORE = [
        'userId',
        'title',
        'description',
        'taskStatus',
        'deadline'
    ];

    public const KEYS_UPDATE = [
        'id',
        'userId',
        'title',
        'description',
        'taskStatus',
        'deadline'
    ];

    public const KEYS_DELETE = [
        'id',
        'userId'
    ];

    public int $id;
    public int $userId;
    public string $title;
    public string $description;
    public string $taskStatus;
    public int $deadline;
    public int $startTimestamp;
    public int $endTimestamp;

    public function fromIndexRequest(Request $request): void
    {
        $this->assignParameters(
            $request,
            self::KEYS_INDEX
        );
    }

    public function fromStoreRequest(Request $request): void
    {
        $this->assignParameters(
            $request,
            self::KEYS_STORE
        );
    }

    public function fromUpdateRequest(Request $request): void
    {
        $this->assignParameters(
            $request,
            self::KEYS_UPDATE
        );
    }

    public function fromDeleteRequest(Request $request): void
    {
        $this->assignParameters(
            $request,
            self::KEYS_DELETE
        );
    }

    private function assignParameters(Request $request, array $fields): void
    {
        foreach ($fields as $key) {
            $value = $request->input($key);
            if (!is_null($value)) {
                $this->{$key} = $value;
            }
        }
    }
}

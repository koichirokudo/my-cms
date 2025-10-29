<?php

namespace App\Domain\Entities;

class Resume
{
    public function __construct(
        public readonly int $userId,
        public readonly string $projectName,
        public readonly string $periodFrom,
        public readonly ?string $periodTo,
        public readonly string $description,
        public readonly ?string $team,
        public readonly ?string $industry,
        public readonly ?string $employment,
        public readonly ?string $languageFw,
        public readonly ?string $database,
        public readonly ?string $serverOs,
        public readonly ?string $cloudEnv,
        public readonly ?string $tools,
        public readonly ?array $tasksJson,
    ) {}
}

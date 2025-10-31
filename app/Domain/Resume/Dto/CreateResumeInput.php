<?php

namespace App\Domain\Resume\Dto;

class CreateResumeInput
{
    /**
     * @param list<string> $tasks
     */
    public function __construct(
        public readonly int $userId,
        public readonly string $projectName,
        public readonly ?\DateTimeInterface $periodFrom = null,
        public readonly ?\DateTimeInterface $periodTo = null,
        public readonly string $description = '',
        public readonly ?string $team = null,
        public readonly ?string $industry = null,
        public readonly ?string $employment = null,
        public readonly ?string $languageFw = null,
        public readonly ?string $database = null,
        public readonly ?string $serverOs = null,
        public readonly ?string $cloudEnv = null,
        public readonly ?string $tools = null,
        public readonly array $tasks = [],
    ) {}
}

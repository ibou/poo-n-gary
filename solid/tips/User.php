<?php

declare(strict_types=1);

class User
    {
        private bool $isModified = false;
        
        public function __construct(
            private string $first,
            private string $last
        ) {}
        
        public string $fullName {
            // Override the "read" action with arbitrary logic.
            get => $this->first . " " . $this->last;
        
            // Override the "write" action with arbitrary logic.
            set {
                [$this->first, $this->last] = explode(' ', $value, 2);
                $this->isModified = true;
            }
        }
    }
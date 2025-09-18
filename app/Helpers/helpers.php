<?php

if (! function_exists('linkIcon')) {
    function linkIcon(?string $url): string
    {
        if (!$url) {
            return '';
        }

        return '<a href="'.e($url).'" target="_blank" class="link-icon">
                    <i class="fa fa-link"></i>
                </a>';
    }
}

if (! function_exists('status')) {
    function status(?string $value): string
    {
        if (!$value) {
            return '<span class="badge bg-secondary">Unknown</span>';
        }

        return match ($value) {
            'pending'  => '<span class="badge bg-warning">Pending</span>',
            'accepted' => '<span class="badge bg-success">Accepted</span>',
            'rejected' => '<span class="badge bg-danger">Rejected</span>',
            default    => '<span class="badge bg-secondary">'.e(ucfirst($value)).'</span>',
        };
    }
}

if (! function_exists('accept')) {
    function accept(?string $status): string
    {
        return match ($status) {
            'Document Verified' => '<span class="badge bg-primary" style="white-space: nowrap">Verified</span>',
            'Dokument Proccess' => '<span class="badge bg-secondary" style="white-space: nowrap">Proccess</span>',
            default             => '<span class="badge bg-light text-dark" style="white-space: nowrap">'.e($status).'</span>',
        };
    }
}

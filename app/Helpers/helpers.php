<?php

if (! function_exists('email')) {
    function email(?string $url): string
    {
        if (!$url) {
            return '';
        }

        return '<a href="mailto:'.e($url).'" style="text-decoration: underline; color: #0a7baf">'.e($url).'</a>';
    }
}

if (! function_exists('linkIcon')) {
    function linkIcon(?string $url): string
    {
        if (!$url) {
            return '';
        }

        return '<a href="'.e($url).'" target="_blank" style="display: flex; align-items: center; gap: .5em; font-size: .9rem; padding: .4em; border-radius: 0em; color: #0a7baf;">
                    <i class="fa fa-link"></i>
                    <span style="white-space: nowrap">Link</span>
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

if (! function_exists('color')) {
    function color(?string $hex): string
    {
        if (!$hex) {
            return '';
        }

        return '<div style="height: 1.3em; width: 1.3em; border-radius: 50%; background: '.e($hex).'"></div>';
    }
}

if (! function_exists('slug')) {
    function slug(?string $text): string
    {
        if (!$text) {
            return '';
        }

        return '<div style="display: flex; justify-content: center; font-size: .9em; padding: .3em 1em; background: #EEE; color: #888">'.e($text).'</div>';
    }
}
<style>

@php
    $colors = Cache::get('company_info');
    $colros = $colors['colors'];
@endphp

    .btn-primary {
        --bs-btn-bg:{{ $colros['primary'] }};
        --bs-btn-border-color:{{ $colros['primary'] }};
        --bs-btn-hover-bg:{{ $colros['secondary'] }};
        --bs-btn-hover-border-color:{{ $colros['secondary'] }};
        --bs-btn-active-bg:{{ $colros['secondary'] }};
        --bs-btn-active-border-color:{{ $colros['secondary'] }};
        --bs-btn-disabled-bg:{{ $colros['primary'] }};
        --bs-btn-disabled-border-color:{{ $colros['primary'] }};
    }

    .btn-outline-primary {
        --bs-btn-color:{{ $colros['primary'] }};
        --bs-btn-border-color:{{ $colros['primary'] }};
        --bs-btn-hover-bg:{{ $colros['primary'] }};
        --bs-btn-hover-border-color:{{ $colros['primary'] }};
        --bs-btn-active-bg:{{ $colros['primary'] }};
        --bs-btn-active-border-color:{{ $colros['primary'] }};
        --bs-btn-disabled-color:{{ $colros['primary'] }};
        --bs-btn-disabled-border-color:{{ $colros['primary'] }};
    }

    body.theme-dark .btn-outline-primary {
        --bs-btn-color:{{ $colros['primary'] }};
        --bs-btn-border-color:{{ $colros['primary'] }};
        --bs-btn-hover-bg:{{ $colros['primary'] }};
        --bs-btn-hover-border-color:{{ $colros['primary'] }};
        --bs-btn-active-bg:{{ $colros['primary'] }};
        --bs-btn-active-border-color:{{ $colros['primary'] }};
        --bs-btn-disabled-color:{{ $colros['primary'] }};
        --bs-btn-disabled-border-color:{{ $colros['primary'] }};
    }

    body.theme-dark .btn-primary {
        --bs-btn-color:fff;
        --bs-btn-bg:{{ $colros['primary'] }};
        --bs-btn-border-color:{{ $colros['primary'] }};
        --bs-btn-hover-bg:{{ $colros['secondary'] }};
        --bs-btn-hover-border-color:{{ $colros['secondary'] }};
        --bs-btn-active-bg:{{ $colros['secondary'] }};
        --bs-btn-active-border-color:{{ $colros['secondary'] }};
        --bs-btn-disabled-bg:{{ $colros['primary'] }};
        --bs-btn-disabled-border-color:{{ $colros['primary'] }};
    }

    body.theme-dark .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link {
        background-color:{{ $colros['secondary'] }};
    }

    body.theme-dark .form-check-input:checked {
        background-color:{{ $colros['secondary'] }};
        border-color:{{ $colros['secondary'] }};
    }

    .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link {
        background-color:{{ $colros['secondary'] }};
    }
</style>

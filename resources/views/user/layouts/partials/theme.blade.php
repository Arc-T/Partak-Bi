<style>
    @php $colors = Cache::get('company_info');
        $colors = $colors['colors'];
    @endphp

    .choices__list--multiple .choices__item {
        background-color: var(--bs-secondary);
        border: 1px solid var(--bs-secondary);
    }

    .btn-primary {
        --bs-btn-bg:
            {{ $colors['primary'] }}
        ;
        --bs-btn-border-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-hover-bg:
            {{ $colors['secondary'] }}
        ;
        --bs-btn-hover-border-color:
            {{ $colors['secondary'] }}
        ;
        --bs-btn-active-bg:
            {{ $colors['secondary'] }}
        ;
        --bs-btn-active-border-color:
            {{ $colors['secondary'] }}
        ;
        --bs-btn-disabled-bg:
            {{ $colors['primary'] }}
        ;
        --bs-btn-disabled-border-color:
            {{ $colors['primary'] }}
        ;
    }

    .btn-outline-primary {
        --bs-btn-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-border-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-hover-bg:
            {{ $colors['primary'] }}
        ;
        --bs-btn-hover-border-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-active-bg:
            {{ $colors['primary'] }}
        ;
        --bs-btn-active-border-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-disabled-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-disabled-border-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-focus-shadow-rgb:
            {{ $colors['secondary'] }}
        ;
    }

    body.theme-dark .btn-outline-primary {
        --bs-btn-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-border-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-hover-bg:
            {{ $colors['primary'] }}
        ;
        --bs-btn-hover-border-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-active-bg:
            {{ $colors['primary'] }}
        ;
        --bs-btn-active-border-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-disabled-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-disabled-border-color:
            {{ $colors['primary'] }}
        ;
    }

    body.theme-dark .btn-primary {
        --bs-btn-color: fff;
        --bs-btn-bg:
            {{ $colors['primary'] }}
        ;
        --bs-btn-border-color:
            {{ $colors['primary'] }}
        ;
        --bs-btn-hover-bg:
            {{ $colors['secondary'] }}
        ;
        --bs-btn-hover-border-color:
            {{ $colors['secondary'] }}
        ;
        --bs-btn-active-bg:
            {{ $colors['secondary'] }}
        ;
        --bs-btn-active-border-color:
            {{ $colors['secondary'] }}
        ;
        --bs-btn-disabled-bg:
            {{ $colors['primary'] }}
        ;
        --bs-btn-disabled-border-color:
            {{ $colors['primary'] }}
        ;
    }

    body.theme-dark .btn-outline-primary {
        --bs-btn-focus-shadow-rgb:
            {{ $colors['secondary'] }}
        ;
    }

    body.theme-dark .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link {
        background-color:
            {{ $colors['secondary'] }}
        ;
    }

    body.theme-dark .form-check-input:checked {
        background-color:
            {{ $colors['secondary'] }}
        ;
        border-color:
            {{ $colors['secondary'] }}
        ;
    }

    .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link {
        background-color:
            {{ $colors['secondary'] }}
        ;
    }
</style>
<style>
    .btn-primary {
        --bs-btn-bg: #{{ $common['colors']['primary'] }};
        --bs-btn-border-color: #{{ $common['colors']['primary'] }};
        --bs-btn-hover-bg: #{{ $common['colors']['secondary'] }};
        --bs-btn-hover-border-color: #{{ $common['colors']['secondary'] }};
        --bs-btn-active-bg: #{{ $common['colors']['secondary'] }};
        --bs-btn-active-border-color: #{{ $common['colors']['secondary'] }};
        --bs-btn-disabled-bg: #{{ $common['colors']['primary'] }};
        --bs-btn-disabled-border-color: #{{ $common['colors']['primary'] }};
    }

    .btn-outline-primary {
        --bs-btn-color: #{{ $common['colors']['primary'] }};
        --bs-btn-border-color: #{{ $common['colors']['primary'] }};
        --bs-btn-hover-bg: #{{ $common['colors']['primary'] }};
        --bs-btn-hover-border-color: #{{ $common['colors']['primary'] }};
        --bs-btn-active-bg: #{{ $common['colors']['primary'] }};
        --bs-btn-active-border-color: #{{ $common['colors']['primary'] }};
        --bs-btn-disabled-color: #{{ $common['colors']['primary'] }};
        --bs-btn-disabled-border-color: #{{ $common['colors']['primary'] }};
    }

    body.theme-dark .btn-outline-primary {
        --bs-btn-color: #{{ $common['colors']['primary'] }};
        --bs-btn-border-color: #{{ $common['colors']['primary'] }};
        --bs-btn-hover-bg: #{{ $common['colors']['primary'] }};
        --bs-btn-hover-border-color: #{{ $common['colors']['primary'] }};
        --bs-btn-active-bg: #{{ $common['colors']['primary'] }};
        --bs-btn-active-border-color: #{{ $common['colors']['primary'] }};
        --bs-btn-disabled-color: #{{ $common['colors']['primary'] }};
        --bs-btn-disabled-border-color: #{{ $common['colors']['primary'] }};
    }

    body.theme-dark .btn-primary {
        --bs-btn-color: #fff;
        --bs-btn-bg: #{{ $common['colors']['primary'] }};
        --bs-btn-border-color: #{{ $common['colors']['primary'] }};
        --bs-btn-hover-bg: #{{ $common['colors']['secondary'] }};
        --bs-btn-hover-border-color: #{{ $common['colors']['secondary'] }};
        --bs-btn-active-bg: #{{ $common['colors']['secondary'] }};
        --bs-btn-active-border-color: #{{ $common['colors']['secondary'] }};
        --bs-btn-disabled-bg: #{{ $common['colors']['primary'] }};
        --bs-btn-disabled-border-color: #{{ $common['colors']['primary'] }};
    }

    body.theme-dark .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link {
        background-color: #{{ $common['colors']['secondary'] }};
    }

    body.theme-dark .form-check-input:checked {
        background-color: #{{ $common['colors']['secondary'] }};
        border-color: #{{ $common['colors']['secondary'] }};
    }

    .sidebar-wrapper .menu .sidebar-item.active>.sidebar-link {
        background-color: #{{ $common['colors']['secondary'] }};
    }
</style>

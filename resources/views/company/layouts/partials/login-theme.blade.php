<style>
    #auth #auth-right {
        background: url({{ asset('images/bg/4853433.jpg') }}), linear-gradient(-90deg, {{ $company->primary_color }}, {{ $company->secondary_color }});
    }

    h1 {
        color: {{ $company->primary_color }};
    }

    .btn-primary {
        --bs-btn-bg: {{ $company->primary_color }};
        --bs-btn-border-color: {{ $company->primary_color }};
        --bs-btn-hover-bg: {{ $company->secondary_color }};
        --bs-btn-hover-border-color: {{ $company->secondary_color }};
    }
</style>

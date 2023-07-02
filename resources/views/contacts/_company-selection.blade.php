<form method="GET">​
    <select class="form-select" id="drp_company" name="company_id" onchange="this.form.submit()">​
        <option value="" selected>All Companies</option>​
        @foreach ($companies as $id => $company)
            <option value="{{ $id }}" @if ($id == request()->query('company_id')) selected @endif>{{ $company }}
            </option>​
        @endforeach​
    </select>​
</form>

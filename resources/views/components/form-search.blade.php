<form action="{{ $action }}" class="mt-3 d-flex">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2"
            value="{{ request('search') }}" name="search">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>

@if(session()->has('message'))
<div class="row">
	<div class="col-12 d-flex justify-content-center py-3">
		<div class="session">
			<div class="alert alert-success" role="alert">
				{{ session()->get('message') }}
			</div>
        </div>                   
    </div>
</div>
@endif
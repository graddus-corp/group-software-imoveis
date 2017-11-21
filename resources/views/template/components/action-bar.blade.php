@if(Session::has('actionBar'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-{{Session::get('actionBar')['css']}}">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span>{{Session::get('actionBar')['message']}}</span>
            </div>
        </div>
    </div>
@endif

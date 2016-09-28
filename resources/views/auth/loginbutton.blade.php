<div class="row">
    <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 text-center">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-12 text-center">
                 <a href={{url('social/linkedin') }}><img src="images/Linkedin-button.png" style="margin:0 auto 0 auto;" /></a>
             </div>
         </div>
    </form>
</div>
</div>

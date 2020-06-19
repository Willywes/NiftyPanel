@if(auth('intranet')->check())
    <link id="theme" href="/themes/intranet/css/themes{{ auth('intranet')->user()->theme }}" rel="stylesheet">
@else
    <link id="theme" href="/themes/intranet/css/themes/type-e/theme-dust.min.css" rel="stylesheet">
@endif


<div id="modalChangeColor" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cambiar Tema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters mb-5">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-dark" data-theme="theme-dark-full" data-type="full"
                                data-title="(E). Gray"></button>
                    </div>
                    <div class="col-md-9 pl-3">
                        <p class="text-bold text-main mar-no text-uppercase text-sm">Dark Mode</p>
                        <small class="text-muted text-xs">Modo oscuro</small>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-gray" data-theme="theme-gray" data-type="e"
                                data-title="(E). Gray"></button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-navy" data-theme="theme-navy" data-type="e"
                                data-title="(E). Navy Blue"></button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-ocean" data-theme="theme-ocean" data-type="e"
                                data-title="(E). Ocean"></button>
                    </div>

                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-lime" data-theme="theme-lime" data-type="e"
                                data-title="(E). Lime"></button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-purple" data-theme="theme-purple" data-type="e"
                                data-title="(E). Purple"></button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-dust" data-theme="theme-dust" data-type="e"
                                data-title="(E). Dust"></button>
                    </div>

                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-mint" data-theme="theme-mint" data-type="e"
                                data-title="(E). Mint"></button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-yellow" data-theme="theme-yellow" data-type="e"
                                data-title="(E). Yellow"></button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-well-red" data-theme="theme-well-red" data-type="e"
                                data-title="(E). Well Red"></button>
                    </div>

                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-coffee" data-theme="theme-coffee" data-type="e"
                                data-title="(E). Coffee"></button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-prickly-pear" data-theme="theme-prickly-pear"
                                data-type="e" data-title="(E). Prickly pear"></button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-block btn-flat btn-theme demo-theme-dark" data-theme="theme-dark" data-type="e"
                                data-title="(E). Dark"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




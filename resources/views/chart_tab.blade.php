@php $chart_height = 300; @endphp
<div class="card-panel" style="height: {{ $chart_height + 50 }}px">
    <!-- Start materialize loader -->
    <center>
        <div class="preloader-wrapper big active" style="margin-top: {{ ($chart_height / 2) - 32 }}px;">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </center>
    <!-- End materialize loader -->
    <iframe id="latest_users" src="{{ route('chart', ['name' => 'latest_users', 'height' => $chart_height]) }}" height="{{ $chart_height + 50 }}" width="100%" style="width:100%; border:none;"></iframe>
</div>
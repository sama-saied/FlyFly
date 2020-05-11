<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <h3 class="tile-title">Hero Section</h3>
        <hr>
        <div class="tile-body">
            <div class="row">
                <div class="col-3">
                    @if (config('settings.hero_first') != null)
                        <img src="{{ asset('storage/'.config('settings.hero_first')) }}" id="herofirst" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="herofirst" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label class="control-label">Hero First</label>
                        <input class="form-control" type="file" name="hero_first" onchange="loadFile(event,'herofirst')"/>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3">
                    @if (config('settings.hero_second') != null)
                        <img src="{{ asset('storage/'.config('settings.hero_second')) }}" id="herosecond" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="herosecond" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label class="control-label">Hero Second</label>
                        <input class="form-control" type="file" name="hero_second" onchange="loadFile(event,'herosecond')"/>
                    </div>
                </div>
            </div>
        </div>
       
<hr>
<hr>
        <h3 class="tile-title">Product Link</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="firsttpro_link"> First Product link</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter the first prodct link"
                    id="firstpro_link"
                    name="firstpro_link"
                    value="{{ config('settings.firstpro_link') }}"
                />
            </div>

            <div class="form-group">
                <label class="control-label" for="secondpro_link">Second Product link</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter the second prodct link"
                    id="secondpro_link"
                    name="secondpro_link"
                    value="{{ config('settings.secondpro_link') }}"
                />
            </div>
        </div>
           
<hr>
<hr>
<h3 class="tile-title">ad section</h3>
        <hr>
        <div class="tile-body">
        <div class="form-group">
                <label class="control-label" for="adv_link">adv. link</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Enter the ad link"
                    id="adv_link"
                    name="adv_link"
                    value="{{ config('settings.adv_link') }}"
                />
            </div>
        </div>
<hr>
        <div class="tile-body">
            <div class="row">
                <div class="col-3">
                    @if (config('settings.ad_pic') != null)
                        <img src="{{ asset('storage/'.config('settings.ad_pic')) }}" id="adpic" style="width: 80px; height: auto;">
                    @else
                        <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="adpic" style="width: 80px; height: auto;">
                    @endif
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label class="control-label">ad picture</label>
                        <input class="form-control" type="file" name="ad_pic" onchange="loadFile(event,'adpic')"/>
                    </div>
                </div>
            </div>
        </div>
        
       
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Settings</button>
                </div>
            </div>
        </div>
    </form>
</div>
@push('scripts')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
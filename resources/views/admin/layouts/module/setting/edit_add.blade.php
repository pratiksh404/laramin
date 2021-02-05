<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general"
        aria-expanded="true">
        <div class="media d-flex justify-content-between">
            <div>
                <a href="javascript: void(0);">
                    @if (isset($setting->logo))
                    <img src="{{asset('laramin/'.$setting->logo)}}" class="rounded mr-75" alt="profile image"
                        height="64" width="64" id="logo_placeholder">
                    @else
                    <img src="{{asset('laramin/'.config('laramin.logo','static/logo.png'))}}" class="rounded mr-75"
                        alt="profile image" height="64" width="64" id="logo_placeholder">
                    @endif
                </a>
                <div class="media-body mt-75">
                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="logo">Upload
                            Logo</label>
                        <input type="file" name="logo" id="logo" accept="image/*" onchange="readLogoURL(this);" hidden>
                        <button class="btn btn-sm btn-secondary ml-50">Reset</button>
                    </div>
                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG.
                            Max
                            size of
                            2 MB</small></p>
                </div>
            </div>
            <div>
                <a href="javascript: void(0);">
                    @if (isset($setting->favicon))
                    <img src="{{asset('laramin/'.$setting->favicon)}}" class="rounded mr-75" alt="profile image"
                        height="64" width="64" id="favicon_placeholder">
                    @else
                    <img src="{{asset('laramin/'.config('laramin.favicon','static/favicon.png'))}}"
                        class="rounded mr-75" alt="profile image" height="64" width="64" id="favicon_placeholder">
                    @endif
                </a>
                <div class="media-body mt-75">
                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="favicon">Upload
                            Favicon</label>
                        <input type="file" name="favicon" id="favicon" accept="image/*" onchange="readFaviconURL(this);"
                            hidden>
                        <button class="btn btn-sm btn-secondary ml-50">Reset</button>
                    </div>
                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG.
                            Max
                            size of
                            0.5 MB</small></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="account-username">System Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="System Name"
                            value="{{$setting->name ?? old('name')}}">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="discription">Discription</label>
                        <textarea name="discription" class="discription" id="discription" cols="30" rows="10">
                                                            @isset($setting->discription)
                                                                {!! $setting->discription !!}
                                                            @endisset
                                                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="keywords">Keywords</label> <small>Keywords
                            seperated by comma (,)</small>
                        <input type="text" name="keywords" id="keywords" class="form-control"
                            value="{{$setting->keywords ?? old('keywords')}}" placeholder="Keywords">

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-control"
                        value="{{$setting->author ?? old('author') ?? 'Tech Coderz'}}" placeholder="Author" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password"
        aria-expanded="false">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="og_title">Open Graph Title</label>
                        <input type="text" name="og_title" id="og_title" class="form-control"
                            value="{{$setting->og_title ?? old('og_title')}}" placeholder="Open Graph Title">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="og_discription"></label>
                        <textarea name="og_discription" id="og_discription" cols="30" rows="10" class="og_discription">
                                                               @isset($setting->og_discription)
                                                                   {!! $setting->og_discription !!}
                                                               @endisset
                                                           </textarea>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-between">
                <div>
                    <a href="javascript: void(0);">
                        @if (isset($setting->og_image))
                        <img src="{{asset('laramin/'.$setting->og_image)}}" class="rounded mr-75" alt="profile image"
                            height="120" width="80" id="og_image_placeholder">
                        @else
                        <img src="{{asset('laramin/'.config('laramin.logo','static/techcoderz.png'))}}"
                            class="rounded mr-75" alt="profile image" height="64" width="64" id="og_image_placeholder">
                        @endif
                    </a>
                    <div class="media-body mt-75">
                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                            <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                for="og_image">Upload Open Graph Image
                                Logo</label>
                            <input type="file" name="og_image" id="og_image" accept="image/*"
                                onchange="readOGImageURL(this);" hidden>
                            <button class="btn btn-sm btn-secondary ml-50">Reset</button>
                        </div>
                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or
                                PNG.
                                Max
                                size of
                                3 MB (1200 X 627 recommended)</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info"
        aria-expanded="false">

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="phone_no">Phone Numbers</label>
                    <select name="phone_no[]" class="tagging form-control" multiple="">
                        @if (isset($setting->phone_no))
                        @foreach ($setting->phone_no as $phone_no)
                        <option value="{{$phone_no}}" selected>{{$phone_no}}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="controls">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{$setting->address ?? old('address')}}" placeholder="Address">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label for="email">Emails</label>
                <select name="email[]" class="tagging form-control" multiple="">
                    @if (isset($setting->email))
                    @foreach ($setting->email as $email)
                    <option value="{{$email}}" selected>{{$email}}
                    </option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="map">Map</label>
                    <input type="text" name="map" id="map" class="form-control" value="{{$setting->map ?? old('map')}}"
                        placeholder="Map">
                </div>
            </div>

        </div>
    </div>
    <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social"
        aria-expanded="false">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="account-twitter">Youtube</label>
                    <input type="text" name="twitter" id="account-twitter" class="form-control" placeholder="Add link"
                        value="{{$setting->twitter ?? old('twitter') ?? "https://www.youtube.com"}}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="account-facebook">Facebook</label>
                    <input type="text" name="facebook" id="account-facebook" class="form-control" placeholder="Add link"
                        value="{{$setting->facebook ?? old('facebook') ?? "https://www.facebook.com"}}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="account-google">Instagram</label>
                    <input type="text" name="instagram" id="account-google" class="form-control" placeholder="Add link"
                        value="{{$setting->instagram ?? old('instagram') ?? "https://www.instagram.com"}}">
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
        aria-labelledby="account-pill-connections" aria-expanded="false">
        <div class="row">
            <div class="col-lg-6">
                <label for="image">Banner Image</label> <br>
                <input type="file" name="banner" id="banner" accept="image/*" onchange="readBannerURL(this);">
            </div>
            <div class="col-lg-6">
                @if (isset($setting->banner))
                <img src="{{asset('laramin/'.$setting->banner)}}" class="img-fluid" id="banner_image">
                @endif
                <img src="" id="banner_image_plcaeholder" class="img-fluid">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea name="excerpt" class="excerpt" id="excerpt" cols="30" rows="10">
                                                        @isset($setting->excerpt)
                                                            {!! $setting->excerpt !!}
                                                        @endisset
                                                    </textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="about_us">About Us</label>
                    <textarea name="about_us" class="about_us" id="about_us" cols="30" rows="10">
                                                         @isset($setting->about_us)
                                                             {!! $setting->about_us !!}
                                                         @endisset
                                                     </textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="why_us">Why Us ?</label>
                    <textarea name="why_us" class="why_us" id="why_us" cols="30" rows="10">
                                                            @isset($setting->why_us)
                                                                {!! $setting->why_us !!}
                                                            @endisset
                                                        </textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="slogan">Slogan <small>Seperate Slogans by comma
                            (,)</small></label>
                    <select name="slogan[]" class="slogans form-control" multiple="">
                        @if (isset($setting->slogan))
                        @foreach ($setting->slogan as $slogan)
                        <option value="{{$slogan}}" selected>{{$slogan}}
                        </option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<input type="submit" value="Save" class="btn btn-warning">
<section class="users-edit">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <ul class="nav nav-tabs mb-2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                            href="#account" aria-controls="account" role="tab" aria-selected="true">
                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
                            href="#information" aria-controls="information" role="tab" aria-selected="false">
                            <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Information</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                        <!-- users edit account form start -->
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{adminUpdateRoute('user',$profile->user->id)}}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <input type="hidden" name="from_profile" value="true">
                                    @include('admin.layouts.module.profile.account_setting')
                                </form>
                            </div>
                            {{--                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                    changes</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
                            </div> --}}
                        </div>

                        <!-- users edit account form ends -->
                    </div>
                    <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                        <form action="{{adminUpdateRoute('profile',$profile->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            @include('admin.layouts.module.profile.profile_setting')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
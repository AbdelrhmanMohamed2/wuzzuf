<div class="hero-wrap img" style="background-image: url(images/bg_1.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-10 d-flex align-items-center ftco-animate">
                <div class="text text-center pt-5 mt-md-5">
                    <p class="mb-4">{{ $settings->where('key', 'sub_title')->first()->value }}</p>
                    <h1 class="mb-5">{{ $settings->where('key', 'main_title')->first()->value }}</h1>
                    <div class="ftco-counter ftco-no-pt ftco-no-pb">
                        <div class="row">
                            @foreach ($settings->where('key', 'main_cards') as $main_card)
                                @php
                                    $main_card = json_decode($main_card->value, false);
                                @endphp
                                <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                                    <div class="block-18">
                                        <div class="text d-flex">
                                            <div class="icon mr-2">
                                                <i class="{{ $main_card->icon }} fa-4x" style="color: #ffffff;"></i>
                                                {{-- <span class="flaticon-worldwide"></span> --}}
                                            </div>
                                            <div class="desc text-left">
                                                <strong class="number" data-number="{{ $main_card->number }}">0</strong>
                                                <span>{{ $main_card->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="ftco-search my-md-5">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">
                                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill"
                                        href="#v-pills-1" role="tab" aria-controls="v-pills-1"
                                        aria-selected="true">Search for a Job</a>

                                </div>
                            </div>
                            <div class="col-md-12 tab-wrap">

                                <div class="tab-content p-4" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-nextgen-tab">
                                        <form action="{{ route('jobs.index') }}" class="search-job">
                                            <div class="row no-gutters">
                                                <div class="col-md mr-md-2">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="icon"><span class="icon-briefcase"></span>
                                                            </div>
                                                            <input type="text" name="search" class="form-control"
                                                                placeholder="eg. Garphic. Web Developer">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md mr-md-2">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span
                                                                        class="ion-ios-arrow-down"></span></div>
                                                                <select name="job_type" id=""
                                                                    class="form-control">
                                                                    <option value="">Job Type</option>
                                                                    @foreach ($job_types as $type)
                                                                        <option value="{{ $type->id }}">
                                                                            {{ $type->name }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md mr-md-2">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="icon"><span class="icon-map-marker"></span>
                                                            </div>
                                                            <input type="text" name="location" class="form-control"
                                                                placeholder="Location">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <button type="submit"
                                                                class="form-control btn btn-primary">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="category-wrap">
                    <div class="row no-gutters">
                        @foreach ($settings->where('key', 'sub_cards') as $sub_card)
                            @php
                                $sub_card = json_decode($sub_card->value, false);
                            @endphp
                            <div class="col-md">
                                <div class="top-category text-center no-border-left">
                                    <h3><a href="#">{{ $sub_card->name }}</a></h3>
                                    <div class="icon mr-2">
                                        <i class="{{ $sub_card->icon }} fa-1x" style="color: #0050d1;"></i>
                                    </div>
                                    <p>{{ $sub_card->description }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

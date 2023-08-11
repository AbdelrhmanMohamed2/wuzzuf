<section class="ftco-section services-section">
    <div class="container">
        <div class="row d-flex">
            @foreach ($settings->where('category', 'services') as $service)
                @php
                    $service = json_decode($service->value, false);

                @endphp
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon mr-2">
                            <i class="{{ $service->icon }} fa-4x" style="color: #efefef;"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">{{ $service->name }}</h3>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

@extends('dashboard.pages.master')

@section('title', 'Wuzzuf | Dashboard | Home')
@section('page_main_title', 'Home')
@section('page_name', 'Home')

@section('css')
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">


        {{-- Companies --}}
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $companies_count }}</h3>

                    <p>Companies</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-building"></i>
                </div>
                <a href="#" class="small-box-footer">Show All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        {{-- Employees --}}
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $employees_count }}</h3>

                    <p>Employees</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <a href="#" class="small-box-footer">Show All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        {{-- Jobs --}}
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $jobs_count }}</h3>

                    <p>Jobs</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-hammer"></i>
                </div>
                <a href="#" class="small-box-footer">Show All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        {{-- Posts --}}
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $posts_count }}</h3>

                    <p>Posts</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-copy"></i>
                </div>
                <a href="#" class="small-box-footer">Show All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>




    </div>

    <div class="row">
        @foreach ($types_counts as $job_type)
            <div class="col-sm-3 col-3">
                <div class="description-block border-right">
                    <h5 class="description-header">{{ $job_type->jobs_count }}</h5>
                    <span class="description-text">{{ $job_type->name }}</span>
                </div>
                <!-- /.description-block -->
            </div>
        @endforeach

    </div>

    <div class="row">
        {{-- Skills --}}
        <div class="col-lg-6 col-6">
            <div class="card card-lightblue">
                <div class="card-header">
                    <h3 class="card-title">Most Popular Skills</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="pieSkill"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 413px;"
                        width="438" height="265" class="chartjs-render-monitor"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        {{-- Languages --}}
        <div class="col-lg-6 col-6">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Most Popular Languages</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="pieLang"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 413px;"
                        width="438" height="265" class="chartjs-render-monitor"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
        </div>


    </div>
    {{-- @dd($top5skills[0]->jobs()->count()) --}}
@endsection


@section('scripts')
    <script>

        top5skills = {!! $top5skills !!};
        skills_names = [];
        skills_counters = [];

        top5skills.forEach(skill => {
            skills_names.push(skill.name)
            skills_counters.push((skill.jobs.length + skill.employees.length))
        });


        top5Languages = {!! $top5Languages !!};
        languages_names = [];
        languages_counters = [];
        top5Languages.forEach(language => {
            languages_names.push(language.name)
            languages_counters.push(language.jobs.length + language.employees.length)
        });

        // console.log(top5Languages, languages_names, languages_counters);


        $(function() {

            // Skills
            var donutData = {
                labels: skills_names,
                datasets: [{
                    data: skills_counters,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],
                }]
            }
            var pieSkillCanvas = $('#pieSkill').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            new Chart(pieSkillCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

            // Languages
            var donutData = {
                labels: languages_names,
                datasets: [{
                    data: languages_counters,
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12',  '#00c0ef', '#3c8dbc'],
                }]
            }
            var pieLangCanvas = $('#pieLang').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            new Chart(pieLangCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })

        })
    </script>
@endsection

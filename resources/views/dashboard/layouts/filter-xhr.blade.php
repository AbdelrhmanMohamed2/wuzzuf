<script>
    filters = {};

    job_type = document.getElementById('job_type');
    career_level = document.getElementById('career_level');
    job_category = document.getElementById('job_category');
    country_input = document.getElementById('country_id');
    city_input = document.getElementById('city_id');
    area_input = document.getElementById('area_id');


    job_type.addEventListener('change', function() {
        updateFilterValue('job_type_id', job_type.value);
        makeAjaxRequest();
    });

    career_level.addEventListener('change', function() {
        updateFilterValue('career_level_id', career_level.value);
        makeAjaxRequest();
    });

    job_category.addEventListener('change', function() {
        updateFilterValue('job_category_id', job_category.value);
        makeAjaxRequest();
    });

    area_input.addEventListener('change', function() {
        updateFilterValue('location_id', area_input.value);
        makeAjaxRequest();
    });

    // Function to update filter values in the filters object
    function updateFilterValue(paramName, paramValue) {
        if (paramValue === "") {
            delete filters[paramName]; // If paramValue is empty, remove the parameter from the filters object
        } else {
            filters[paramName] = paramValue; // Otherwise, update the parameter value in the filters object
        }
    }

    // Function to convert the filters object to a query string
    function getQueryString() {
        var queryString = Object.keys(filters)
            .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(filters[key]))
            .join('&');
        return queryString;
    }

    // Function to make the AJAX request
    function makeAjaxRequest() {
        var xhr = new XMLHttpRequest();

        // Construct the URL with the query string
        var url = '{{ route('dashboard.search.jobs.filter') }}';
        var queryString = getQueryString();
        if (queryString !== "") {
            url += '?' + queryString;
        }

        xhr.open('GET', url, true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Request was successful, handle the response
                    var responseData = JSON.parse(xhr.responseText);

                    removeOldData()
                    for(key in responseData.data)
                    {
                        addNewData(responseData.data[key]);
                    }
                } else {
                    // Request failed, handle the error
                    console.error("Error: " + xhr.status);
                }
            }
        };

        xhr.send();
    }
</script>
<script>
    country_input.addEventListener('change', function() {
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                data = JSON.parse(xhr.responseText);
                city_input.innerHTML = '';
                data.data.forEach(city => {
                    opt = document.createElement('option');
                    opt.value = city.id;
                    opt.innerHTML = city.name;
                    city_input.appendChild(opt);
                });
            }
        };
        xhr.open("GET", `http://127.0.0.1:8000/dashboard/locations/${country_input.value}/cities`);
        xhr.send();
    })
</script>

<script>
    city_input.addEventListener('change', function() {
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                data = JSON.parse(xhr.responseText);
                area_input.innerHTML = '';
                data.data.forEach(city => {
                    opt = document.createElement('option');
                    opt.value = city.id;
                    opt.innerHTML = city.name;
                    area_input.appendChild(opt);
                });
            }
        };
        xhr.open("GET", `http://127.0.0.1:8000/dashboard/locations/${city_input.value}/areas`);
        xhr.send();
    })
</script>

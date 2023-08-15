country_input = document.getElementById('country_id');
city_input = document.getElementById('city_id');
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

area_input = document.getElementById('area_id');
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

<script>
    // JavaScript to handle the XHR request
    const searchInput = document.getElementById('searchInput');
    const resultContainer = document.querySelector('.result-container');

    const hideResults = () => {
        // Hide the result container
        resultContainer.style.display = 'none';
    };

    searchInput.addEventListener('input', () => {
        const searchTerm = searchInput.value.trim();

        // If the search term is empty, hide the result container
        if (searchTerm === '') {
            hideResults();
            return;
        }

        // Create a new XHR request
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    // console.log(response);

                    // Clear the existing result content
                    resultContainer.innerHTML = '';
                    // Display the search results
                    for (const key in response.data) {
                        const resultLink = document.createElement('a');
                        resultLink.href = {{ $link }};
                        resultLink.textContent = {{ $label }};
                        const resultCard = document.createElement('div');
                        resultCard.className = 'card';
                        const resultCardBody = document.createElement('div');
                        resultCardBody.className = 'card-body';
                        resultCardBody.appendChild(resultLink);
                        resultCard.appendChild(resultCardBody);
                        resultContainer.appendChild(resultCard);

                    }

                    // Show the result container
                    resultContainer.style.display = 'block';
                } else {
                    console.error('Error fetching search results');
                    hideResults(); // Hide the results on error
                }
            }
        };

        // Send the XHR request to the server-side script using the named route
        xhr.open('GET', `{{ $route }}?q=${encodeURIComponent(searchTerm)}`);
        xhr.send();
    });

    // Event listener to hide the results when the input loses focus
    document.addEventListener('click', (event) => {
        const isClickInsideResultContainer = resultContainer.contains(event.target);
        const isClickInsideSearchInput = searchInput.contains(event.target);

        if (!isClickInsideResultContainer && !isClickInsideSearchInput) {
            hideResults();
        }
    });

    // searchInput.addEventListener('blur', hideResults);
</script>

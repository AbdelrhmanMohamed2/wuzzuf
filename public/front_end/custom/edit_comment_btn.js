form = document.querySelector('#comment-form');
comment_list = document.querySelector('.comment-list');
action = form.action;

comment_list.addEventListener('click', function (event) {
    if (event.target.classList.contains('edit')) {
        clickedButton = event.target;
        document.querySelector('.btn-primary').value = 'Edit';
        document.getElementById('body').value = document.querySelector('.comment-' + clickedButton.id).textContent;
        form.action = action + '/' + clickedButton.id;

        if (form.querySelectorAll('input[name="_method"][value="PUT"]').length === 0) {
            var methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            form.appendChild(methodInput);
        }

    }
});


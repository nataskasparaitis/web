
    document.querySelectorAll('.action-film-container').forEach((container) => {
        const heart     = container.querySelector('.fa-heart');
        const contentId = container.dataset.id;
        const type      = container.dataset.type;
        const name      = container.dataset.name;

        if(userFavorites.includes(parseInt(contentId))) {
            heart.classList.remove('fa-regular');
            heart.classList.add('fa-solid');
        }

        heart.addEventListener('click', () => {
            fetch('/favorites/add', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    contentId: contentId,
                    type: type,
                    name: name
                })
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'added') {
                    heart.classList.remove('fa-regular');
                    heart.classList.add('fa-solid');
                } else {
                    heart.classList.remove('fa-solid');
                    heart.classList.add('fa-regular');
                }
            });
        });
    });

   
    const searchBar = document.querySelector('.search-bar');
    const allCards  = document.querySelectorAll('.action-film-container');

    if(searchBar) {
        searchBar.addEventListener('input', () => {
            const searchText = searchBar.value.toLowerCase();

            allCards.forEach((card) => {
                const movieName = card.querySelector('.action-info').textContent.toLowerCase();
                card.style.display = movieName.includes(searchText) ? 'block' : 'none';
            });
        });
    }


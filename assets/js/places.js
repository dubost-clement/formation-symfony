var place = places({
    container: document.querySelector('#annonce_address'),
    language: 'fr',
    countries: ['FR']
});

place.on('change', (e) => {
    document.querySelector('#annonce_lat').value = e.suggestion.latlng.lat
    document.querySelector('#annonce_lng').value = e.suggestion.latlng.lng
})
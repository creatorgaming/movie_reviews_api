var CACHE_NAME = 'mov_re_stat_v1';
var urlsToCache = [
    'http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.12/semantic.min.css',
    'http://www.theimdbapi.org/api/movie?movie_id=tt0468569',
    'http://www.theimdbapi.org/api/movie?movie_id=tt0111161',
    'http://www.theimdbapi.org/api/movie?movie_id=tt0068646',
    'http://www.theimdbapi.org/api/movie?movie_id=tt0050083',
    'http://www.theimdbapi.org/api/movie?movie_id=tt0108052',
    'http://www.theimdbapi.org/api/movie?movie_id=tt0167260',
    'http://www.theimdbapi.org/api/movie?movie_id=tt1375666',
    '/desc.php',
    '/movies.php'
];

self.addEventListener('install',(event)=>{
    event.waitUntil(
        caches.open(CACHE_NAME)
        .then((cache)=>{
            console.log('Cache Opened');
            return cache.addAll(urlsToCache);
        })
    );
})

self.addEventListener('fetch',(event)=>{
    event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }
        return fetch(event.request);
      }
    )
  );
})

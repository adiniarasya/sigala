const CACHE_NAME = 'sigala-cache-v1';
const urlsToCache = [
    '/',
    '/dashboard',
    '/offline',
    '/images/logo-sigala.png',
    '/images/edukasi-tas-siaga.png'
];

self.addEventListener('install', event => {
    self.skipWaiting();
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(urlsToCache);
            })
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        fetch(event.request).catch(() => {
            return caches.match(event.request);
        })
    );
});

self.addEventListener('activate', event => {
    event.waitUntil(clients.claim());
});
// tracking.js
document.addEventListener('DOMContentLoaded', function () {
    // Track the current page view
    trackPage(window.location.pathname);

    // Retrieve tracked pages from localStorage
    var trackedPages = getTrackedPages();

    // Display tracked pages on the tracking_page.html
    var trackedPagesElement = document.getElementById('trackedPages');

    trackedPages.forEach(function (pageUrl) {
        var listItem = document.createElement('li');
        listItem.textContent = pageUrl;
        trackedPagesElement.appendChild(listItem);
    });
});

function trackPage(pageUrl) {
    // Retrieve tracked pages from localStorage
    var trackedPages = getTrackedPages();

    // Add the current page URL to the array
    trackedPages.push(pageUrl);

    // Update tracked pages in localStorage
    setTrackedPages(trackedPages);
}

function getTrackedPages() {
    // Retrieve tracked pages from localStorage
    var trackedPages = JSON.parse(localStorage.getItem('trackedPages')) || [];
    return trackedPages;
}

function setTrackedPages(trackedPages) {
    // Update tracked pages in localStorage
    localStorage.setItem('trackedPages', JSON.stringify(trackedPages));
}

<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Seek Digital Collections</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #114161;
      color: white;
      padding: 10px;
      text-align: center;
    }

    section {
      padding: 20px;
    }

    .search-bar {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .search-input {
      flex: 1;
      padding: 15px;
      margin-right: 10px;
      font-size: 16px;
    }

    .search-btn,
    .clear-btn {
      padding: 15px;
      font-size: 20px;
      cursor: pointer;
      border: none;
      color: white;
    }

    .search-btn {
      background-color: #3498db;
    }

    .clear-btn {
      background-color: #e74c3c;
    }

    .search-results {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      margin: 20px;
    }

    .search-item {
      background-color: white;
      border: 1px solid #ddd;
      margin: 10px;
      padding: 20px;
      width: calc(33.33% - 20px);
      box-sizing: border-box;
      cursor: pointer;
    }

    .search-item h3 {
      margin-bottom: 10px;
      color: #3498db;
      cursor: pointer;
    }

    .search-item p {
      color: #555;
    }

    .detail-view {
      display: none;
      background-color: white;
      border: 1px solid #ddd;
      padding: 20px;
      margin: 10px;
    }
  </style>
</head>
<body>

  <header>
    <h1>Digital Seek Digital Collections</h1>
  </header>

  <section>
    <div class="search-bar">
      <input type="text" id="searchInput" class="search-input" placeholder="Search...">
      <button onclick="searchItems()" class="search-btn">&#128269; Search</button>
      <button onclick="clearSearch()" class="clear-btn">&#10006; Clear</button>
    </div>

    <div class="search-results" id="searchResults">
      <!-- Publication items will be dynamically added here -->
    </div>

    <div class="detail-view" id="detailView">
      <!-- PDF viewer will be dynamically added here -->
    </div>
  </section>

  <script>
    const digitizedPublications = [
        { title: 'Bank Negara Malaysia dan Sistem Kewangan di Malaysia', description: 'Printed book published by Bank Negara Malaysia', pdfUrl: 'image/Bank Negara Malaysia Perubahan Sedekad 1989 - 1999.pdf' },
        { title: 'Wang dan Urusan Bank di Malaysia', description: 'Printed book published by Jabatan Penyelidikan Ekonomi dan Perangkaan Bank Negara Malaysia', pdfUrl: 'image/Wang dan Urusan Bank di Malaysia.pdf' },
      // Add more digitized publications as needed
    ];

    function searchItems() {
      const searchTerm = document.getElementById('searchInput').value.toLowerCase();
      const filteredItems = searchTerm
        ? digitizedPublications.filter(item => item.title.toLowerCase().includes(searchTerm))
        : digitizedPublications;

      displayItems(filteredItems);
    }

    function clearSearch() {
      document.getElementById('searchInput').value = '';
      searchItems();
    }

    function displayItems(items) {
      const collectionList = document.getElementById('searchResults');
      collectionList.innerHTML = '';

      items.forEach(item => {
        const collectionItem = document.createElement('div');
        collectionItem.className = 'search-item';
        collectionItem.setAttribute('data-title', item.title);
        collectionItem.setAttribute('data-pdf', item.pdfUrl);
        collectionItem.addEventListener('click', () => showPDF(item));

        const titleElement = document.createElement('h3');
        titleElement.textContent = item.title;

        collectionItem.appendChild(titleElement);

        const descriptionElement = document.createElement('p');
        descriptionElement.textContent = item.description;

        collectionItem.appendChild(descriptionElement);

        collectionList.appendChild(collectionItem);
      });
    }

    function showPDF(item) {
      const { title, pdfUrl } = item;
      const detailView = document.getElementById('detailView');
      detailView.innerHTML = '';

      const titleElement = document.createElement('h3');
      titleElement.textContent = title;

      const pdfLink = document.createElement('a');
      pdfLink.href = `./image/${encodeURIComponent(pdfUrl)}`;
      pdfLink.target = '_blank';
      pdfLink.textContent = 'Open PDF';

      const closeButton = document.createElement('button');
      closeButton.textContent = 'Close';
      closeButton.onclick = hideDetailView;

      detailView.appendChild(titleElement);
      detailView.appendChild(pdfLink);
      detailView.appendChild(closeButton);
      detailView.style.display = 'block';
    }

    function hideDetailView() {
      const detailView = document.getElementById('detailView');
      detailView.style.display = 'none';
    }
  </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>University Library</title>
    <style>
        
        body { font-family: Arial; margin: 30px; line-height: 1.6;background: seagreen; }
        input, select { padding: 8px; margin: 5px; background-color: sandybrown; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        button { cursor: pointer; padding: 5px 10px; color: palevioletred; background-color: mistyrose; }
    </style>
</head>
<body>

    <h2>Library Management System</h2>

    
    <input type="hidden" id="bookId">
    <input type="text" id="title" placeholder="Book Title">
    <input type="text" id="author" placeholder="Author Name">
    <input type="text" id="category" placeholder="Category">
    
    
    <select id="status" style="display:none;">
        <option value="Available">Available</option>
        <option value="Borrowed">Borrowed</option>
    </select>

    <button id="mainBtn" onclick="saveData()">Add Book</button>

    <table>
        <thead>
            <tr>
                <th>Title</th><th>Author</th><th>Category</th><th>Status</th><th>Action</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            
        </tbody>
    </table>

    <script>
        window.onload = loadData;

        function loadData() {
            let formData = new FormData();
            formData.append('action', 'fetch');

            fetch('controller.php', { method: 'POST', body: formData })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('tableBody').innerHTML = html;
                });
        }

        function saveData() {
            let id = document.getElementById('bookId').value;
            let formData = new FormData();
            
            formData.append('action', id ? 'update' : 'insert');
            if(id) formData.append('id', id);
            
            formData.append('title', document.getElementById('title').value);
            formData.append('author', document.getElementById('author').value);
            formData.append('category', document.getElementById('category').value);
            
            
            formData.append('status', document.getElementById('status').value);

            fetch('controller.php', { method: 'POST', body: formData })
                .then(() => {
                    clearInputs();
                    loadData();
                });
        }

        function removeBook(id) {
            if (confirm("Are you sure?")) {
                let formData = new FormData();
                formData.append('action', 'delete');
                formData.append('id', id);

                fetch('controller.php', { method: 'POST', body: formData })
                    .then(() => loadData());
            }
        }

        function editBook(book) {
            document.getElementById('bookId').value = book.id;
            document.getElementById('title').value = book.title;
            document.getElementById('author').value = book.author;
            document.getElementById('category').value = book.category;
            
            
            document.getElementById('status').style.display = "inline";
            document.getElementById('status').value = book.status;
            
            document.getElementById('mainBtn').innerText = "Update Book";
        }

        function clearInputs() {
            document.getElementById('bookId').value = "";
            document.getElementById('title').value = "";
            document.getElementById('author').value = "";
            document.getElementById('category').value = "";
            
            
            document.getElementById('status').style.display = "none";
            document.getElementById('status').value = "Available";
            
            document.getElementById('mainBtn').innerText = "Add Book";
        }
    </script>
</body>
</html>
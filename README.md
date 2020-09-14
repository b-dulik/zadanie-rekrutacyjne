Simple news article system
*HTML template used and adapted comes from Pixelarity

To run this project locally you can use XAMPP.
Pull the project files directly to folder created under xampp/htdocs/ or download ZIP and extract those files there.

in phpMyAdmin create db named "zadanie_db" and import prepared database from file “zadanie_db.sql”

To access prepared website enter url:
http://localhost/{folder_with_project_files_inside} /index.php

With this prepared PHP/HTML website you can make all CRUD operations on articles.
You can edit and delete articles under tab:”Edytuj artykuły”
You can add new articles under tab:”Dodaj artykuł”
You can view added articles on ”Strona główna” by clicking “Więcej..” under chosen article.

API:
Created API ENDPOINTS and example access to them on localhost:

Articles:

1.Read all articles
http://localhost//{folder_with_project_files_inside}/api/article/read.php

2.Read article by id
http://localhost//{folder_with_project_files_inside}/api/article/read_one.php?id=?

3.Read all articles of given author
http://localhost//{folder_with_project_files_inside}/api/article/read_author.php?id=?

Authors:

1.Read all authors
http://localhost//{folder_with_project_files_inside}/api/author/read.php

2.Read author by id
http://localhost//{folder_with_project_files_inside}/api/author/read_one.php?id=?

3.Read top 3 authors with most articles
http://localhost//{folder_with_project_files_inside}/api/author/read_top_3.php

DB:
Db configuration file is under api/config/db.ini



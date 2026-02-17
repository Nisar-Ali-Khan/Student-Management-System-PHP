🎓 Student Management System (CRUD App)

A complete **CRUD (Create, Read, Update, Delete)** application built using **Core PHP** and **MySQL**. This project demonstrates how to manage database records effectively with security measures like **Prepared Statements**.

Features:

1. **Create (Insert Data)**
- User-friendly form to add student details (Name, City, Course, Batch, Year).
- **Server-side Validation:** Checks for empty fields before submission.
- Prevents duplicate entries upon page refresh.

2. **Read (View Data)**
- Displays all student records in a clean, responsive HTML table.
- Fetches data dynamically from the MySQL database using PDO.

3. **Update (Edit Data)**
- **Pre-filled Forms:** Fetches existing data into input fields for easy editing.
- Updates specific records based on unique IDs.
- Logic to handle hidden input fields for ID transfer.

4. **Delete (Remove Data)**
- Removes unwanted records permanently from the database.
- **JavaScript Confirmation:** Asks "Are you sure?" before deleting to prevent accidental data loss.
- Auto-refresh feature updates the list immediately after deletion.

5. **Search Functionality**
- Real-time searching capability using SQL `LIKE` operator.
- Filters records by **Student Name** or **City**.

6. **Security & Best Practices**
- **PDO (PHP Data Objects):** Used for database connections instead of `mysqli`.
- **Prepared Statements:** Protects against **SQL Injection** attacks.
- **Sanitization:** Basic input handling to prevent XSS.

---

🛠️ Technologies Used
- **Frontend:** HTML5, CSS3 (Modern UI with Flexbox), JavaScript (Basic alerts).
- **Backend:** PHP (ver 8.0+).
- **Database:** MySQL / MariaDB.
- **Server:** Apache (XAMPP/WAMP).

---

⚙️ How to Run
1. Download or Clone this repository.
2. Move the folder to your local server directory (e.g., `htdocs` in XAMPP).
3. Open **phpMyAdmin** and create a database named `college_db` (or check `config.php`).
4. Import the `database.sql` file provided in this repo.
5. Open your browser and go to: `http://localhost/Student-Management-System/`

---

## 📸 Screenshots
*(Yahan aap apne project ke screenshots laga sakte hain)*

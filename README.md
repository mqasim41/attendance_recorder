# Attendance Recorder
![leaf](https://github.com/mqasim41/attendance_recorder/assets/114048264/3c33ab9d-123e-4697-9373-ef4344d97a9b)
![student](https://github.com/mqasim41/attendance_recorder/assets/114048264/87e9bfeb-ab65-4b21-bd89-efb5c030e7df)
![login](https://github.com/mqasim41/attendance_recorder/assets/114048264/38eeb451-0456-4fdc-8ec4-91d76682f8a7)

### Introduction:

This document outlines the approach employed by Muhammad Qasim and Attiya Waqar to develop the attendance recorder application for CS344: Web Engineering Lab 10. The objective is to implement a user-friendly application that allows teachers to take attendance and students to view their attendance. The application should authenticate users, provide a master view, and color-code attendance based on predefined criteria.

### Solution Overview:

The solution involves using HTML5, CSS3, JavaScript, Laravel, and MySQL for web development. The core functionality includes user authentication, session management, and dynamic generation of views for teachers and students. The database schema provided serves as the foundation for storing attendance records, class details, and user information.

### Key Features:

1. **User Authentication:**
   - Utilize Laravel's authentication mechanisms to secure the application.
   - Implement role-based access control for teachers, students, and potentially an admin role.

2. **Master View:**
   - Create a master view accessible to all users after authentication.
   - Design a clean and intuitive interface that serves as a central hub for teachers and students.

3. **Teacher Functionality:**
   - Display the current attendance session and a list of previous/upcoming sessions.
   - Allow teachers to mark attendance for any student in any session.
   - Implement color coding for attendance based on predefined criteria (red for below 75%, yellow for below 85%, and green otherwise).

4. **Student Functionality:**
   - Enable students to view their own attendance records only.
   - Implement color coding for students' attendance based on the same criteria as for teachers.

5. **Database Interaction:**
   - Utilize Laravel's Eloquent ORM to interact with the MySQL database.
   - Implement queries to fetch and update attendance records, class details, and user information.

6. **Nice Interface:**
   - Use HTML5 and CSS3 (Tailwind CSS) to design a visually appealing and responsive interface.
   - Ensure a consistent and user-friendly experience across different devices.

### Development Steps:

1. **Database Setup:**
   - Execute provided SQL scripts to create necessary tables (`attendance`, `class`, `user`).
   - Establish relationships between tables, considering foreign keys.

2. **Laravel Project Initialization:**
   - Create a new Laravel project.
   - Configure database connection settings in the Laravel configuration.

3. **Authentication Setup:**
   - Use Laravel's built-in authentication scaffolding to set up user registration and login.
   - Extend the default user model to include the `role` field.

4. **Route Configuration:**
   - Define routes for different views and functionalities (master view, teacher view, student view).

5. **Controller Implementation:**
   - Create controllers to handle user authentication, master view, teacher functionality, and student functionality.

6. **View Creation:**
   - Develop Blade views for the master view, teacher view, and student view.
   - Use JavaScript to enhance the dynamic behavior of the views.

7. **Styling:**
   - Apply Tailwind CSS styles to create an aesthetically pleasing interface.
   - Ensure responsiveness for various screen sizes.

### Conclusion:

This solution approach aims to fulfill the specified objectives, providing a robust and user-friendly attendance recorder application for NUST students and teachers.

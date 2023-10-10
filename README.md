# chatgpt-assignment-1

## Assignment: Building a Simple Task Management System

### Description:
You are tasked with building a simple task management system using Laravel. The system should allow users to create, view, edit, and delete tasks. Each task should have a title, description, and a status (e.g., "pending," "in progress," or "completed"). Users should be able to mark tasks as completed or change their status.

### Tasks:

1. Setup:
   * Create a new Laravel project.
   * Set up a database and configure the .env file.
   * Create a migration for the tasks table with columns for title, description, and status.

2. Model:
   * Create a Task model corresponding to the tasks table.
   * Define relationships if necessary.

3. Routes:
   * Define routes for:
      * Viewing all tasks.
      * Creating a new task.
      * Viewing a single task.
      * Editing a task.
      * Deleting a task.
      * Changing the status of a task (e.g., from "pending" to "completed").

4. Controllers:
   * Create controllers for managing tasks.
   * Implement the necessary methods to handle each of the routes defined above.
   * Ensure proper validation for creating and updating tasks.

5. Views:
   * Create views for displaying tasks.
   * Implement a form for creating and editing tasks.
   * Use Blade templating for rendering views.

6. Functionality:
   * Implement the CRUD operations for tasks.
   * Ensure proper validation for task inputs.
   * Allow users to change the status of tasks.
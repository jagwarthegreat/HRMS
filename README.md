## Setup
- composer install
- npm install
- configure .env file (databse connection and app detail)
- php artisan migrate:fresh --seed
    ### optional:
        - php artisan migrate
        - php artisan db:seed
- to access uploaded files in the system :
    - php artisan storage:link


# HRMS
### PROFILING :
- Employee management
    - Employee record
    - contracts /201 files /etc

- Team Management
    - assign employee
    - team details
    - files /etc

- Department
    - assign employee (if within company premises)
    - department org chart
    - department records

- client management
    - client record
    - contracts /files /etc
    - assign employee
---

### HR :
- DTR
- PAYROLL
- Absent management
- Leave management
- Time schedules
- post job vacancies
- recruitment management
- set working days
- set holiday list
---

### SYSTEM :
- User management
    - Permissions
    - Roles
    - User profile

- Reports
- help desk /knowledge base
- announcements

- SETTINGS
    - company info
---

### MODULES :
- DASHBOARD
    - recent application
    - calendar
    - widget for total employee
    - widget for total client
    - expenses

- NOTICE BOARD